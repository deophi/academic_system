            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Surat Tugas</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(Auth::user()->levels_id != 4)
                        <a href="{{ route('surattugas.create') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Buat Surat Tugas</a>
                      @endif
                      @if(Auth::user()->levels_id == 1 | Auth::user()->levels_id == 7)
                        <a href="{{ route('klasifikasi.index') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="far fa-edit"></i>Tambah Klasifikasi</a>
                      @endif
                      <br><br>
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      @if(Session::has('alert'))
                        <div class="alert alert-warning alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('alert') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped">
                        @if($srt->isEmpty())
                          <div class="alert alert-success alert-dismissible show fade" align="center"><div class="alert-body">Belum ada surat tugas yang dibuat.</div></div>
                        @else
                          <tr>
                            <th style="text-align: center;">No. Surat</th>
                            <th>Nama</th>
                            <th>Tujuan</th>
                            <th>Tempat</th>
                            <th>Waktu Penugasan</th>
                            <th></th>
                          </tr>
                          @foreach($srt as $r)
                            <tr>
                              <td style="text-align: center; vertical-align: middle;">{{ $r->idkeluar }}</td>
                              <td style="vertical-align: middle;">{{ $r->users->name }}</td>
                              <td style="vertical-align: middle;">{{ $r->tujuan }}</td>
                              <td style="vertical-align: middle;">{{ $r->tempat }}</td>
                              <td style="vertical-align: middle;">{{ Carbon\Carbon::parse($r->waktu)->translatedFormat('l, d F Y') }}</td>
                              @if(Auth::user()->levels_id != 4)
                                <td>
                                  <form action="{{ route('surattugas.destroy', $r->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('surattugas.edit', $r->id) }}" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('surattugas.show', $r->id) }}" target="_blank" class="btn btn-warning btn-sm btn-icon"><i class="fas fa-print"></i></a>
                                    <button class="btn btn-danger btn-sm btn-icon"><i class="fas fa-trash"></i></button>
                                  </form>
                                </td>
                              @else
                                <td>  
                                  <a href="{{ route('surattugas.show', $r->id) }}" target="_blank" class="btn btn-warning btn-sm btn-icon"><i class="fas fa-print"></i></a>
                                </td>
                              @endif
                            </tr>
                          @endforeach
                        @endif
                      </table>
                      {{ $srt->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>