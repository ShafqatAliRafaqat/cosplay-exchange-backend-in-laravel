<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>
<style>
    body{
        width: 80mm;
      font-size: 20px;
      margin:0;
    }
    h3{
        text-align: center;
    }
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
        padding: 2px;
}
    span{
        float: right;
    }
    </style>
<body>
<form>
<h3>Beijing House</h3>
    @if($order->order_type=='pickup')
        <h4>Pickup @ {{ $order->order_time }}</h4>
    @else
<h4>Delivery@ {{  $order->order_time }}: <br> {{ substr($order->address, strrpos($order->address, ',' )+1)}}</h4>
    @endif
<p><strong>Name: </strong>{{ $order->user->profile->name }}</p>
<p><strong>Tel:</strong> {{ $order->user->profile->phone_no }}</p>
    @if($order->order_type=='pickup')
        <h4></h4>
    @else
<p>{{ $order->address }}</p>
    @endif
<p><strong>Order Time: </strong>{{ $order->created_at->format("H:iA") }}</p>
<p><strong>Order Number:</strong>{{ $order->id }}</p>
<p>--------------------------------------------------</p>
<table style="width:100%">
  <tr>
    <th>Description</th>
    <th>Qty</th>
      <th>Rate</th>
    <th>Amount</th>
  </tr>
  @foreach(unserialize($order->cart) as $item)
  <tr>
    <td>{{ $item->name }} <small><br>{{ $item->options->name }}</small></td>
    <td><span>{{ $item->qty }}.00</span></td>
    <td>{{ number_format($item->price,2) }}</td>
    <td><span>{{ number_format(($item->price*$item->qty),2) }}</span></td>

  </tr>
    @endforeach
</table>
<p>--------------------------------------------------</p>
    <p><strong>Delivery Charges: </strong>{{ config('global.currencySymbol').number_format($order->delivery_fee,2)}}</p>
<p><strong>Total: </strong>{{ config('global.currencySymbol').number_format($order->total,2)}}</p>
<p><strong>Items</strong>[{{ unserialize($order->cart)->count()}}]</p>
<p><strong>Payment:</strong>
    @if($order->payment_id==1)
    COD
    @elseif($order->payment_id==2)
    Paypal
    @else
    Card
        @endif
</p>
</p>
    <p><strong>Special Instructions</strong></p>
    <p>{{ $order->instructions }}</p>


  <input type="button" value="Print"
         onclick="myPrint()" />
</form>
<script>
    function myPrint() {
        window.print();
        window.close();

    }
</script>
</body>
</html>
