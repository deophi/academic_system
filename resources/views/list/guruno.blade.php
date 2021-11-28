            <div class="row">
              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Guru Belum Terdaftar</h4>
                    <div class="card-header-form">
                      <div class="row">
                        <form action=" {{route('gurusrc')}} " method="get">
                          <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Search">
                            <div class="input-group-btn">
                              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                        @if($guruno->isEmpty())
                          <td><div class="alert alert-danger alert-dismissible show fade" align="center"><div class="alert-body">Guru yang anda cari tidak ditemukan.</div></div></td>
                        </tr>
                        @else
                          <th style="text-align: center;">NIP</th>
                          <th>Nama</th>
                          <th style="text-align: center;">Jenis Kelamin</th>
                        </tr>
                        @foreach($guruno as $r)
                          <tr>
                            <td style="text-align: center;">
                              <?php
                                $nip = App\Models\Pns::where('users_id', $r->id)->first();
                                if ($nip == NULL) {
                                  echo "-";
                                }else{
                                  echo $nip->id;
                                }
                              ?>
                            </td>
                            <td>{{ $r->name }}</td>
                            <td style="text-align: center;">
                              @if($r->jks == 1)
                                <div class="badge badge-success">Laki-Laki</div>
                              @else
                                <div class="badge badge-info">Perempuan</div>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $guruno->links() }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Mata Pelajaran</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('mapel.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Guru</label>
                        <select name="uid" class="form-control select2">
                          @foreach($gno as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                          <label>Kategori</label>
                          <select name="kat" class="form-control">
                            <option value="0">Umum</option>
                            @foreach($jur as $r)
                              <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label>Mata Pelajaran</label>
                          <input type="text" class="form-control" name="nama" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Mata Pelajaran</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>