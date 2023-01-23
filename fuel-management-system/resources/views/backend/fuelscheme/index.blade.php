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
                    <th>fuel type</th>
                    <th>end at</th>
                    <th>price</th>

                </thead>
                <tbody>
                    @foreach($data['records'] as $datum)
                        <tr>
                            <td>{{$datum->type}}</td>
                            <td>{{$datum->fs_end}}</td>
                            <td>{{$datum->fs_price}}</td>
                            <td>
                                <a href="{{route($base_route.'edit', $datum->fs_id)}}">
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
