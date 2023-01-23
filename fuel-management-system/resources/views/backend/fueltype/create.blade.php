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
                        <label name="name">Fuel name:</label>
                    </div>
                    <div>
                        <input type="text" name="name"/>
                    </div>
                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div>
                    <input type="submit" value="Make new fuel type">
                </div>
            </form>
            <div>
                <a href="{{route($base_route.'index')}}">
                    <button class="back">Back to Fuel Types</button>
                </a>
            </div>
        </div>
    </section>
@endsection
