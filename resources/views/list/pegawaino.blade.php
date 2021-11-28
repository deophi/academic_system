            <div class="row">
              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pegawai Non-PNS</h4>
                    <div class="card-header-form">
                      <div class="row">
                        <form action=" {{ route('pgwsrc') }} " method="get">
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
                    <div class="alert alert-info alert-dismissible show fade">
                      <div class="alert-body">
                        Laki-Laki: {{ $cono }}<br>
                        Perempuan: {{ $ceno }} 
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                        @if($pgwno->isEmpty())
                          <td><div class="alert alert-danger alert-dismissible show fade" align="center"><div class="alert-body">Pegawai Non-PNS yang anda cari tidak ditemukan.</div></div></td>
                        </tr>
                        @else
                          <th>Nama</th>
                          <th style="text-align: center;">Jenis Kelamin</th>
                          <th>No. HP</th>
                        </tr>
                        @foreach($pgwno as $r)
                          <tr>
                            <td>{{ $r->name }}</td>
                            <td style="text-align: center;">
                              @if($r->jks == 1)
                                <div class="badge badge-success">Laki-Laki</div>
                              @else
                                <div class="badge badge-info">Perempuan</div>
                              @endif
                            </td>
                            <td>{{ $r->hp }}</td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $pgwno->links() }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Pegawai PNS</h4>
                    <div class="card-header-action">
                      <a href="{{ route('pns.index') }}" class="btn btn-icon icon-left btn-warning btn-sm"><i class="far fa-edit"></i>Golongan PNS</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('gurupnsstore') }}" method="POST">
                      @csrf
                      <input type="hidden" name="index" value="0">
                      <div class="form-group">
                        <label>Pegawai</label>
                        <select name="uid" class="form-control select2">
                          @foreach($pn as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="id" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Golongan</label>
                        <select class="form-control select2" name="gol">
                          @foreach($gol as $r)
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah Pegawai PNS</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>