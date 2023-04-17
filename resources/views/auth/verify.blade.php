@extends('User.Dashboard.main')

@section('title', 'Verify Email')
@section('content')

<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border shadow">
                <div class="card-header text-center  bg-secondary text-white h5">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body text-center py-4">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success text-capitalize py-2 px-3 rounded-pill">{{ __('click here to request another') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
