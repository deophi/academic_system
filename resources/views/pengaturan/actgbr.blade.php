                <div class="card">
                  <div class="card-header">
                    <h4>Gambar Kegiatan {{ $act->nama }}</h4>
                  </div>
                  <div class="card-body">
                    @if(Session::has('tambah'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('tambah') }}
                        </div>
                      </div>
                    @elseif(Session::has('hapus'))
                      <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('hapus') }}
                        </div>
                      </div>
                    @endif
                    <?php $i = 1 ?>
                    <div class="row">
                      @foreach($img as $r)
                        @if($i < 5)
                          <div class="form-group col-3">
                            <img src="{{ asset('image/kegiatan/'.$r->img) }}" height="150px">
                            <form action="{{ route('kegiatan.destroy', $r->id) }}" method="post">
                              <input type="hidden" name="i" value="2">
                              @csrf
                              @method('delete')
                              <button class="btn btn-icon btn-danger btn-sm btn-block"><i class="fas fa-trash"></i></button>
                            </form>
                          </div>
                          <?php $i++ ?>
                        @else
                    </div>
                    <div class="row">
                          <?php $i = 1 ?>
                          <div class="form-group col-3">
                            <img src="{{ asset('image/kegiatan/'.$r->img) }}" height="150px">
                          </div>
                          <?php $i++ ?>
                        @endif
                      @endforeach
                    </div>
                    <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="2">
                      <input type="hidden" name="actid" value="{{ $act->id }}">
                      <div class="row">
                        <div class="form-group col-4">
                          <label>Upload Gambar</label>
                          <input type="file" name="gbr" class="form-control">
                        </div>
                        <div class="form-group col-2">
                          <label style="color: white;">0</label>
                          <button class="btn btn-block btn-primary">Upload</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>