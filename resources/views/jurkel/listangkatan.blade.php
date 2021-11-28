            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Angkatan Aktif</h4>
                </div>
                <div class="card-body">
                  @if(Session::has('aberhasil'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('aberhasil') }}
                      </div>
                    </div>
                  @endif

                  @if(Session::has('ahapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ Session('ahapus') }}
                      </div>
                    </div>
                  @endif
                  <table class="table table-sm table-striped">
                    @if($akt->isEmpty())
                      <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada angkatan.</div></div>
                    @else
                      <form method="post" action="{{ route('pengaturan.update', 1) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                          <select name="akt" class="form-control">
                            <option value="{{ $def->angkatans_id }}">{{ $def->angkatans->tahun }}</option>
                            @foreach($akt as $r)
                              @if($r->id != $def->angkatans_id)
                                <option value="{{ $r->id }}">{{ $r->tahun }}</option>
                              @endif
                            @endforeach
                          </select>  
                        </div>
                        <button class="btn btn-primary btn-block">Simpan</button>
                      </form>
                    @endif
                  </table>
                </div>
              </div>
            </div>