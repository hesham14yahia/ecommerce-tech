@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Product Details</strong>
                <div>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                        <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-pencil') }}"></use></svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-trash') }}"></use></svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                 class="img-fluid rounded shadow-sm mb-3">
                        @else
                            <div class="bg-light rounded p-5 mb-3">
                                <svg class="icon icon-4xl text-muted"><use xlink:href="{{ asset('icons/free.svg#cil-image') }}"></use></svg>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">ID:</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>SKU:</th>
                                <td>{{ $product->sku ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>${{ number_format($product->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Stock:</th>
                                <td>
                                    <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ $product->is_active ? 'success' : 'secondary' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($product->description)
                <div class="mt-4">
                    <h5>Description</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <svg class="icon"><use xlink:href="{{ asset('icons/free.svg#cil-arrow-left') }}"></use></svg>
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
