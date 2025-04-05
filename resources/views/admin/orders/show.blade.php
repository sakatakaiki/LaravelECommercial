@extends('admin.layouts.app')

@section('title', 'Belle Order Items List')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Detail of order <i>{{ $order->code }}</i> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.orders.index">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-primary bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="mdi mdi-account-circle"></i> User</h5>
                        <p class="card-text">{{ $order->user->email ?? 'Guest' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-warning bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="mdi mdi-clipboard-check"></i> Status</h5>
                        <span class="badge {{ $order->status == 'finished' ? 'badge-success' : 'badge-danger' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-info bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="mdi mdi-calendar-clock"></i> Created At</h5>
                        <p class="card-text">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->product->name }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.orders.export', $order->id) }}" class="btn btn-success mt-3">
                            <i class="mdi mdi-download"></i> Export Order to Excel
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection