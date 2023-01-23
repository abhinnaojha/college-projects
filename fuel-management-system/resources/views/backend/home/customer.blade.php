@extends('backend.layouts.mainLayout')

@section('main_content')
    <div class="mt-8">
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
                            <table>
                                <tr>
                                    <th>transaction id</th>
                                    <th>pump name</th>
                                    <th>fuel type</th>
                                    <th>quantity</th>
                                    <th>transaction amount</th>
                                </tr>
                                @foreach($records['current_fuel'] as $cf)
                                    <tr>
                                        <td>{{$cf->tran_id}}</td>
                                        <td>{{$cf->pump}}</td>
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
@endsection
