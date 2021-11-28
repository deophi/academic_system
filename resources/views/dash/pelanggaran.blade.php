              <div class="card">
                <div class="card-header">
                  <h4>Pelanggaran</h4>
                </div>
                <div class="card-body">             
                  <ul class="list-unstyled list-unstyled-border">
                    @if($lgr->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Tidak ada pelanggaran di periode ini.</div></div>
                    @else
                      @foreach($lgr as $r)
                        <li class="media">
                          <img class="mr-3 rounded-circle" width="50" src="{{ asset('image/profil/'.$r->users->gambar) }}" alt="avatar">
                          <div class="media-body">
                            <div class="float-right text-primary">{{ $r->updated_at->diffForHumans() }}</div><br>
                            <div class="media-title">{{ $r->users->name }}</div>
                            <span class="text-small">{{ $r->jenis->nama }}</span></br>
                            <span class="text-small text-muted">{{ $r->keterangan }}</span>
                          </div>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                  @if($lgr->isNotEmpty())
                  <div class="text-center pt-1 pb-1">
                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                  @endif
                </div>
              </div>