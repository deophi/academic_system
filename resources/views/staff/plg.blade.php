                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Pelanggaran</h4>
                    <div class="card-header-action">
                      <a href="{{ route('pelanggaran.index') }}" class="btn btn-warning">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        @if($lgr->isEmpty())
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
                          @foreach($lgr as $r)
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
                    </div>
                  </div>
                </div>