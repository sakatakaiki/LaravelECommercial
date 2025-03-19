@extends('admin.layouts.app')

@section('title', 'Belle Orders List')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Orders List </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Order Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $order->code }}</td>
                                        <td>
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                @csrf
                                                <div class="btn-group">
                                                    <button type="submit" name="status" value="pending"
                                                        class="btn btn-sm {{ $order->status == 'pending' ? 'btn-danger' : 'btn-outline-danger' }}">
                                                        Pending
                                                    </button>
                                                    <button type="submit" name="status" value="finished"
                                                        class="btn btn-sm {{ $order->status == 'finished' ? 'btn-success' : 'btn-outline-success' }}">
                                                        Finished
                                                    </button>
                                                </div>
                                            </form>
                                        </td>


                                        <td>{{ $order->user->email ?? 'Guest' }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">View</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection