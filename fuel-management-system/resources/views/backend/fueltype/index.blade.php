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
                    <th>id</th>
                    <th>fuel type name</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->id}}</td>
                            <td>{{$datum->name}}</td>
                            <td>
                                <a href="{{route('fueltype.edit', $datum->id)}}">
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
