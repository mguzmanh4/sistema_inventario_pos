@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('change-password-default.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your new password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password Confirmation</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter your new password" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center d-grid">
                            <button class="btn btn-primary" style="background-color: #232f7a;" type="submit"> Change Temporary Password </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


