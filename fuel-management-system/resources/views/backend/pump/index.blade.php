@extends('backend.layouts.mainLayout')
@section('title', $module.' - Home')
@section('main_content')
    <section>
        <div>
            <h1>{{$module}} page</h1>
        </div>
        @if(\Illuminate\Support\Facades\Session::get('success'))
            <div>
                <p class="text-green-300">
                    {{\Illuminate\Support\Facades\Session::get('success')}}
                </p>
            </div>
        @endif
        <div>
            <a href="{{route($base_route.'create')}}">
                <button>Create {{$module}}</button>
            </a>
        </div>
        <div>
            <table>
                <thead>
                    <th>pump id</th>
                    <th>name</th>
                    <th>address</th>
                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->id}}</td>
                            <td>{{$datum->name}}</td>
                            <td>{{$datum->address}}</td>
                            <td>
                                <a href="{{route($base_route.'view', $datum->id)}}">
                                    <button class="view">View</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route($base_route.'edit', $datum->id)}}">
                                    <button class="edit">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
