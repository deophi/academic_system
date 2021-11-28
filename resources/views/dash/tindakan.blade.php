              <div class="card">
                <div class="card-header">
                  <h4>Butuh Tindakan</h4>
                  <div class="card-header-action">
                    <a href="{{ route('status.index') }}" class="btn btn-primary">Lihat Semua</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  	<table class="table table-striped mb-0 table-sm">
                  	  @if ($user->isEmpty())
                  	  	<div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Tidak ada akun yang membutuhkan tindakan.</div></div>
                  	  @else
                        <tr>
                          <th>Nama</th>
                          <th style="text-align: center;">Status</th>
                          <th>Tanggal Pembuatan</th>
                          <th></th>
                        </tr>
                  	  	@foreach ($user as $hasil => $r)
                  	  	  <tr>
                  	  	  	<td style="vertical-align: middle;">{{ $r->name }}</td>
                  	  	  	<td style="text-align: center; vertical-align: middle;">
                  	  	  	  @if($r->levels_id == "2")
                  	  	  		<div class="badge badge-danger">{{ $r->levels->nama }}</div>
                  	  	  	  @elseif($r->levels_id == "3")
                  	  	  	    <div class="badge badge-danger">{{ $r->levels->nama }}</div>
                  	  	  	  @else
                  	  	  	  	<div class="badge badge-warning">{{ $r->levels->nama }}</div>
                  	  	      @endif
                  	  	  	</td>
                  	  	  	<td style="vertical-align: middle;">{{ $r->created_at }}</td>
                  	  	  	<td>
                  	  	  	  <form action="{{ route('kegiatan.destroy', $r->id) }}" method="post">
                  	  	  	  	@csrf
                  	  	  	  	@method('delete')
                                <input type="hidden" name="i" value="3">
                  	  	  	  	<a href="{{ route('status.edit', $r->id) }}" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  	  	  	  	<button type="submit" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                  	  	  	  </form>
                  	  	  	</td>
                  	  	  </tr>
                  	  	@endforeach
                  	  @endif
                  	</table>
                  	{{ $user->links() }}
                  </div>
                </div>
              </div>