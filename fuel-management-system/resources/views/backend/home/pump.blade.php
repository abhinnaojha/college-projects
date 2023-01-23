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

                        <div>

                        </div>

                        <div>
                            <form method="post" action="{{route('transaction.create')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$records['pump_id']}}">
                                <input type="submit" value="Make a transaction">
                            </form>
                            <div>
                                <table>
                                    <tr>
                                        <th>transaction id</th>
                                        <th>customer id</th>
                                        <th>fuel type</th>
                                        <th>quantity</th>
                                        <th>transaction amount</th>
                                    </tr>
                                    @foreach($records['current_fuel'] as $cf)
                                        <tr>
                                            <td>{{$cf->tran_id}}</td>
                                            <td>{{$cf->customer}}</td>
                                            <td>{{$cf->fuel}}</td>
                                            <td>{{$cf->quantity}}</td>
                                            <td>{{$cf->amount}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
