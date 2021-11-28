                <div class="card">
                  <div class="card-header">
                    <h4>Jadwal Mengajar</h4>
                    <div class="card-header-action">
                      <a href="{{ route('ctkjadwal') }}" target="_blank" class="btn btn-warning">Cetak Jadwal Mengajar</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if($jadwal->isEmpty())
                        <div class="alert alert-warning alert-dismissible show fade"><div class="alert-body" align="center">Anda belum memiliki jadwal mengajar.</div></div>
                      @else
                        <table class="table table-sm table-striped">
                          <tr>
                            <th style="text-align: center;">Kelas</th>
                            <th style="text-align: center;">Hari</th>
                            <th style="text-align: center;">Jam</th>
                          </tr>
                          @foreach($jadwal as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->kelas->nama }}</td>
                              <td style="text-align: center;"><?php
                                if ($r->hari == 1) {
                                  echo "Senin";
                                }elseif ($r->hari == 2) {
                                  echo "Selasa";
                                }elseif ($r->hari == 3) {
                                  echo "Rabu";
                                }elseif ($r->hari == 4) {
                                  echo "Kamis";
                                }elseif ($r->hari == 5) {
                                  echo "Jum'at";
                                }else {
                                  echo "Sabtu";
                                }
                              ?></td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                      @endif
                    </div>
                  </div>
                </div>