            <div class="row">
              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pegawai PNS - {{ $hal->nama }}</h4>
                    <div class="card-header-action">
                      <div class="dropdown dropleft">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Pilih Golongan</a>
                        <div class="dropdown-menu dropleft">
                          @foreach($gol as $r)
                            <a class="dropdown-item" href="{{ route('pegawai.show', $r->id) }}">{{ $r->nama }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info alert-dismissible show fade">
                      <div class="alert-body">
                        Laki-Laki: {{ $coyes }}<br>
                        Perempuan: {{ $ceyes }} 
                      </div>
                    </div>
                    <div class="table-responsive">
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      @if(Session::has('hapus'))
                        <div class="alert alert-danger alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('hapus') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped">
                        <tr>
                        @if($pgwyes->isEmpty())
                          <td><div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Pegawai PNS pada golongan ini tidak ada.</div></div></td>
                        </tr>
                        @else
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>No. HP</th>
                          <th></th>
                        </tr>
                        @foreach($pgwyes as $r)
                        <?php
                          $cek = App\Models\Pns::select('id')->where('users_id', $r->id)->first();
                        ?>
                          <tr>
                            <td style="vertical-align: middle;">{{ $cek->id }}</td>
                            <td style="vertical-align: middle;">{{ $r->name }}</td>
                            <td style="vertical-align: middle;">{{ $r->hp }}</td>
                            <td>
                              <form action="{{ route('pegawai.destroy', $cek->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-icon btn-sm"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $pgwyes->links() }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Data Guru PNS</h4>
                    <div class="card-header-action">
                      <a href="{{ route('pns.index') }}" class="btn btn-icon icon-left btn-warning btn-sm"><i class="far fa-edit"></i>Golongan PNS</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('gurupnsstore') }}" method="POST">
                      @csrf
                      <input type="hidden" name="index" value="1">
                      <div class="form-group">
                        <label>Guru</label>
                        <select name="uid" class="form-control select2">
                          @foreach($py as $r)
                            <?php
                              $nip = App\Models\Pns::where('users_id', $r->id)->first();
                            ?>
                            <option value="{{ $nip->id }}">{{ $r->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="id" class="form-control">
                        <small style="color: red;">Kosongkan jika tidak ingin mengubah NIP.</small>
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
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah Guru PNS</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>