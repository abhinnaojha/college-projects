@extends('backend.layouts.mainLayout')
@section('title', $module.' - Home')
@section('main_content')
    <section>
        <div>
            <h1>{{$module}} page</h1>
        </div>
        <div>
            <table>
                <thead>
                    <th>customer id</th>
                    <th>pump</th>
                    <th>fuel type</th>
                    <th>quantity</th>

                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->customer}}</td>
                            <td>{{$datum->pump}}</td>
                            <td>{{$datum->fuel}}</td>
                            <td>{{$datum->quantity}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
