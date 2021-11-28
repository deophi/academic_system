            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kelas </h4>
                  Periode
                  @foreach($set as $r)
                    @if($idk == 0)
                      {{ $r->angkatans->tahun }}
                    @else
                      {{ $r->tahun }}
                    @endif
                  @endforeach
                  <div class="card-header-action">
                    <div class="dropdown dropleft">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Periode</a>
                      <div class="dropdown-menu dropleft">
                        @foreach($akt as $r)
                        <a class="dropdown-item" href="{{ route('kelas.show', $r->id) }}">{{ $r->tahun }}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  @if(Session::has('kberhasil'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('kberhasil') }}
                      </div>
                    </div>
                  @endif

                  @if(Session::has('khapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('khapus') }}
                      </div>
                    </div>
                  @endif

                  @if(Session::has('kgagal'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('kgagal') }}
                      </div>
                    </div>
                  @endif

                  <table class="table table-sm table-striped">
                    @if($kls->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada kelas.</div></div>
                    @else
                    <tr>
                      <th>Nama Kelas</th>
                      <th>Wali Kelas</th>
                      <th></th>
                    </tr>
                    @foreach($kls as $r)
                      <tr>
                        <td style="vertical-align: middle;">{{ $r->nama }}</td>
                        <td style="vertical-align: middle;">{{ $r->wali->name }}</td>
                        <td>
                          <form action="{{ route('kelas.destroy', $r->id) }}" method="post">
                            <a href="{{ route('kelas.edit', $r->id) }}" class="btn btn-sm btn-icon btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                          </form> 
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </table>
                  {{ $kls->links() }}
                </div>
              </div>
            </div>