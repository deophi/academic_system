                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Siswa</h4>
                    <div class="card-header-action">
                      <a href="{{ route('printsis', $kls->id) }}" class="btn btn-warning" target="_blank">Cetak Daftar Siswa</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(Auth::user()->levels_id == 8)
                        <?php
                          $cek = App\Models\Users::select('id')->where('id', $kls->wali_id)->first();
                          if($cek == NULL){
                        ?>
                          <div class="alert alert-info alert-dismissible show fade" align="center">
                            <div class="alert-body">
                              <label>Wali Kelas dengan ID {{ $kls->wali_id }} tidak terdaftar.</label>
                            </div>
                          </div>
                        <?php
                          }else{
                        ?>
                        <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Wali Kelas <b>{{ $kls->wali->name }}</b></div></div>
                        <?php
                          }
                        ?>
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
                        @if($sis->isEmpty())
                          <div class="alert alert-danger alert-dismissible show fade" align="center"><div class="alert-body">Belum ada siswa dalam kelas ini.</div></div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th>No. HP</th>
                          </tr>
                          @foreach($sis as $r)
                            <tr>
                              <td style="vertical-align: middle;">{{ $r->siswa->nis }}</td>
                              <td style="vertical-align: middle;">{{ $r->siswa->nisn }}</td>
                              <td style="vertical-align: middle;">{{ $r->name }}</td>
                              <td style="text-align: center;">
                                @if($r->jks == '1')
                                  <div class="badge badge-success">Laki-Laki</div>
                                @else
                                  <div class="badge badge-info">Perempuan</div>
                                @endif
                              </td>
                              <td style="vertical-align: middle;">{{ $r->hp }}</td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                    </div>
                  </div>
                </div>