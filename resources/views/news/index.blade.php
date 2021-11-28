@section('news')
	class="active"
@endsection

@section('judul', 'Halaman Artikel')

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
                    <h4>Daftar Artikel</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="{{ route('artikel.create') }}" class="btn btn-icon icon-left btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Buat Artikel</a>
                        <br><br>
                      @if(Session::has('berhasil'))
                        <div class="alert alert-success alert-dismissible show fade">
                          <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ Session('berhasil') }}
                          </div>
                        </div>
                      @endif
                      <table class="table table-sm table-striped">
                        @if($news->isEmpty())
                          <div class="alert alert-info alert-dismissible show fade" align="center"><div class="alert-body">Belum ada Artikel yang dibuat.</div></div>
                        @else
                          <tr>
                            <th>Judul Artikel</th>
                            <th>Tanggal</th>
                            <th></th>
                          </tr>
                          @foreach($news as $r)
                            <tr>
                              <td>{{ $r->judul }}</td>
                              <td>{{ $r->created_at->translatedFormat('l, d F Y') }}</td>
                              <td>
                                <form action="{{ route('artikel.destroy', $r->id) }}" method="post">
                                  <a href="{{ route('show', $r->judul) }}" class="btn btn-sm btn-icon btn-warning" target="_blank"><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('artikel.edit', $r->id) }}" class="btn btn-sm btn-icon btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </table>
                      {{ $news->links() }}
                    </div>
                  </div>
                </div>
@endif

@include('dash.foot')