@extends('backend.layouts.mainLayout')
@section('title', $module.' - Edit - '. $data['record']->id . '. ' . $data['record']->name)
@section('main_content')
    <section>
        <div>
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'update', $data['record']->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user" value="{{$data['record']->user}}">
                @csrf
                <div>
                    <div>
                        <label name="name">Pump name:</label>
                    </div>
                    <div>
                        <input type="text" name="name" value="{{$data['record']->name}}">
                    </div>

                    <div>
                        <label name="name">Pump address:</label>
                    </div>
                    <div>
                        <input type="text" name="address" value="{{$data['record']->address}}">
                    </div>
                    <div>
                        @foreach($data['fuels'] as $f)
                            <div>
                                <input type="checkbox" name="fuel[]" value="{{$f->id}}">
                                {{$f->name}}
                            </div>
                        @endforeach
                    </div>
                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div class="mt-3">
                    <input type="submit" value="Update pump">
                </div>
            </form>
            <div>
                <a href="{{route($base_route.'index')}}">
                    <button class="back">Back to pump</button>
                </a>
            </div>
        </div>
    </section>
@endsection
