    <div class="card">
      <div class="card-header">
        <h4>Biodata Sekolah</h4>
      </div>
      <div class="card-body">
        @if(Session::has('bio'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert"><span>&times;</span></button>
              {{ Session('bio') }}
            </div>
          </div>
        @endif
        <form method="post" action="{{ route('pengaturan.update', 2) }}">
          @csrf
          @method('patch')
          <div class="row">
            <div class="form-group col-6">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" value="{{ $set->alamat }}" required>
            </div>
            <div class="form-group col-3">
              <label>Telepon</label>
              <input type="text" name="telp" class="form-control" value="{{ $set->telp }}" required>
            </div>
            <div class="form-group col-3">
              <label>Fax</label>
              <input type="text" name="fax" class="form-control" value="{{ $set->fax }}" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label>Website</label>
              <input type="text" name="web" class="form-control" value="{{ $set->web }}" required>
            </div>
            <div class="form-group col-6">
              <label>Email</label>
              <input type="text" name="mail" class="form-control" value="{{ $set->mail }}" required>
            </div>
          </div>
          <div class="form-group">
            <label>Slogan</label>
            <input type="text" name="slog" class="form-control" value="{{ $abt->slog }}" required>
          </div>
          <div class="form-group">
            <label>Youtube Video</label>
            <input type="text" name="yt" class="form-control" value="{{ $abt->ytembed }}">
            <small>Isi menggunakan kode link video. Contoh <a style="color: blue;">https://www.youtube.com/watch?v=</a><a style="color: red;">LAswuVLMt_I</a>. Maka copy & pastekan <a style="color: red;">LAswuVLMt_I</a>.</small>
          </div>
          <button class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>
    </div>