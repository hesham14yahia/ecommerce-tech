@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Users</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No users found</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
