<div class="col-12 col-md-12 col-lg-7">
  <div class="card">
    <form method="post" action="{{ route('profil.update', Auth::user()->id) }}" class="needs-validation">
      @csrf
      @method('patch')
      <div class="card-header">
        <h4>Akun</h4>
        <div class="card-header-action">
          <a href="{{ route('pass') }}" class="btn btn-warning">Ganti Password</a>
        </div>
      </div>
      <div class="card-body">
        @if(Session::has('pesan'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert"><span>&times;</span></button>
              {{ Session('pesan') }}
            </div>
          </div>
        @endif

        @if(Auth::user()->levels_id == 8)
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>NIPD</label>
              <input type="text" name="nis" class="form-control" value="{{ $sis->nis }}" required>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>NISN</label>
              <input type="text" name="nisn" class="form-control" value="{{ $sis->nisn }}" required>
            </div>
          </div>
        @elseif($pns != NULL)
          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" value="{{ $pns->id }}" disabled>
          </div>
        @endif
        @if(Auth::user()->levels_id == 1)
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}">
          </div>
        @elseif(Auth::user()->levels_id < 8)
          <div class="row">
            <div class="form-group col-3">
              <label>Gelar Depan</label>
              <input type="text" name="gd" class="form-control" value="{{ $pgs->gd }}">
            </div>
            <div class="form-group col-6">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group col-3">
              <label>Gelar Belakang</label>
              <input type="text" name="gb" class="form-control" value="{{ $pgs->gb }}">
            </div>
          </div>
        @else
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}">
          </div>
        @endif
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group col-md-6 col-12">
            <label>Jenis Kelamin</label>
            <div class="selectgroup w-100">
              <label class="selectgroup-item">
                <input type="radio" name="jks" value="1" class="selectgroup-input"
                  @if(Auth::user()->jks == 1)
                    checked
                  @endif
                >
                <span class="selectgroup-button">Laki-Laki</span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="jks" value="2" class="selectgroup-input"
                  @if(Auth::user()->jks == 2)
                    checked
                  @endif
                >
                <span class="selectgroup-button">Perempuan</span>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}" required>
        </div>
        <div class="row">
          <div class="form-group col-4">
            <label>Phone</label>
            <input type="tel" name="hp" class="form-control" value="{{ Auth::user()->hp }}" required>
          </div>
          <div class="form-group col-4">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat" class="form-control" placeholder="Serang" value="{{ Auth::user()->tempat }}" required>
          </div>
          <div class="form-group col-4">
            <label>Tanggal Lahir</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="text" class="form-control datepicker" name="lahir" value="{{ Auth::user()->lahir }}">
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block">Simpan</button>
      </div>
    </form>
  </div>
</div>