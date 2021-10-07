@extends('back.inc.master')
@section('styles')

@endsection
@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Coins Purchased (All Time)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">${{ \App\Models\Coin::all()->sum('purchased_coins') }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-coins fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Costumes (Delivered)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Costumes::where('is_delivered',1)->get()->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-theater-masks fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Costumes (Pending)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Costumes::where('is_approved',0)->get()->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-mask fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Members</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\User::all()->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col mb-4">

      <!-- Project Card Example -->

    </div>
  </div>
@endsection

