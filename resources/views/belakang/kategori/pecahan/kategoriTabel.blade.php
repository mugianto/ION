                                    <tr class="align-middle">
                                        <td>{{$kategori->id}}</td>
                                        <td>{{ Illuminate\Support\Str::limit($kategori->nama_kategori, 30) }}</td>
                                        <td>{{$kategori->artikels->count()}}</td>
                                        <td>
                                            <div class="btn-group gap-2" role="group" aria-label="Basic example">

                                                <form method="POST"
                                                    action="{{ route('kategori.destroy', $kategori->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit kategori" id="editKategori" href="{{ route('kategori.edit', $kategori->id) }}"
                                                        type="button" class="btn btn-success btn-icon btn-xs">
                                                        <i data-feather="edit"></i>
                                                    </a>

                                                    @if($kategori->id == '1')
                                                    <button disabled onClick="return false" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Kategori" type="submit" id="deleteKategori"
                                                        class="btn btn-danger btn-icon btn-xs disabled">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                    @else

                                                    <button onClick="return confirm('Yakin menghapus kategori ini ?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Kategori" type="submit" id="deleteKategori"
                                                        class="btn btn-danger btn-icon btn-xs">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                    @endif
                                                </form>

                                            </div>
                                        </td>
                                    </tr>