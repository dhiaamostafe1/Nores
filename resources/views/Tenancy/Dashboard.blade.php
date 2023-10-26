

@extends('Tenancy.layouts.apptenancy')

@section('body')



<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Line chart</h4>
          <canvas id="lineChart" width="686" height="342" style="display: block; height: 274px; width: 549px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Bar chart</h4>
          <canvas id="barChart" style="display: block; height: 274px; width: 549px;" width="686" height="342" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Area chart</h4>
          <canvas id="areaChart" width="686" height="342" style="display: block; height: 274px; width: 549px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Doughnut chart</h4>
          <canvas id="doughnutChart" width="686" height="342" style="display: block; height: 274px; width: 549px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Pie chart</h4>
          <canvas id="pieChart" width="686" height="342" style="display: block; height: 274px; width: 549px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
      <div class="card">
        <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <h4 class="card-title">Scatter chart</h4>
          <canvas id="scatterChart" width="686" height="342" style="display: block; height: 274px; width: 549px;" class="chartjs-render-monitor"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

        

<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
@endsection



