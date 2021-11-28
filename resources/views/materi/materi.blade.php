                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Materi</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(Auth::user()->levels_id > 4 && Auth::user()->levels_id < 8)
                        <a href="{{ route('materi.create') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="fas fa-file-upload"></i> Upload Materi</a>
                      @endif
                        <br><br>
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped">
                        @if($mtr->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada materi yang diunggah.</div></div>
                        @else
                          <tr>
                            <th>Judul Materi</th>
                            <th>Nama Guru</th>
                            <th>Pelajaran</th>
                            <th>Tanggal Unggah</th>
                            <th></th>
                          </tr>
                          @foreach($mtr as $r)
                            <tr>
                              <td>{{ $r->nama }}</td>
                              <td>{{ $r->users->name }}</td>
                              <td>
                                <?php
                                  $plj = App\Models\Mapels::where('users_id', $r->users_id)->first();
                                  echo $plj->nama;
                                ?>
                              </td>
                              <td>{{ $r->created_at->translatedFormat('l, d F Y') }}</td>
                              <td><a href="{{ asset('file/materi/'.$r->file) }}" class="btn btn-sm btn-primary btn-icon" target="_blank"><i class="fas fa-file-download"></i><span> Download</span></a></td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                      {{ $mtr->links() }}
                    </div>
                  </div>
                </div>
                      