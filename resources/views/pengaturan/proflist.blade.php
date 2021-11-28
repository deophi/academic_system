                <div class="card">
                  <div class="card-header">
                    <h4>Profil Sekolah</h4>
                  </div>
                  <div class="card-body">
                    @if(Session::has('tambah'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('tambah') }}
                        </div>
                      </div>
                    @elseif(Session::has('hapus'))
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('hapus') }}
                        </div>
                      </div>
                    @elseif(Session::has('ubah'))
                      <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('ubah') }}
                        </div>
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        
                          <tr>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th></th>
                          </tr>
                          @foreach($prof as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;" width="150px">{{ $r->judul }}</td>
                              <td style="vertical-align: middle;">
                                @if($r->sub == NULL && $r->gbr != NULL)
                                  Gambar....
                                @else
                                  {{ Str::limit($r->sub, 320) }}
                                @endif
                              </td>
                              <td style="vertical-align: middle;" width="75px">
                                <form action="{{ route('profilsekolah.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('profilsekolah.edit', $r->id) }}" class="btn btn-warning btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger btn-icon btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                      </table>
                    </div>
                  </div>
                </div>