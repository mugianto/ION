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

                                                <form method="POST" action="{{ route('artikel.restore', $artikel->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <button data-bs-toggle="tooltip" data-bs-placement="top" title="Pulihkan Artikel" type="submit" class="btn btn-info btn-icon btn-xs">
                                                        <i style="transform: rotate(180deg)" data-feather="log-in"></i>
                                                    </button>
                                                </form>

                                                <form id="deleteForm_{{ $artikel->id }}" method="POST" action="{{ route('artikel.force-destroy', $artikel->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pemanen cok" onclick="deletePermanent('{{ $artikel->id }}')" type="button" class="btn btn-danger btn-icon btn-xs">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>