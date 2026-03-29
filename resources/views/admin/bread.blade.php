@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>BREAD System</strong>
    </div>
    <div class="card-body">
        <p class="text-muted">BREAD stands for Browse, Read, Edit, Add, Delete. This system allows you to generate CRUD operations for any database table.</p>
        
        <div class="alert alert-info">
            <strong>Coming Soon:</strong> BREAD functionality will be available here.
        </div>
        
        <form>
            <div class="mb-3">
                <label class="form-label">Table Name</label>
                <input type="text" class="form-control" placeholder="e.g., users, products, orders">
            </div>
            <button type="button" class="btn btn-primary" disabled>Generate BREAD</button>
        </form>
    </div>
</div>
@endsection
