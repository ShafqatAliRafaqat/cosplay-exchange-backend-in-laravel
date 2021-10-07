@extends('member.inc.master')
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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Coins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->coin->available_coins + Auth::user()->coin->locked_coins }}</div>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Unlocked Coins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->coin->available_coins }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-unlock fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Locked Coins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->coin->locked_coins }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-lock fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Purchased Coins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->coin->purchased_coins }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Costumes</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->costumes()->count() }}</div>
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
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Approval</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->costumes()->where('is_approved',0)->count() }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-mask fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Shipped</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->costumes()->where('status_id',4)->count() }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
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
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Requests Sent</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Exchange::where('user_id',Auth::id())->count() }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-check fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


  @if($costumes->count()>0)
  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col mb-4">

      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pending Costumes</h6>
        </div>

          <div class="card-body table-responsive">
              <table id="datatable" class="table table-bordered">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Photos</th>
                      <th>Status</th>
                      <th>Approved</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($costumes as $costume)
                      <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{ $costume->title }}</td>
                          <td>
                              @foreach($costume->categories as $category)
                                  {{ $category->name }},
                              @endforeach
                          </td>
                          <td>{{ $costume->pictures()->count() }}</td>
                          <td>{{ $costume->status()->first()->name }}</td>
                          <td>{{ $costume->is_approved==0?'Pending':'Approved' }}</td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
  @endif
@endsection

