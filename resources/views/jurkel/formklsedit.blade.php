            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Kelas</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('kelas.update', $kid->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                      <input type="hidden" name="id" value="{{ $kid->id }}">
                      <div class="form-group col-6">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama" value="{{ $kid->nama }}" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Wali Kelas</label>
                        <select class="form-control select2" name="wali">
                          <option value="{{ $kid->wali_id }}">{{ $kid->wali_id }} - {{ $kid->wali->name }}</option>
                          @foreach($wali as $r)
                            @if($r->id != $kid->wali_id)
                              <option value="{{ $r->id }}">{{ $r->id }} - {{ $r->name }}</option>
                            @endif
                          @endforeach
                        </select>
                        <small class="form-text text-muted">
                          <a style="color: red;">Wali saat ini {{ $kid->wali->name }}</a>
                        </small>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Jurusan</label>
                        <select name="jur" class="form-control">
                          <option value="{{ $kid->jurusans_id }}">{{ $kid->jurusans->nama }}</option>
                          @foreach($jur as $r)
                            @if($r->id != $kid->jurusans_id)
                              @if($r->id != 0)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                              @endif
                            @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label>Angkatan</label>
                        <select name="akt" class="form-control">
                          <option value="{{ $kid->angkatans_id }}">{{ $kid->angkatans->tahun }}</option>
                          @foreach($akt as $r)
                            @if($r->id != $kid->angkatans_id)
                              <option value="{{ $r->id }}">{{ $r->tahun }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>