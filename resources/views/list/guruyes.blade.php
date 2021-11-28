            <div class="row">
              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Guru Kategori {{ $kat }}</h4>
                    <div class="card-header-action">
                      <div class="dropdown dropleft">
                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Kategori</a>
                        <div class="dropdown-menu dropleft">
                          <a class="dropdown-item" href="{{ route('pelajaran.index') }}">Umum</a>
                          @foreach($jur as $r)
                            @if($r->id > 0)
                              <a class="dropdown-item" href="{{ route('gurukat', $r->id) }}">{{ $r->nama }}</a>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        @if(Session::has('mberhasil'))
                          <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('mberhasil') }}
                            </div>
                          </div>
                        @endif
                        @if(Session::has('mgagal'))
                          <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('mgagal') }}
                            </div>
                          </div>
                        @endif
                        @if($guruyes->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada guru terdaftar.</div></div>
                        @else
                        <tr>
                          <th style="text-align: center;">NIP</th>
                          <th>Nama</th>
                          <th>Mata Pelajaran</th>
                          <th></th>
                        </tr>
                        @foreach($guruyes as $r)
                          <tr>
                            <td style="text-align: center;">
                              <?php
                                $user = App\Models\Mapels::select('id')->where('users_id', $r->id)->where('nama', $r->nama)->first();
                                $nip  = App\Models\Pns::where('users_id', $r->id)->first();
                                if ($nip == NULL) {
                                  echo "-";
                                }else{
                                  echo $nip->id;
                                }
                              ?>
                            </td>
                            <td>{{ $r->users->name }}</td>
                            <td>{{ $r->nama }}</td>
                            <td>
                              <form action="{{ route('mapel.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $guruyes->links() }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Mata Pelajaran</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('ubahmapel') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Guru</label>
                        <select name="uid" class="form-control select2">
                          @foreach($gyes as $r)
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
                          <input type="text" class="form-control" name="mpl" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Perubahan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>