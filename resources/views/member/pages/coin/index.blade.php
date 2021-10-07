@extends('member.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <i class="fas fa-coins"></i>
            Coins
            <button type="button" class="btn btn-success btn-sm new" data-toggle="modal" data-target="#newModal">
                <i class="fas fa-money-bill-alt"></i> Purchase
            </button>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Locked</th>
                    <th>Purchased</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{ Auth::user()->coin->available_coins + Auth::user()->coin->locked_coins }}</td>
                    <td>{{ Auth::user()->coin->available_coins }}</td>
                    <td>{{ Auth::user()->coin->locked_coins }}</td>
                    <td>{{ Auth::user()->coin->purchased_coins }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="newModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Coins</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('member.coin.store') }}" method="POST" class="text-center mb-3">
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" step="1" min="1" class="form-control" name="amount" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('STRIPE_KEY') }}"
                        data-name="Cosplay-Exchange"
                        data-description="Cosplay-Exchange Coin Purchase"
                        data-image="{{ asset('front/img/drama.png') }}"
                        data-label="Buy Coins"
                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                        data-panel-label="Buy Now"
                        data-locale="auto">
                    </script>

                </form>
            </div>
        </div>
    </div>




@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>

@endsection
