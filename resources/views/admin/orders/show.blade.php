@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Order #{{ $order->id }}</strong>
                <span class="badge bg-{{ $order->status->isPending() ? 'warning' : ($order->status->isConfirmed() ? 'success' : 'danger') }}">
                    {{ $order->status->label() }}
                </span>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Customer Info</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->user?->name ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->user?->email ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $order->user?->phone ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Order Info</h6>
                        <p class="mb-1"><strong>Order ID:</strong> #{{ $order->id }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                        <p class="mb-1"><strong>Last Updated:</strong> {{ $order->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <h6 class="text-muted mb-3">Order Items</h6>
                <div class="table-responsive mb-4">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-end">Price</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td class="text-end">${{ number_format($item->price, 2) }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No items</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @if($order->payment)
                <h6 class="text-muted mb-3">Payment Info</h6>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Method:</strong> {{ $order->payment->method?->label() ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Status:</strong> {{ $order->payment->status?->label() ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Transaction ID:</strong> {{ $order->payment->transaction_id ?? '-' }}</p>
                    </div>
                </div>
                @endif

                @if($order->status->isPending())
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="mb-3">Update Status</h6>
                        <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select" style="width: auto;">
                                <option value="pending" {{ $order->status->isPending() ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-arrow-left') }}"></use></svg>
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
