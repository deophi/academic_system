<html>
<head>
	<title>{{ $a }}</title>
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>
<body>
	<div class="section-body">
	  <div class="col-12 col-md-6 col-lg-6">
	  	  <div class="card">
	  	  	<div class="card-header">
	  	  	  <h4>Line Chart</h4>
	  	  	  </div>
	  	  	  <div class="card-body">
	  	  	  	<canvas id="myChart"></canvas>
	  	  	  </div>

	  	  	</div>
	  	  </div>
	  	</div>
	  </div>
</body>

  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <script src="{{ asset('chart.js') }}"></script>
  <script>
  	var ctx = document.getElementById("myChart").getContext('2d');
  	var myChart = new Chart(ctx, {
  		type: 'pie',
  		data: {
  			datasets: [{
  				data: [
  				{{$a}},
        		{{$b}},
        		{{$c}},
        		{{$d}},
        		{{$e}},
        		],
        		backgroundColor: [
        		'#191d21',
        		'#63ed7a',
        		'#ffa426',
        		'#fc544b',
        		'#6777ef',
        		],
        		label: 'Dataset 1'
        	}],
        	labels: [
        	'Black',
      		'Green',
      		'Yellow',
      		'Red',
      		'Blue'
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
  <!-- JS Libraies -->
  <!-- <script src="{{ asset('assets/modules/chart.min.js') }}"></script> -->

  <!-- Page Specific JS File -->
  <!-- <script src="{{ asset('assets/js/page/modules-chartjs.js') }}"></script> -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</html>