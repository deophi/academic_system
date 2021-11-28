                <div class="card">
                  <div class="card-header">
                    <h4>Sambutan Kepala Sekolah</h4>
                  </div>
                  <div class="card-body">
                    @if(Session::has('sambut'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('sambut') }}
                        </div>
                      </div>
                    @endif
                      <form action="{{ route('pengaturan.update', 7) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Gambar Sambutan</label>
                        <div class="col-sm-12 col-md-2">
                          <img src="{{ asset('image/set/'.$abt->gbrsam) }}" width="150px">
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                            <input type="file" name="gbrsam" class="form-control">
                          </div>
                          <div class="form-group">
                            <button class="btn btn-block btn-primary">Simpan Gambar</button>
                          </div>
                        </div>
                    </div>
                      </form>
                    <form action="{{ route('pengaturan.update', 5) }}" method="post">
                      @csrf
                      @method('patch')
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Kalimat Sambutan</label>
                        <div class="col-sm-12 col-md-9">
                          <textarea class="summernote" name="sambut" required>{{ $abt->sambutan }}</textarea>
                          <button class="btn btn-block btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>