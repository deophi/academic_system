              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Jadwal Pelajaran</h4>
                    <div class="card-header-action">
                      <a href="{{ route('jadwal.show', $idkls->id) }}" class="btn btn-warning">Buat Jadwal</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="{{ route('printjdwl', $idkls->id) }}" target="_blank" class="btn btn-primary">Cetak</a><br><br>
                      
                        @if(Session::has('jberhasil'))
                          <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('jberhasil') }}
                            </div>
                          </div>
                        @endif

                        @if($plj->isEmpty())
                          <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body" align="center">Jadwal Pelajaran Belum Dibuat.</div></div>
                        @else
                        @if($senin->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Senin</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($senin as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($selasa->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Selasa</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($selasa as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($rabu->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Rabu</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($rabu as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($kamis->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Kamis</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($kamis as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($jumat->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Jum'at</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($jumat as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($sabtu->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Sabtu</th>
                            <th style="text-align: center;">Mata Pelajaran</th>
                            <th style="text-align: center;">Guru</th>
                            <th style="text-align: center;">Jam</th>
                            <th></th>
                          </tr>
                          @foreach($sabtu as $r)
                            <tr>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="vertical-align: middle; text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                              <td width="75px">
                                <form action="{{ route('jadwal.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('jadwal.edit', $r->id) }}" class="btn btn-sm btn-primary btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                  <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </table>
                        @endif
                        @endif
                    </div>
                  </div>
                </div>
              </div>