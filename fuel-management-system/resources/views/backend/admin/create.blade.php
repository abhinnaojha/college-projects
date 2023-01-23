@extends('backend.layouts.mainLayout')
@section('title', $module.' - Create')
@section('main_content')
    <section>
        <div>
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'store')}}" method="POST">
                @csrf
                <div>
                    <div>
                        <label name="user">Username:</label>
                    </div>
                    <div>
                        <select name="user">
                            <option value="0">-select user-</option>
                            @foreach($data['records'] as $datum)
                                <option value="{{$datum->user_id}}">{{$datum->user_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div>
                    <input type="submit" value="Make admin">
                </div>
            </form>
            <div>
                <a href="{{route('admin.index')}}">
                    <button class="back">Back to admin</button>
                </a>
            </div>
        </div>
    </section>
@endsection
