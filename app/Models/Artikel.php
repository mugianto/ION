<?php

// Artikel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use DateTime;


class Artikel extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul', 'slug', 'kutipan', 'isi_artikel', 'id_kategori', 'terbit_tgl', 'gambar', 'created_at', 'updated_at'
    ];
    
    protected $tgls = ['terbit_tgl'];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($artikel) {
    //         $artikel->id = (string) Str::uuid();
    //     });
    // }
    
    // Gambar Artikel 
    public function getGambarArtikelAttribute()
    {
        if (!empty($this->gambar)) {
            return asset("storage/asetnya/upl/gambar/artikel/otentik/{$this->gambar}");
        } else {
            return asset("storage/asetnya/upl/gambar/gambar-default.jpg");
        }
    }
    // /Gambar Artikel 

    // Gambar Artikel 
    public function getGambarThumbArtikelAttribute()
    {
        if (!empty($this->gambar)) {
            return asset("storage/asetnya/upl/gambar/artikel/thumb/{$this->gambar}");
        } else {
            return asset("storage/asetnya/upl/gambar/gambar-default.jpg");
        }
    }
    // /Gambar Artikel 

    public function penulis()
    {
        return $this->belongsTo(User::class, 'id_penulis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function getTglAttribute($value)
    {

        $terbit_tgl = Carbon::parse($this->terbit_tgl);
        return is_null($this->terbit_tgl) ? '' : $terbit_tgl->diffForHumans();
        // if ($this->terbit_tgl) {
        //     $terbit_tgl = Carbon::parse($this->terbit_tgl);
        //     return $terbit_tgl->diffForHumans();
        // } else {
        //     return '';
        // }
    }

    public function scopeTerbaru($query)
    {
        return $query->orderBy('terbit_tgl', 'desc');
    }

    public function scopePopularArtikel($query)
    {
        return $query->orderBy("artikel_viewer", "desc");
    }

    public function getRouteKeyName() 
    {
        return 'slug';
    }

    public function getHtmlIsiAttribute($value)
    {
        return $this->isi_artikel ? Markdown::convertToHtml(e($this->isi_artikel)) : NULL;
    }

    public function getHtmlKutipanAttribute($value)
    {
        return $this->kutipan ? Markdown::convertToHtml(e($this->kutipan)) : NULL;
    }

    public function formatTgl($showTimes = false)
    {
        $terbit_tgl = new DateTime($this->terbit_tgl);

        $formatNya = "d/m/Y";
        if($showTimes) $formatNya = $formatNya . " H:i:s";
        return $terbit_tgl->format($formatNya);

    }

    public function statusBadge()
    {
        $terbit_tgl = new DateTime($this->terbit_tgl);
        $now = new DateTime();
        $isFuture = $terbit_tgl > $now; // Mengembalikan true jika $terbit_tgl di masa depan
        
        if (is_null($this->terbit_tgl)) {
            return '<span class="badge bg-warning ms-1 text-dark">Draft</span>';
        } elseif ($terbit_tgl instanceof DateTime && $isFuture) {
            return '<span class="badge bg-info ms-1">Terjadwal</span>';
        } else {
            return '<span class="badge bg-success ms-1">Terbit</span>';
        }
    }

    public function scopeTerbit($query)
    {
        return $query->where("terbit_tgl", "<=", Carbon::now());
    }

    public function scopeTerjadwal($query)
    {
        return $query->where("terbit_tgl", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("terbit_tgl");
    }

}

