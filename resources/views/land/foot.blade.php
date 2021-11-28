  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SMAN 1 Anyer</h3>
            <p>
              {{ $set->alamat }} <br>
              <strong>Telepon:</strong> {{ $set->telp }}<br>
              <strong>Email:</strong> {{ $set->mail }}<br>
            </p>
          </div>

          @if($prof->isNotEmpty())
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Profil Sekolah</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{ route('index') }}">Beranda</a></li>
                @foreach($prof as $r)
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('show', $r->judul) }}">{{ $r->judul }}</a></li>
                @endforeach
              </ul>
            </div>
          @endif

          @if($act->isNotEmpty())
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Kegiatan Siswa</h4>
              <ul>
                @foreach($act as $r)
                  <li><i class="bx bx-chevron-right"></i> <a href="{{ route('show', $r->nama) }}">{{ $r->nama }}</a></li>
                @endforeach
              </ul>
            </div>
          @endif

          @if($sosin == 1)
            <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <p>Ikuti kami di media sosial untuk mendapatkan berbagai informasi penting.</p>
            <div class="social-links mt-3">
              @if($m->yt != NULL)
                <a href="https://www.youtube.com/channel/{{ $m->yt }}"><i class="bx bxl-youtube"></i></a>
              @endif
              @if($m->fb != NULL)
                <a href="https://www.facebook.com/{{ $m->fb }}"><i class="bx bxl-facebook"></i></a>
              @endif
              @if($m->tw != NULL)
                <a href="https://www.twitter.com/{{ $m->tw }}"><i class="bx bxl-twitter"></i></a>
              @endif
              @if($m->ig != NULL)
                <a href="https://www.instagram.com/{{ $m->ig }}"><i class="bx bxl-instagram"></i></a>
              @endif
            </div>
          </div>
          @endif

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Butterfly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('land/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('land/vendor/glightbox/js/glightbox.min.j') }}s"></script>
  <script src="{{ asset('land/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('land/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('land/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('land/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('land/js/main.js') }}"></script>
  <script src="{{ asset('chart.js') }}"></script>
  @if($index == 0)

  <script>
    var ctx = document.getElementById("SiswaChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            {{ $jx }},
            {{ $jxi }},
            {{ $jxii }},
            ],
            backgroundColor: [
            '#6777ef',
            '#fc544b',
            '#ffa426',
            ],
            label: ['dataset1'],
          }],
          labels: [
          'Kelas X {{ $px }}%',
          'Kelas XI {{ $pxi }}%',
          'Kelas XII {{ $pxii }}%'
          ],
        },
        options: {
          responsive: true,
          legend: {
            position: 'bottom',
          },
        }
      });

    var ctx = document.getElementById("GuruChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            {{ $gp }},
            {{ $gn }},
            ],
            backgroundColor: [
            '#6777ef',
            '#fc544b',
            ],
            label: ['dataset1'],
          }],
          labels: [
          'PNS {{ $pgp }}%',
          'Non-PNS {{ $pgn }}%'
          ],
        },
        options: {
          responsive: true,
          legend: {
            position: 'bottom',
          },
        }
      });

    var ctx = document.getElementById("PegawaiChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          data: [
            {{ $pp }},
            {{ $pn }},
            ],
            backgroundColor: [
            '#6777ef',
            '#fc544b',
            ],
            label: ['dataset1'],
          }],
          labels: [
          'PNS {{ $ppp }}%',
          'Non-PNS {{ $ppn }}%'
          ],
        },
        options: {
          responsive: true,
          legend: {
            position: 'bottom',
          },
        }
      });
  </script>
  
  @endif
</body>

</html>