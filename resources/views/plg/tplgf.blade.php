            <div class="card card-primary">
              <div class="card-header"><h4>Data Diri</h4></div>
              <div class="card-body">
                <form action="{{ route('storelgr') }}" method="POST">
                	@csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Pelanggar</label>
                      <select class="form-control select2" name="uid">
                        @foreach($user as $r)
                          <option value="{{ $r->id }}">{{ $r->siswa->nis }} - {{ $r->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Pelanggaran</label>
                      @if($jns->isEmpty())
                        <div><a href="{{ route('pelanggaran.create') }}" class="btn btn-primary btn-sm">Buat Jenis Pelanggaran</a></div>
                      @else
                        <select class="form-control" name="jid">
                          @foreach($jns as $r)
                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                          @endforeach
                        </select>
                      @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jam ke</label>
                      <input type="text" name="jam" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <input type="text" name="mapel" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="textbox" class="form-control" name="ket">
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah</button>
                  </div>
                </form>
              </div>
		        </div>

