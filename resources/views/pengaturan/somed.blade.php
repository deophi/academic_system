    <div class="card">
      <div class="card-header">
        <h4>Media Sosial</h4>
      </div>
      <div class="card-body">
        @if(Session::has('soc'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert"><span>&times;</span></button>
              {{ Session('soc') }}
            </div>
          </div>
        @endif
        <form method="post" action="{{ route('pengaturan.update', 8) }}">
          @csrf
          @method('patch')
          <div class="row">
            <div class="form-group">
              <label>Isi dengan kode link seperti <a style="color: red;">warna merah</a> pada contoh.</label>
            </div>
            <div class="form-group col-6">
              <label>Youtube</label>
              <input type="text" name="yt" class="form-control" value="{{ $sm->yt }}">
              <small>https://www.youtube.com/channel/<a style="color: red;">kode</a></small>
            </div>
            <div class="form-group col-6">
              <label>Instagram</label>
              <input type="text" name="ig" class="form-control" value="{{ $sm->ig }}">
              <small>https://www.instagram.com/<a style="color: red;">kode</a></small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label>Facebook</label>
              <input type="text" name="fb" class="form-control" value="{{ $sm->fb }}">
              <small>https://www.facebook.com/<a style="color: red;">kode</a></small>
            </div>
            <div class="form-group col-6">
              <label>Twitter</label>
              <input type="text" name="tw" class="form-control" value="{{ $sm->tw }}">
              <small>https://twitter.com/<a style="color: red;">kode</a></small>
            </div>
          </div>
          <button class="btn btn-primary btn-block">Simpan</button>
        </form>
      </div>
    </div>