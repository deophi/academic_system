                <div class="card">
                  <div class="card-header">
                    <h4>
                      @if($index == 0)
                        Kegiatan Siswa Baru
                      @else
                        Deskripsi Kegiatan
                      @endif
                    </h4>
                  </div>
                  <div class="card-body">
                    @if(Session::has('ubah'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert"><span>&times;</span></button>
                          {{ Session('ubah') }}
                        </div>
                      </div>
                    @endif
                    <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12">
                        @if($index == 0)
                          <form action="{{ route('kegiatan.store') }}" method="post">
                            <input type="hidden" name="id" value="1">
                        @else
                          <form action="{{ route('kegiatan.update', $act->id) }}" method="post">
                            @method('patch')
                        @endif
                          @csrf
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Nama Kegiatan</label>
                            <div class="col-sm-12 col-md-9">
                              <input type="text" class="form-control" name="nama"
                              @if($index == 1)
                                value="{{ $act->nama }}"
                              @endif
                              required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Pembina</label>
                            <div class="col-sm-12 col-md-9">
                              <select class="form-control select2" name="pembina">
                                @if($index == 1)
                                  <option value="{{ $act->users_id }}">{{ $act->users->name }}</option>
                                  @foreach($pb as $r)
                                    @if($r->id != $act->users_id)
                                      <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endif
                                  @endforeach
                                @else
                                  @foreach($pb as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Deskripsi Kegiatan</label>
                            <div class="col-sm-12 col-md-9">
                              <textarea class="summernote" name="desk">
                                @if($index == 1)
                                  {!! $act->isi !!}
                                @endif
                              </textarea>
                              <button class="btn btn-primary btn-block">
                                @if($index == 0)
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