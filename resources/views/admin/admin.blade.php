@extends('admin.layouts_admin.main_layout_admin')

@section('content')
 <div class="chart">
  <canvas id="popChart" width="300" height="200"></canvas></div>
<script>

    
var popCanvas = document.getElementById("popChart");
var popCanvas = document.getElementById("popChart").getContext("2d");
var barChart = new Chart(popCanvas, {
  type: 'bar',
  data: {
    labels: ["Зарегистрировались",  "Оформили подписку"],
    datasets: [{
      label: 'Статистика',
      data: [{{$Users}},0, {{$Subscriptions}},0],
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)',
        
        'rgba(255, 206, 86, 0.6)',
        
      ]
    }]
  }
});

</script>
@endsection
