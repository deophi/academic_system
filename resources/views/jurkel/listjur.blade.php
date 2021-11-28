            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Jurusan</h4>
                </div>
                <div class="card-body">
                  @if(Session::has('jberhasil'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('jberhasil') }}
                      </div>
                    </div>
                  @endif

                  @if(Session::has('jhapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('jhapus') }}
                      </div>
                    </div>
                  @endif
                  <table class="table table-sm table-striped">
                    @if($jur->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada jurusan.</div></div>
                    @else
                    <tr>
                      <th>Nama Jurusan</th>
                      <th></th>
                    </tr>
                    @foreach($jur as $r)
                      @if($r->id > 0)
                        <tr>
                          <td style="vertical-align: middle;">{{ $r->nama }}</td>
                          <td>
                            <form action="{{ route('jurusan.destroy', $r->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form> 
                          </td>
                        </tr>
                      @endif
                    @endforeach
                    @endif
                  </table>
                  {{ $jur->links() }}
                </div>
              </div>
            </div>