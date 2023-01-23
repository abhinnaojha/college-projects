@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <p style="text-align: center">
                                You are not yet verified.
                            </p>
                            <p style="text-align: center">
                                We are working on verifying you as soon as possible.
                            </p>
                            <p style="text-align: center">
                                Thank you for your patience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
