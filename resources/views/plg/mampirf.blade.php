            <div class="card card-primary">
              <div class="card-header"><h4>Data Diri</h4></div>
      
              <div class="card-body">
                <form action="{{ route('storelgr') }}" method="POST">
                  @csrf
                  @foreach($m as $r)
                  <div class="row">
                    <div class="form-group col-6">
                      <label>NIPD Pelanggar</label>
                      <input type="text" class="form-control" value="{{ $r->users_id }}" disabled>
                      <input type="hidden" class="form-control" name="uid" value="{{ $r->users_id }}">
                    </div>
                    <div class="form-group col-6">
                      <label>Nama Pelanggar</label>
                      <input type="text" class="form-control" value="{{ $r->users->name }}" disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Kelas</label>
                      @foreach($u as $i)
                      <input type="text" class="form-control" value="{{ $i->kelas->nama }}" disabled>
                      @endforeach
                    </div>
                    <div class="form-group col-6">
                      <label>Pelanggaran</label>
                      <input type="hidden" name="jid" value="{{ $r->jenis_id }}">
                      <input type="text" class="form-control" value="{{ $r->jenis->nama }}" disabled>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jam ke</label>
                      <input type="text" class="form-control" value="{{ $r->jam }}" disabled>
                    </div>
                    <div class="form-group col-6">
                      <label>Mata Pelajaran</label>
                      <input type="text" class="form-control" value="{{ $r->mapel }}" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="hidden" name="ket" value="{{ $r->keterangan }}">
                    <input type="text" class="form-control" value="{{ $r->keterangan }}" disabled>
                  </div>

                  <input type="text" name="pid" value="{{ Auth::user()->id }}" hidden>
                  <div class="row">
                    <div class="form-group col-6">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Benar</button>
                    </div>
                    <div class="form-group col-6">
                      <a class="btn btn-primary btn-lg btn-block" href="{{ route('print', $r->users_id) }}" target="_blank">Cetak</a>
                    </div>
                  </div>
                  @endforeach
                </form>
              </div>
            </div>