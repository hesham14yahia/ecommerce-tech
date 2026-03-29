@extends('admin.layout')

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Products</strong>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-plus') }}"></use></svg>
            Add Product
        </a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" 
                               placeholder="Search products..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-secondary">
                            <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-search') }}"></use></svg>
                        </button>
                        @if($search)
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Clear</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku ?? '-' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $product->is_active ? 'success' : 'secondary' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info">
                                    <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-magnifying-glass') }}"></use></svg>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                                    <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-pencil') }}"></use></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-trash') }}"></use></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No products found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
