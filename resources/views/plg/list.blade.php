            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Poin Pelanggaran</h4>
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
                      <th>Nama Pelanggaran</th>
                  	  <th>Poin Pelanggaran</th>
                  	  <th></th>
                  	</tr>
                  	@foreach($lgr as $r)
                      <tr>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->poin }}</td>
                  	    <td>
                          <form action="{{ route('pelanggaran.destroy', $r->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                          </form> 
                  	    </td>
                  	  </tr>
                  	@endforeach
                  </table>
                  {{ $lgr->links() }}
                </div>
              </div>
            </div>