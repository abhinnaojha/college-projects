@extends('backend.layouts.mainLayout')
@section('title', $module.' - Home')
@section('main_content')
    <section>
        <div>
            <h1>{{$module}} page</h1>
        </div>
        <div>
            <a href="{{route($base_route.'create')}}">
                <button>Create {{$module}}</button>
            </a>
        </div>
        <div>
            <table>
                <thead>
                    <th>customer id</th>
                    <th>user id</th>
                    <th><user></user>name</th>
                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->customer_id}}</td>
                            <td>{{$datum->user_id}}</td>
                            <td>{{$datum->user_name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
