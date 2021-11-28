                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Pelanggaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(Auth::user()->levels_id != 4)
                        <a href="{{ route('newlgr') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Pelanggaran Baru</a>
                        @if(Auth::user()->levels_id == 1)
                          <a href="{{ route('pelanggaran.create') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Tambah Jenis Pelanggaran</a>
                        @endif
                        <br><br>
                      @endif
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped">
                        @if($fls->isEmpty())
                          <div class="alert alert-success alert-dismissible show fade" align="center"><div class="alert-body">Belum ada pelanggaran pada tahun ini.</div></div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>Nama</th>
                            <th>Pelanggaran</th>
                            <th>Keterangan</th>
                            <th>Waktu</th>
                            <th>Piket</th>
                            <th></th>
                          </tr>
                          @foreach($fls as $r)
                            <tr>
                              <td>{{ $r->users->siswa->nis }}</td>
                              <td>{{ $r->users->name }}</td>
                              <td>
                                @if($r->jenis->poin > 20)
                                  <div class="badge badge-danger">{{ $r->jenis->nama }}</div>
                                @elseif($r->jenis->poin > 10)
                                  <div class="badge badge-warning">{{ $r->jenis->nama }}</div>
                                @else
                                  <div class="badge badge-info">{{ $r->jenis->nama }}</div>
                                @endif
                              </td>
                              <td>{{ $r->keterangan }}</td>
                              <td>{{ $r->created_at->translatedFormat('l, d F Y') }}</td>
                              <td>
                                <?php
                                  $cek = App\Models\Users::where('id', $r->piket_id)->first();
                                  if ($cek == NULL) {
                                    echo "Tanpa Nama";
                                  } else {
                                    echo $r->piket->name;
                                  }
                                ?>
                              </td>
                              @if(Auth::user()->levels_id != 4)
                              <td>
                                <a href="{{ route('print', $r->id) }}" target="_blank" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-print"></i></a>
                              </td>
                              @endif
                            </tr>
                          @endforeach
                        @endif
                      </table>
                      {{ $fls->links() }}
                    </div>
                  </div>
                </div>
                      