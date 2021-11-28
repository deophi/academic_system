                <div class="card">
                  <div class="card-header">
                    <h4>Jadwal Pelajaran Kelas {{ $kls->kelas->nama }}</h4>
                    <div class="card-header-action">
                      <a href="{{ route('akademik.create') }}" target="_blank" class="btn btn-warning">Print Jadwal</a>
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
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($senin as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($selasa->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Selasa</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($selasa as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($rabu->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Rabu</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($rabu as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($kamis->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Kamis</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($kamis as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($jumat->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Jum'at</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($jumat as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif

                        @if($sabtu->isNotEmpty())
                        <table class="table table-sm table-striped">
                          <tr>
                            <th rowspan="8" style="text-align: center; vertical-align: middle; width: 150px;">Sabtu</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                          </tr>
                          @foreach($sabtu as $r)
                            <tr>
                              <td>{{ $r->mapels->nama }}</td>
                              <td>{{ $r->mapels->users->name }}</td>
                              <td>{{ $r->awal }} - {{ $r->akhir }}</td>
                            </tr>
                          @endforeach
                        </table>
                        @endif
                        @endif
                    </div>
                  </div>
                </div>