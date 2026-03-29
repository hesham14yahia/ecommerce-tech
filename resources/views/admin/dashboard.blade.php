@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-4 fw-semibold">{{ $totalUsers ?? 0 }}</div>
                    <div>Total Users</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xl">
                            <use xlink:href="{{ asset('icons/free.svg#cil-options') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px;">
                <canvas class="chart" id="sparkline-chart-1" height="70"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-info">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-4 fw-semibold">{{ $totalProducts ?? 0 }}</div>
                    <div>Total Products</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xl">
                            <use xlink:href="{{ asset('icons/free.svg#cil-options') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px;">
                <canvas class="chart" id="sparkline-chart-2" height="70"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-warning">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-4 fw-semibold">{{ $totalOrders ?? 0 }}</div>
                    <div>Total Orders</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xl">
                            <use xlink:href="{{ asset('icons/free.svg#cil-options') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px;">
                <canvas class="chart" id="sparkline-chart-3" height="70"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-danger">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-4 fw-semibold">{{ $totalRevenue ?? 0 }}</div>
                    <div>Total Revenue</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-xl">
                            <use xlink:href="{{ asset('icons/free.svg#cil-options') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height: 70px;">
                <canvas class="chart" id="sparkline-chart-4" height="70"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <strong>Recent Orders</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders ?? [] as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->customer_name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'pending' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($order->status ?? 'pending') }}
                            </span>
                        </td>
                        <td>${{ number_format($order->total ?? 0, 2) }}</td>
                        <td>{{ $order->created_at?->format('Y-m-d') ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No orders found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
