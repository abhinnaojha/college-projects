@extends('backend.layouts.mainLayout')
@section('title', $module.' - Home')
@section('main_content')
    <section>
        <div>
            <h1>Pump details</h1>
        </div>
        <div>
            <table>
                <tbody>
                    <tr>
                       <th>pump id</th>
                        <td>{{$data['record']->id}}</td>
                    </tr>
                    <tr>
                        <th>pump name</th>
                        <td>{{$data['record']->name}}</td>
                    </tr>
                    <tr>
                        <th>pump address</th>
                        <td>{{$data['record']->address}}</td>
                    </tr>
                    <tr>
                        <th>fuels available</th>
                        <td>
                            @foreach($data['fuel'] as $fuel)
                                <span>
                                    {{$fuel->f_name}}
                                </span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <a href="{{route($base_route.'edit', $data['record']->id)}}">
                                <button class="edit">Edit</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <a href="{{route($base_route.'index')}}">
                                <button class="back">Back to pump</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
