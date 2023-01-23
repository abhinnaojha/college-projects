@extends('backend.layouts.mainLayout')

@section('main_content')
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        @if (session('status'))
                            <div class="" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-8">
                            <nav class="">
                                <ul class="grid grid-cols-6 text-center gap-6 border min-w-full">
                                    <li class="">
                                        <a href="{{route('admin.index')}}" class="hover:capitalize">
                                            Admins
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('customer.index')}}" class="hover:capitalize">
                                            Customers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('pump.index')}}" class="hover:capitalize">
                                            Pumps
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('fueltype.index')}}" class="hover:capitalize">
                                            Fuel Type
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('fuelscheme.index')}}" class="hover:capitalize">
                                            Fuel Scheme
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('transaction.index')}}" class="hover:capitalize">
                                            Transactions
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
