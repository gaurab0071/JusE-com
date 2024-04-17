@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Details</h1>
                        {{-- <h5 class="card-title text-danger">Total Orders: {{ count($categories) }}</h5> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="/order" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <address>
                                    Order No: {{ $order->id }} <br>
                                    Date: {{ $order->created_at }} <br>
                                    Customer Name: {{ $order->user->name }} <br>
                                    Mobile: {{ $order->mobile_number }} <br>
                                    Delivery Address: {{ $order->delivery_address }} <br>
                                </address>

                                <table class="table">
                                    <tr>
                                        <th>SN</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>

                                    @foreach ($order->order_descriptions as $index => $item)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->rate }}</td>
                                            <td>{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="4">Grand Total</td>
                                        <td><span class="fs-4">{{ $order->total }}</span></td>
                                    </tr>
                                </table>

                                <a href="" class="btn btn-success" onclick="window.print()">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
