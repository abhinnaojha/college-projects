@extends('backend.layouts.mainLayout')
@section('title', $module.' - Finalise')
@section('main_content')
    <section>
        <div>
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'store')}}" method="POST">
                @csrf
                <input type="hidden" name="customer" value="{{$data['finalised']->customer}}">
                <input type="hidden" name="pump" value="{{$data['finalised']->pump}}">
                <input type="hidden" name="fuel" value="{{$data['finalised']->fuel}}">
                <input type="hidden" name="quantity" value="{{$data['finalised']->quantity}}">
                <input type="hidden" name="amount" value="{{$data['amount']}}">

                <p>
                    Final payable amount is Rs.{{$data['amount']}} only.
                </p>
                <p>
                    Please confirm that payment has been made to pump.
                </p>
                <input type="submit" value="Confirm">
            </form>
        </div>
    </section>

@endsection
