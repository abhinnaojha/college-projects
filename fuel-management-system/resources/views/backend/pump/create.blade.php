@extends('backend.layouts.mainLayout')
@section('title', $module.' - Create')
@section('main_content')
    <section>
        <div class="">
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'store')}}" method="POST">
                @csrf
                <div class="">
                    <div class="">
                        <select name="user">
                            <option value="0">-select user-</option>
                            @foreach($data['records'] as $datum)
                                <option value="{{$datum->user_id}}">{{$datum->user_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="name">Pump name:</label>
                    </div>
                    <div>
                        <input type="text" name="name" id="name">
                    </div>

                    <div>
                        <label for="address">Pump address:</label>
                    </div>
                    <div>
                        <input type="text" name="address" id="address">
                    </div>
                    <div>
                        @error('address')
                            <span>{{$message}}</span>
                        @enderror
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
                <div>
                    <input type="submit" value="Make pump" class="create">
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
