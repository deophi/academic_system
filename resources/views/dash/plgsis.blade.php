              <div class="card">
                <div class="card-header">
                  <h4>Pelanggaran Anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  	<table class="table table-striped mb-0 table-sm">
                  	  @if($fls->isEmpty())
                        <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Anda tidak memiliki pelanggaran, terus pertahankan menjadi siswa disiplin dan mentaati aturan.</div></div>
                  	  @else
                        <tr>
                          <th>Jenis Pelanggaran</th>
                          <th>Poin</th>
                          <th>Waktu</th>
                          <th>Keterangan</th>
                        </tr>
                  	  	@foreach ($fls as $r)  
                  	  	  <tr>
                  	  	  	<td>{{ $r->jenis->nama }}</td>
                            <td text-align="center">
                              @if($r->jenis->poin > 30)
                                <div class="badge badge-danger">{{ $r->jenis->poin }}</div>
                              @elseif($r->jenis->poin > 19)
                                <div class="badge badge-warning">{{ $r->jenis->poin }}</div>
                              @else
                                <div class="badge badge-info">{{ $r->jenis->poin }}</div>
                              @endif
                            </td>
                  	  	  	<td>{{ $r->created_at->translatedFormat('l, d F Y') }}</td>
                  	  	  	<td>{{ $r->keterangan }}</td>
                  	  	  </tr>
                  	  	@endforeach
                          <tr>
                            <td><b>Jumlah Poin</b></td>
                            <?php $poin = 0 ?>
                            @foreach($fls as $r)
                              <?php $poin = $poin + $r->jenis->poin ?>
                            @endforeach
                            @if($poin > 79)
                                <td><div class="badge badge-danger">{{ $poin }}</div></td>
                              @elseif($poin > 49)
                                <td><div class="badge badge-warning">{{ $poin }}</div></td>
                              @else
                                <td><div class="badge badge-info">{{ $poin }}</div></td>
                              @endif
                          </tr>
                  	  @endif
                  	</table>
                  	{{ $fls->links() }}
                  </div>
                </div>
              </div>