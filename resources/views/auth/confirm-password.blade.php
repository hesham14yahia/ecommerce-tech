@extends('admin.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Confirm Password</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Please confirm your password before continuing.</p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Confirm Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
