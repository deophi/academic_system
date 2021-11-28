<div class="card">
  <div class="card-header">
    <h4>Gambar</h4>
  </div>
  <div class="card-body">
    @if(Session::has('logo'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          {{ Session('logo') }}
        </div>
      </div>
    @endif
    <div class="form-group">
      <label>Logo Sekolah</label>
      <form action="{{ route('pengaturan.update', 3) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="form-group col-4">
            <img src="{{ asset('image/set/'.$set->logo) }}" height="100px">
          </div>
          <div class="form-group col-8">
            <input type="file" name="logo" class="form-control">
            <label>Gunakan skala foto 1:1 agar hasil gambar yang baik.</label>
          </div>
        </div>
        <button class="btn btn-primary btn-sm btn-block">Simpan Gambar</button>
      </form>
    </div>
    <div class="form-group">
      <label>Logo KOP Surat</label>
      <form action="{{ route('pengaturan.update', 4) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="form-group col-4">
            <img src="{{ asset('image/set/'.$set->kop) }}" height="100px">
          </div>
          <div class="form-group col-8">
            <input type="file" name="kop" class="form-control">
            <label>Gunakan skala foto 1:1 agar hasil gambar yang baik.</label>
          </div>
        </div>
        <button class="btn btn-primary btn-sm btn-block">Simpan Gambar</button>
      </form>
    </div>
    <div class="form-group">
      <label>Tanda Tangan Kepala Sekolah</label>
      <form action="{{ route('pengaturan.update', 6) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="form-group col-4">
            <img src="{{ asset('image/set/'.$set->ttd) }}" height="100px">
          </div>
          <div class="form-group col-8">
            <input type="file" name="ttd" class="form-control">
            <label>Gunakan skala foto 4:3 agar hasil gambar yang baik.</label>
          </div>
        </div>
        <button class="btn btn-primary btn-sm btn-block">Simpan Gambar</button>
      </form>
    </div>
  </div>
</div>