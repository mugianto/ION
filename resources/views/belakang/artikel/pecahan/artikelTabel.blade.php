                                    <tr class="align-middle">
                                        <td>{{$artikel->id}}</td>
                                        <td>{{ Illuminate\Support\Str::limit($artikel->judul, 30) }}</td>
                                        <td>{{$artikel->penulis->name}}</td>
                                        <td>{{$artikel->kategori->nama_kategori}}</td>
                                        <td>
                                            <abbr title="{{$artikel->formatTgl(true)}}">
                                                {{$artikel->formatTgl()}} {!! $artikel->statusBadge() !!}
                                            </abbr>
                                        </td>
                                        <td>
                                            <div class="btn-group gap-2" role="group" aria-label="Basic example">

                                                <form method="POST"
                                                    action="{{ route('artikel.destroy', $artikel->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    @if($userRole == 'admin' || $userRole == 'editor')
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Artikel" id="editArtikel" href="{{ route('artikel.edit', $artikel->id) }}" type="button" class="btn btn-success btn-icon btn-xs">
                        <i data-feather="edit"></i>
                    </a>
                    <button onClick="return confirm('Yakin buang artikel ini ?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Buang Artikel" type="submit" id="deleteArtikel"
                        class="btn btn-danger btn-icon btn-xs">
                        <i data-feather="trash-2"></i>
                    </button>
                @elseif($userRole == 'editor')
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Artikel" id="editArtikel" href="{{ route('artikel.edit', $artikel->id) }}" type="button" class="btn disabled btn-secondary btn-icon btn-xs">
                        <i data-feather="edit"></i>
                    </a>
                    <button disabled onClick="return confirm('Yakin buang artikel ini ?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Buang Artikel" type="submit" id="deleteArtikel"
                        class="btn btn-secondary btn-icon btn-xs">
                        <i data-feather="trash-2"></i>
                    </button>
                @else
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Artikel" id="editArtikel" href="{{ route('artikel.edit', $artikel->id) }}" type="button" class="btn disabled btn-secondary btn-icon btn-xs">
                        <i data-feather="edit"></i>
                    </a>
                    <button disabled onClick="return confirm('Yakin buang artikel ini ?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Buang Artikel" type="submit" id="deleteArtikel"
                        class="btn btn-secondary btn-icon btn-xs">
                        <i data-feather="trash-2"></i>
                    </button>
                @endif
                                                </form>

                                            </div>
                                        </td>
                                    </tr>