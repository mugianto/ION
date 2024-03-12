@foreach($penggunanya as $pengguna)
    <tr class="align-middle">
        <td>{{$pengguna->id}}</td>
        <td>{{ Illuminate\Support\Str::limit($pengguna->name, 30) }}</td>
        <td>{{$pengguna->artikels->count()}}</td>
        <td>
            <div class="btn-group gap-2" role="group" aria-label="Basic example">
                @method('DELETE')
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit pengguna" id="editPengguna" href="{{ route('pengguna.edit', $pengguna->id) }}" type="button" class="btn btn-success btn-icon btn-xs">
                    <i data-feather="edit"></i>
                </a>

                @if($pengguna->id == '1')
                    <button disabled onClick="return false" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Permanent" type="submit" id="deleteKategori" class="btn btn-danger btn-icon btn-xs disabled">
                        <i data-feather="trash-2"></i>
                    </button>
                @else
                <a href="{{ route('pengguna.konfirm', ['pengguna' => $pengguna->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pengguna" class="btn btn-danger btn-icon btn-xs">
                    <i data-feather="trash-2"></i>
                </a>
                @endif
            </div>
        </td>
    </tr>
@endforeach