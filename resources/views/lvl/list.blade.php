            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Jabatan</h4>
                </div>
                <div class="card-body">
                  @if(Session::has('berhasil'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('berhasil') }}
                      </div>
                    </div>
                  @endif

                  @if(Session::has('hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('hapus') }}
                      </div>
                    </div>
                  @endif
                  <table class="table table-sm table-striped">
                  	<tr>
                      <th>No</th>
                  	  <th>Nama Jabatan</th>
                  	  <th></th>
                  	</tr>
                  	@foreach($lvl as $no => $r)
                  	  <tr>
                        <td>{{ $no + $lvl->firstitem() }}</td>
                  	    <td>{{ $r->nama }}</td>
                  	    <td>
                          @if($r->id > "8")
                            <form action="{{ route('status.destroy', $r->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <a href=" {{ route('status.edit', $r->id) }}" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                              <button type="submit" class="btn btn-sm btn-icon btn-danger btn-action"><i class="fas fa-trash"></i></button>
                            </form>
                          @endif
                  	    </td>
                  	  </tr>
                  	@endforeach
                  </table>
                  {{ $lvl->links() }}
                </div>
              </div>
            </div>