                <div class="card">
                  <div class="card-header">
                    <h4>Jumlah Poin Pelanggaran</h4>
                    <div class="card-header-form">
                      <div class="row">
                        <form action=" {{route('jmlpoinsrc')}} " method="get">
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
                      <table class="table table-sm table-striped" id="table-1">
                        @if($fls->isEmpty())
                          <div class="alert alert-success alert-dismissible show fade" align="center"><div class="alert-body">Belum ada pelanggaran pada tahun ini.</div></div>
                        @else
                          <tr>
                            <th>NIPD</th>
                            <th>Nama</th>
                            <th style="text-align: center;">Jumlah Poin</th>
                          </tr>
                          <?php
                            $poin = 0;
                            $id0  = 0;
                          ?>
                          @foreach($fls as $r)
                            <?php
                              $id1  = $r->users_id;
                            ?>
                            
                            @if($id0 == 0)
                              <?php
                                $id0  = $r->users_id;
                                $poin = $poin + $r->jenis->poin;
                                $nis  = $r->users_id;
                                $nama = $r->users->name;
                              ?>
                            @elseif($id0 == $id1)
                              <?php
                                $id0  = $r->users_id;
                                $poin = $poin + $r->jenis->poin;
                                $nis  = $r->users_id;
                                $nama = $r->users->name;
                              ?>
                            @else
                            <tr>
                              <?php
                                $cetak = App\Models\Siswas::where('users_id', $id0)->first();
                              ?>
                              <td>{{ $cetak->nis }}</td>
                              <td>{{ $nama }}</td>
                              <td style="text-align: center;">
                                @if($poin > 79)
                                  <div class="badge badge-danger">{{ $poin }}</div>
                                @elseif($poin > 49)
                                  <div class="badge badge-warning">{{ $poin }}</div>
                                @else
                                  <div class="badge badge-info">{{ $poin }}</div>
                                @endif
                              </td>
                            </tr>
                            <?php
                              $id0 = $r->users_id;
                              $poin = $r->jenis->poin;
                              $nama = $r->users->name;
                              ?>
                            @endif
                          @endforeach
                          <?php
                            $cetak = App\Models\Siswas::where('users_id', $nis)->first();
                          ?>
                          <tr>
                              <td>{{ $cetak->nis }}</td>
                              <td>{{ $nama }}</td>
                              <td style="text-align: center;">
                                @if($poin > 79)
                                  <div class="badge badge-danger">{{ $poin }}</div>
                                @elseif($poin > 49)
                                  <div class="badge badge-warning">{{ $poin }}</div>
                                @else
                                  <div class="badge badge-info">{{ $poin }}</div>
                                @endif
                              </td>
                            </tr>
                        @endif
                      </table>
                    </div>
                  </div>
                </div>