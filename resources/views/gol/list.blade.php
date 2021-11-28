              <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Golongan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        @if(Session::has('berhasil'))
                          <div class="alert alert-info alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('berhasil') }}
                            </div>
                          </div>
                        @endif
                        @if(Session::has('gagal'))
                          <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert"><span>&times;</span></button>
                              {{ Session('gagal') }}
                            </div>
                          </div>
                        @endif
                        @if($gol->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada Golongan PNS.</div></div>
                        @else
                        <tr>
                          <th>Nama Golongan</th>
                          <th></th>
                        </tr>
                        @foreach($gol as $r)
                          <tr>
                            <td>{{ $r->nama }}</td>
                            <td>
                              <form action="{{ route('pns.destroy', $r->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a class="btn btn-icon btn-sm btn-primary"><i class="fas fa-pencil-alt" style="color: white"></i></a>
                                <button type="submit" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        @endif
                      </table>
                      {{ $gol->links() }}
                    </div>
                  </div>
                </div>
              </div>