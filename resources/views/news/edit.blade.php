@section('news')
	class="active"
@endsection

@section('judul', 'Buat Artikel')

@include('dash.head')
@include('dash.side')

@if(Auth::user()->levels_id != 1)
  <div class="alert alert-info">
    <div class="alert-title">Mohon Maaf {{ Auth::user()->name }}</div>
    Anda tidak dapat mengakses halaman ini.
  </div>
@else
                <div class="card">
                  <div class="card-header">
                    <h4>Form Edit Artikel</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12">
                        <form method="post" action="{{ route('artikel.update', $news->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('patch')
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Judul</label>
                            <div class="col-sm-12 col-md-9">
                              <input type="text" class="form-control" name="judul" value="{{ $news->judul }}" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Gambar</label>
                            <div class="col-6 col-md-4">
                              <input type="file" name="gbr" class="form-control">
                            </div>
                            <div class="col-6 col-md-4">
                              <img src="{{ asset('image/news/'.$news->gbr) }}" width="100%">
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-1 col-lg-2">Isi</label>
                            <div class="col-sm-12 col-md-9">
                              <textarea class="summernote" name="isi" required>{{ $news->isi }}</textarea>
                              <button class="btn btn-primary btn-block">Simpan Perubahan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
@endif

@include('dash.foot')