@section('judul', $news->judul)

@include('land.head')
  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Informasi Terbaru</h2>
          <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>{{ $news->judul }}</li>
          </ol>
        </div>
      </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="portfolio-description">
          <h2>{{ $news->judul }}</h2>
          <img src="image/news/{{ $news->gbr }}" class="img-fluid" alt="">
          <br><br>
          {!! $news->isi !!}
        </div>
      </div>
    </section>
  </main>
@include('land.foot')