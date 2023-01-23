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
                        <label for="name">Fuel type:</label>
                    </div>
                    <div>
                        <select name="fuel" id="fuel">
                            @foreach($data['fuels'] as $fuel)
                                <option value="{{$fuel->id}}">{{$fuel->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="address">end at:</label>
                    </div>
                    <div>
                        <input type="number" name="end_at" id="end_at" step="0.01">
                    </div>
                    <div>
                        <label for="address">price:</label>
                    </div>
                    <div>
                        <input type="number" name="price" id="price" step="0.01">
                    </div>

                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div>
                    <input type="submit" value="Make Fuel Scheme">
                </div>
            </form>
            <div>
                <a href="{{route($base_route.'index')}}">
                    <button class="back">Back to Fuel Scheme</button>
                </a>
            </div>
        </div>
    </section>
@endsection
