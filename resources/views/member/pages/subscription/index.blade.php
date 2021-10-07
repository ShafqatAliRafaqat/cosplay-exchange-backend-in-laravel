@extends('member.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
      <div class="card-header">
          <i class="fas fa-money-bill"></i>
          Subscription
          @if(Auth::user()->subscribed('main'))
              @if(Auth::user()->subscription('main')->cancelled())
                  @else
          <a href="{{ route('member.subscription.cancel') }}" class="btn btn-danger btn-sm new">
              <i class="fas fa-minus-circle"></i> Cancel Subscription
          </a>
                  @endif
              @endif
      </div>
    <div class="card-body table-responsive">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="alert alert-{{ Auth::user()->subscribed('main')?'primary':'danger' }} text-center" role="alert">
                    {{ Auth::user()->subscribed('main')?'You Are Subscribed':'Your Are Not Subscribed' }}
                </div>
                <small class="text-primary"><center>{{ Auth::user()->subscribedToPlan('membership', 'main')?'':'you will not be charged for the first 90 days' }}</center></small>

                <form action="{{ route('member.subscription.store') }}" method="POST" class="text-center mt-3">
                    @csrf
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('STRIPE_KEY') }}"
                        data-amount="1500"
                        data-name="Cosplay-Exchange"
                        data-description="Subscribe to Cosplay-Exchange"
                        data-image="{{ asset('front/img/drama.png') }}"
                        data-label="Subscribe Now"
                        data-email="{{ auth()->check()?auth()->user()->email: null}}"
                        data-panel-label="Pay Monthly"
                        data-locale="auto">
                    </script>
                </form>


            </div>

        </div>
    </div>
  </div>




  @endsection

@section('scripts')
{{--    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>--}}
{{--    <script>--}}
{{--        var form = document.querySelector('#payment-form');--}}
{{--        var client_token = "{{ $token }}";--}}
{{--        braintree.dropin.create({--}}
{{--            authorization: client_token,--}}
{{--            selector: '#bt-dropin',--}}
{{--            paypal: {--}}
{{--                flow: 'vault'--}}
{{--            }--}}
{{--        }, function (createErr, instance) {--}}
{{--            if (createErr) {--}}
{{--                console.log('Create Error', createErr);--}}
{{--                return;--}}
{{--            }--}}
{{--            form.addEventListener('submit', function (event) {--}}
{{--                event.preventDefault();--}}
{{--                instance.requestPaymentMethod(function (err, payload) {--}}
{{--                    if (err) {--}}
{{--                        console.log('Request Payment Method Error', err);--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    // Add the nonce to the form and submit--}}
{{--                    document.querySelector('#nonce').value = payload.nonce;--}}
{{--                    form.submit();--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    @endsection
