@extends('admin.layout')

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Orders</strong>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" 
                               placeholder="Search by order ID or customer..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-secondary">
                            <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-search') }}"></use></svg>
                        </button>
                        @if($search)
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Clear</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="pending" {{ ($status ?? '') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ ($status ?? '') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ ($status ?? '') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user?->name ?? 'N/A' }}</td>
                        <td>{{ $order->user?->email ?? 'N/A' }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status->isPending() ? 'warning' : ($order->status->isConfirmed() ? 'success' : 'danger') }}">
                                {{ $order->status->label() }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info">
                                    <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-magnifying-glass') }}"></use></svg>
                                </a>
                                @if($order->status->isPending())
                                    <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-trash') }}"></use></svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No orders found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $orders->withQueryString()->links() }}
    </div>
</div>
@endsection
