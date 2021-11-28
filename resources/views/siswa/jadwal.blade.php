                <div class="card">
                  <div class="card-header">
                    <h4>Jadwal Pelajaran</h4>
                    <div class="card-header-action">
                      <a href="{{ route('printjdwl', $kls->id) }}" class="btn btn-warning" target="_blank">Cetak Jadwal</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
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
                          </tr>
                          @foreach($senin as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
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
                          </tr>
                          @foreach($selasa as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
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
                          </tr>
                          @foreach($rabu as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
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
                          </tr>
                          @foreach($kamis as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
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
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
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
                          </tr>
                          @foreach($sabtu as $r)
                            <tr>
                              <td style="text-align: center;">{{ $r->mapels->nama }}</td>
                              <td style="text-align: center;">{{ $r->mapels->users->name }}</td>
                              <td style="text-align: center;">{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif
                        @endif
                    </div>
                  </div>
                </div>