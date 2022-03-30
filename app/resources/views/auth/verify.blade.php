@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('content.verify')</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('content.verfb').
                            </div>
                        @endif

                        @lang('content.chem')
                        @lang('content.ifnotrec'), <a
                                href="{{ route('verification.resend') }}">@lang('content.reqanbtn')</a>.
                    </div>
                </div>
            </div>
        </div>
@endsection
