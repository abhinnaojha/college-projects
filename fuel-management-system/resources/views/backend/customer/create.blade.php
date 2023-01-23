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
                    </div>
                    <div>
                        <div>
                            <label name="license_number">License number:</label>
                        </div>
                        <div>
                            <input type="text" minlength="8" name="license_number" id="license_number" required>
                        </div>
                    </div>
                    <div class="mt-8">

                    </div>

                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div>
                    <input type="submit" value="Make customer">
                </div>
            </form>
            <div>
                <a href="{{route($base_route.'index')}}">
                    <button class="back">Back to customer</button>
                </a>
            </div>
        </div>
    </section>
@endsection
