              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Kelas {{ $idkls->nama }}</h4>
                    <div class="card-header-action">
                      <div class="dropdown dropleft">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Kelas</a>
                        <div class="dropdown-menu dropleft">
                          @foreach($kls as $r)
                          <a class="dropdown-item" href="{{ route('siswakelas', $r->id) }}">{{ $r->nama }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="{{ route('printsis', $idkls->id) }}" target="_blank" class="btn btn-primary">Cetak</a><br><br>
                      <?php
                        $cek = App\Models\Users::select('id')->where('id', $idkls->wali_id)->first();
                        if($cek == NULL){
                      ?>
                      <form action="{{ route('akademik.update', $idkls->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="alert alert-info alert-dismissible show fade" align="center">
                          <div class="alert-body"><label>Wali Kelas dengan ID {{ $idkls->wali_id }} tidak terdaftar, silahkan pilih Wali Kelas.</label>
                          </div>
                          <div class="row">
                            <div class="form-group col-8">
                              <select name="wali" class="form-control select2">
                                @foreach($wali as $r)
                                  <option value="{{ $r->id }}">{{ $r->id }} - {{ $r->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-4">
                              <button class="btn btn-block btn-primary btn-action mr-1">Simpan Wali Kelas</button>
                            </div>
                          </div>
                        </div>
                      </form>
                      <?php
                        }else{
                      ?>
                      <div class="alert alert-info alert-dismissible show fade" align="center">
                        <div class="alert-body">
                          Wali Kelas <b>{{ $idkls->wali->name }}</b><br>
                          Siswa Laki-Laki: {{ $co }} siswa<br>
                          Siswa Perempuan: {{ $ce }} siswa
                        </div>
                      </div>
                      <?php
                        }
                      ?>
                      @if(Session::has('berhasil'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('berhasil') }}
                        </div>
                      </div>
                      @endif
                      <table class="table table-sm table-striped">
                        @if($kelas->isEmpty())
                          <div class="alert alert-danger alert-dismissible show fade" align="center"><div class="alert-body">Belum ada siswa dalam kelas ini.</div></div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th></th>
                          </tr>
                          @foreach($kelas as $r)
                            <tr>
                              <td style="vertical-align: middle;">{{ $r->users->siswa->nis }}</td>
                              <td style="vertical-align: middle;">{{ $r->users->siswa->nisn }}</td>
                              <td style="vertical-align: middle;">{{ $r->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">
                                @if($r->users->jks == '1')
                                  <div class="badge badge-success">Laki-Laki</div>
                                @else
                          	  	  <div class="badge badge-info">Perempuan</div>
                                @endif
                              </td>
                              <td>
                                <a href=" {{ route('ukelas', $r->id) }}" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>