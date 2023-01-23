@extends('backend.layouts.mainLayout')
@section('title', $module.' - Create')
@section('main_content')
    <section>
        <div>
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'update', $data['record']->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div>
                    <div>
                        <p>

                            <span>Fuel type:</span>
                            <span>
                                @foreach ($data['fuel'] as $fuel)
                                    <input type="hidden" name="fuel" value="{{$fuel->id}}">
                                    {{$fuel->name}}
                                @endforeach
                            </span>
                        </p>
                    </div>
                    <div>
                    </div>

                    <div>
                        <label for="address">end at:</label>
                    </div>
                    <div>
                        <input type="number" name="end_at"
                               id="start_at" step="0.01" value="{{$data['record']->end_at}}">
                    </div>
                                        <div>
                        <label for="address">price:</label>
                    </div>
                    <div>
                        <input type="number" name="price"
                               id="price" step="0.01" value="{{$data['record']->price}}">
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
