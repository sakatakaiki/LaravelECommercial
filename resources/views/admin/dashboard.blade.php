@extends('admin.layouts.app')

@section('title', 'Belle Users List')
@section('content')


    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            @foreach ($orderStats as $stat)
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="{{ asset('admin/images/dashboard/circle.svg') }}" class="card-img-absolute"
                                alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">{{ $stat['title'] }}</h4>
                            <h2 class="mb-5">{{ $stat['count'] }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h4 class="card-title float-start">Orders by Month - Historia Chart</h4>
                            <div id="visit-sale-chart-legend"
                                class="rounded-legend legend-horizontal legend-top-right float-end"></div>
                        </div>
                        <canvas id="visit-sale-chart" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Orders by Day - Area chart</h4>
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Sales</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">User</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderList as $key => $order)
                                                                <tr>
                                                                    <th scope="row">{{ $key + 1 }}</th>
                                                                    <td><a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->code }}</a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge 
                                                                                                                {{ $order->status == 'finished' ? 'badge-success' :
                                        ($order->status == 'pending' ? 'badge-danger' : 'badge-secondary') }}">
                                                                            {{ $order->status }}
                                                                        </span>
                                                                    </td>
                                                                    <td>{{ $order->user->email }}</td>
                                                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                                                            class="btn btn-info">Details</a></td>
                                                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var labels2 = @json($ordersByMonth->pluck('month'));
        var data2 = @json($ordersByMonth->pluck('total'));

        var labels = @json($ordersByDay->pluck('day'));
        var data = @json($ordersByDay->pluck('total'));
    </script>
    <!-- content-wrapper ends -->
@endsection