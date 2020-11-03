@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="card card-sales-widget card-bg-blue-gradient">
        <div class="card-icon shadow-primary bg-blue">
          <i class="fas fa-user-plus"></i>
        </div>
        <div class="card-wrap pull-right">
          <div class="card-header">
            <h3>1,437</h3>
            <h4>New Clients</h4>
          </div>
        </div>
        <div class="card-chart">
          <div id="chart-1"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="card card-sales-widget card-bg-yellow-gradient">
        <div class="card-icon shadow-primary bg-warning">
          <i class="fas fa-drafting-compass"></i>
        </div>
        <div class="card-wrap pull-right">
          <div class="card-header">
            <h3>2,021</h3>
            <h4>Delivered Orders</h4>
          </div>
        </div>
        <div class="card-chart">
          <div id="chart-2"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="card card-sales-widget card-bg-orange-gradient">
        <div class="card-icon shadow-primary bg-hibiscus">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="card-wrap pull-right">
          <div class="card-header">
            <h3>5,124</h3>
            <h4>Total Sales</h4>
          </div>
        </div>
        <div class="card-chart">
          <div id="chart-3"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="card card-sales-widget card-bg-green-gradient">
        <div class="card-icon shadow-primary bg-green">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap pull-right">
          <div class="card-header">
            <h3>$50,789</h3>
            <h4>Total Earning</h4>
          </div>
        </div>
        <div class="card-chart">
          <div id="chart-4"></div>
        </div>
      </div>
    </div>
  </div>
  
@endsection