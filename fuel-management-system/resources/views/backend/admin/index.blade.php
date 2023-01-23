@extends('backend.layouts.mainLayout')
@section('title', $module.' - Home')
@section('main_content')
    <section>
        <div>
            <h1>{{$module}} page</h1>
        </div>
        <div>
            <a href="{{route($base_route.'create')}}" class="flex justify-center">
                <button>Create {{$module}}</button>
            </a>
        </div>
        <div>
            <table>
                <thead>
                    <th>admin id</th>
                    <th>user id</th>
                    <th>username</th>
                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->admin_id}}</td>
                            <td>{{$datum->user_id}}</td>
                            <td>{{$datum->user_name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
