                <div class="card">
                  <div class="card-header">
                    <h4>Data Pelanggaran Periode {{ $set->angkatans->tahun }}</h4>
                  </div>
                  <div class="card-body">
                    <div class="col-12">
                      <div class="form-group row">
                        <label class="col-form-label text-md-right col-6 col-sm-6 col-md-2">Jumlah Pelanggaran</label>
                        <div class="col-3 col-sm-3 col-md-2">
                          <input type="text" class="form-control" value="{{ $flsthn->count() }}" readonly>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                          <label class="col-form-label">Statistik Pelanggaran</label>
                          <canvas id="thn"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<script src="{{ asset('chart.js') }}"></script>
<script>
var ctx = document.getElementById("thn").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [
      <?php foreach($jenis as $r){
        $jml = App\Models\Fouls::where('angkatans_id', $set->angkatans_id)->where('jenis_id', $r->id)->count();
        if($jml > 0){
          ?>
          "{{ $r->nama }}",
      <?php }} ?>
    ],
    datasets: [{
      label: 'Jumlah',
      data: [
        <?php foreach($jenis as $r){
          $jml = App\Models\Fouls::where('angkatans_id', $set->angkatans_id)->where('jenis_id', $r->id)->count();
          if($jml > 0){
            ?>
            {{ $jml }},
        <?php }} ?>
      ],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
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
          <?php $jml = App\Models\Fouls::where('angkatans_id', $set->angkatans_id)->where('jenis_id', 1)->count() ?>
          stepSize: {{ $jml }}
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});
</script>