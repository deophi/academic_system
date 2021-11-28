            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Klasifikasi Dasar</h4>
                </div>
                <div class="card-body">
                  @if(Session::has('dberhasil'))
                    <div class="alert alert-info alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('dberhasil') }}
                      </div>
                    </div>
                  @endif

                  <table class="table table-sm table-striped">
                    @if($kd->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada klasifikasi.</div></div>
                    @else
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th></th>
                    </tr>
                    @foreach($kd as $r)
                      <tr>
                        <td>
                            {{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}
                        </td>
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
                  {{ $kd->links() }}
                </div>
              </div>
            </div>