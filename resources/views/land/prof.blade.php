@section('judul', $cont->judul)

@include('land.head')
  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Profil Sekolah</h2>
          <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>{{ $cont->judul }}</li>
          </ol>
        </div>
      </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="portfolio-description">
          <h2>{{ $cont->judul }}</h2>
          <img src="image/artikel/{{ $cont->gbr }}" class="img-fluid" alt="">
          {!! $cont->isi !!}
        </div>
      </div>
    </section>
  </main>
@include('land.foot')