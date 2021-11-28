                <div class="card">
                  <div class="card-header">
                    <h4>Buat Artikel Profil Sekolah</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12">
                        @if($id == 0)
                          <form action="{{ route('profilsekolah.store') }}" method="post" enctype="multipart/form-data">
                        @else
                          <form action="{{ route('profilsekolah.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                          @method('patch')
                        @endif
                          @csrf
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-1">Judul</label>
                            <div class="col-sm-12 col-md-10">
                              <input type="text" class="form-control" name="judul"
                              @if($id != 0)
                                value="{{ $edit->judul }}" 
                              @endif
                              required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-1">Gambar</label>
                            <div class="col-sm-12 col-md-4">
                              <input type="file" class="form-control" name="gbr">
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-1">Isi</label>
                            <div class="col-sm-12 col-md-10">
                              <textarea class="summernote" name="isi">
                                @if($id != 0)
                                  {{ $edit->isi }} 
                                @endif
                              </textarea>
                              <button class="btn btn-primary btn-block">
                                @if($id == 0)
                                  Publish
                                @else
                                  Simpan Perubahan
                                @endif
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>