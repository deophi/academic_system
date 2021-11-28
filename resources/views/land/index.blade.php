@include('land.head')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>SMA Negeri 1 Anyer</h1>
          <h2>{{ $abt->slog }}</h2>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img">
          <img src="{{ asset('image/set/'.$set->logo) }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    @if($abt->sambutan != NULL)
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
            <img src="image/set/{{ $abt->gbrsam }}" width="100%">
          </div>
          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Sambutan Kepala Sekolah</h3>
            <p>{!! $abt->sambutan !!}</p>
          </div>
        </div>
        @if($abt->ytembed != NULL)
        <br>
        <div class="row">
          <div class="form-group col-md-2"></div>
          <div class="form-group col-md-8">
            <iframe class="col-12 col-md-12 justify-content-center" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="788.54" height="443" type="text/html" src="https://www.youtube.com/embed/{{ $abt->ytembed }}"></iframe>
          </div>
          <div class="form-group col-md-2"></div>
        </div>
        @endif
      </div>
    </section><!-- End About Section -->
    @endif

    <!-- ======= Testimonials Section ======= -->
    @if($news->isNotEmpty())
    <section id="news" class="testimonials">
      <div class="container position-relative">
        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($news as $r)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('image/news/'.$r->gbr) }}" class="testimonial-img" alt="">
                <h3><a href="{{ route('show', $r->judul) }}" style="color: white;">{{ $r->judul }}</a></h3>
                <h4>{{ $r->alt }}</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {!! Str::limit($r->isi, 600) !!}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
    @endif
    
    @if($prof->isNotEmpty())
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Profil Sekolah</h2>
        </div>
        <div class="row">
          @foreach($prof as $r)
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar4-week" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="{{ route('show', $r->judul) }}">{{ $r->judul }}</a></h4>
              @if($r->sub == NULL && $r->gbr != NULL)
                <p class="description">Gambar...<br><br><br><br></p>
              @else
                <p class="description">{{ Str::limit($r->sub, 110) }}</p>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->
    @endif

    <!-- ======= Portfolio Section ======= -->
    @if($act->isNotEmpty())
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2>Kegiatan Siswa</h2>
        </div>

        <div class="row portfolio-container">
          @foreach($act as $r)
            <?php
              $img = App\Models\Imgacts::where('kegiatans_id', $r->id)->inRandomOrder()->first();
            ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              @if($img != NULL)
                <img src="{{ asset('image/kegiatan/'.$img->img) }}" class="img-fluid" alt="">
              @endif
              <div class="portfolio-info">
                <h4>{{ $r->nama }}</h4>
                <div class="portfolio-links">
                  @if($img != NULL)
                    <a href="{{ asset('image/kegiatan/'.$img->img) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $r->nama }}"><i class="bx bx-plus"></i></a>
                  @endif
                <a href="{{ route('show', $r->nama) }}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    @endif
    
    <section id="crt" class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2>Kurikulum & Kesiswaan</h2>
        </div>
        <div class="row portfolio-container">
          <div class="col-lg-4 col-md-6 portfolio-item">
            <h5 align="center">Guru</h5>
            <canvas id="GuruChart"></canvas>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <h5 align="center">Siswa</h5>
            <canvas id="SiswaChart"></canvas>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item">
            <h5 align="center">Tenaga Kependidikan</h5>
            <canvas id="PegawaiChart"></canvas>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@include('land.foot')