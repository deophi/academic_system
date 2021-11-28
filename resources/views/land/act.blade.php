@section('judul', $kgt->nama)

@include('land.head')
  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Profil Sekolah</h2>
          <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li>{{ $kgt->nama }}</li>
          </ol>
        </div>
      </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="portfolio-details-container">
          <div class="owl-carousel portfolio-details-carousel">
            @foreach($img as $r)
              <img src="{{ asset('image/kegiatan/'.$r->img) }}" class="img-fluid" alt="">
            @endforeach
          </div>

          <div class="portfolio-info">
            <h3>Keterangan</h3>
            <ul>
              <li><strong>Pembina:</strong></li>
              <li>{{ $pgs->gd }} {{ $kgt->users->name }}, {{ $pgs->gb }}</li>
            </ul>
          </div>

        </div>
        <div class="portfolio-description">
          <h2>{{ $kgt->nama }}</h2>
          {!! $kgt->isi !!}
        </div>
      </div>
    </section>
  </main>
@include('land.foot')