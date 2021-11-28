              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kelas</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0 table-sm">
                      @if($kls->isEmpty())
                        <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">
                          @if(Auth::user()->levels_id == 8)
                            Anda belum memiliki kelas.
                          @else
                            Anda belum pernah menjadi wali kelas.
                          @endif
                        </div></div>
                      @else
                        <tr>
                          <th>Angkatan</th>
                          <th>Kelas</th>
                          <th>Wali Kelas</th>
                          <th></th>
                        </tr>
                        @foreach ($kls as $r)  
                          <tr>
                            <td style="vertical-align: middle;">{{ $r->angkatans->tahun }}</td>
                            <td style="vertical-align: middle;">{{ $r->nama }}</td>
                            <td style="vertical-align: middle;">{{ $r->wali->name }}</td>
                            <td>
                              <a href="{{ route('listkelas.show', $r->id) }}" class="btn btn-sm btn-warning">Lihat Kelas</a>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </table>
                  </div>
                </div>
              </div>