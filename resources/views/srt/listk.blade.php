            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Klasifikasi {{ $id->nama }}</h4>
                  <div class="card-header-action">
                    <div class="dropdown dropleft">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Klasifikasi</a>
                      <div class="dropdown-menu dropleft">
                        <a class="dropdown-item" href="{{ route('klasifikasi.index') }}">000 - Umum</a>
                        @foreach($kd as $r)
                          @if($r-> id != 000)
                          <form action="{{ route('klasifikasi.destroy', $r->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="dropdown-item" href="{{ route('klasifikasi.show', $r->id) }}">{{ $r->id }} - {{ $r->nama }}</a></button>
                          </form>
                          @endif
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

                  <table class="table table-sm table-striped">
                    @if($k->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada klasifikasi.</div></div>
                    @else
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th></th>
                    </tr>
                    @foreach($k as $r)
                      <tr>
                        <td>{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>
                          <form action="{{ route('klasifikasi.destroy', $r->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                          </form> 
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </table>
                  {{ $k->links() }}
                </div>
              </div>
            </div>