                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Surat Tugas</h4>
                    <div class="card-header-action">
                      <a href="{{ route('surattugas.index') }}" class="btn btn-warning">Lihat Semua</a>
                    </div>
                  </div>
                  <div class="card-body">
                     <table class="table table-sm table-striped">
                      @if($srt->isEmpty())
                        <div class="alert alert-success alert-dismissible show fade" align="center"><div class="alert-body">Belum ada surat tugas yang dibuat.</div></div>
                      @else
                        <tr>
                          <th>Nama</th>
                          <th>Tujuan</th>
                          <th>Tempat</th>
                          <th>Waktu Penugasan</th>
                        </tr>
                        @foreach($srt as $r)
                          <tr>
                            <td>{{ $r->users->name }}</td>
                            <td>{{ $r->tujuan }}</td>
                            <td>{{ $r->tempat }}</td>
                            <td>{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y') }}</td>
                          </tr>
                        @endforeach
                      @endif
                    </table>
                  </div>
                </div>