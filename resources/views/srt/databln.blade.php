                <div class="card">
                  <div class="card-header">
                    <h4>Statistik Surat Tugas</h4>
                  </div>
                  <div class="card-body">
                    <div class="col-12">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-7 col-sm-6 col-md-4">Jumlah Surat Tugas Dalam Kota Tahun {{ $thn }}</label>
                        <div class="col-3 col-sm-2 col-md-2">
                          <input type="text" class="form-control" value="{{ $dalam }}" readonly>
                        </div>
                        <label class="col-form-label text-md-right col-7 col-sm-6 col-md-4">Jumlah Surat Tugas Luar Kota Tahun {{ $thn }}</label>
                        <div class="col-3 col-sm-2 col-md-2">
                          <input type="text" class="form-control" value="{{ $luar }}" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-form-label">Statistik Pelanggaran</label>
                          <canvas id="bln"></canvas>
                        </div>
                    </div>
<script src="{{ asset('chart.js') }}"></script>
<script>
var ctx = document.getElementById("bln").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
    <?php
      foreach ($bln as $r) {
        echo "'".$r->nama."',";
      }
    ?>
    ],
    datasets: [{
      label: 'Dalam Kota',
      data: [
        <?php
          for ($i=0; $i < 12; $i++) {
            $jd  = App\Models\Surattugas::whereYear('waktu', $thn)->whereMonth('waktu', $i+1)->where('jenis', 1)->count();
            echo "'".$jd."',";
          }
        ?>
      ],
      borderWidth: 2,
      backgroundColor: 'transparent',
      borderColor: 'rgba(63,82,227,.8)',
      borderWidth: 0,
      pointBackgroundColor: 'transparent',
      pointBorderColor: 'transparent',
      pointRadius: 4
    },
    {
      label: 'Luar Kota',
      data: [
        <?php
          for ($i=0; $i < 12; $i++) {
            $jd  = App\Models\Surattugas::whereYear('waktu', $thn)->whereMonth('waktu', $i+1)->where('jenis', 2)->count();
            echo "'".$jd."',";
          }
        ?>
      ],
      borderWidth: 2,
      backgroundColor: 'transparent',
      borderColor: 'rgba(254,86,83,.7)',
      borderWidth: 2.5,
      pointBackgroundColor: 'transparent',
      pointBorderColor: 'transparent',
      pointRadius: 4
    },
    ]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    },
  }
});
</script>