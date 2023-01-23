@extends('backend.layouts.mainLayout')
@section('title', $module.' - Create')
@section('main_content')
    <section>
        <div>
            <div>
                <h1>{{$module}} page</h1>
            </div>
            <form action="{{route($base_route.'finalise')}}" method="POST">
                @csrf
                <input type="hidden" name="pump" value="{{$data['pump_id']}}">
                <div>
                    <div>
                        <div>
                            <label for="fuel">Fuel type:</label>
                        </div>
                        <div id="fuel_type_of_pump">
                            <select name="fuel" id="fuel">
                                <option value="0">-select fuel type-</option>

                                @foreach($data['fuels'] as $fuel)
                                    <option value="{{$fuel->ft_id}}">{{$fuel->ft_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="quantity">Quantity in litre:</label>
                        </div>
                        <div>
                            <input type="number" name="quantity" min="0.01" step="0.01">
                        </div>
                        <div>
                            <label for="customer">Customer:</label>
                        </div>
                        <div>
                            <select name="customer" id="customer">
                                <option value="0">-select customer-</option>
                                @foreach($data['customers'] as $customer)
                                    <option value="{{$customer->id}}">{{$customer->id}} -> {{$customer->license_number}}</option>
                                @endforeach
                                {{--                                @foreach(['a', 's'] as $x)--}}
                                {{--                                    <option value="{{$x}}">{{$x}}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                        </div>
                    </div>


                    {{--                @error('name')--}}
                    {{--                    <div>--}}
                    {{--                        {{$message}}--}}
                    {{--                    </div>--}}
                    {{--                @enderror--}}
                </div>
                <div>
                    <input type="submit" value="Fill fuel">
                </div>
            </form>
        </div>
{{--        <script>--}}
{{--            --}}{{--const pump = document.getElementById('pump');--}}

{{--            --}}{{--pump.addEventListener('change', ()=> {--}}

{{--            --}}{{--    let xhttp = new XMLHttpRequest();--}}

{{--            --}}{{--    xhttp.onreadystatechange = ()=>--}}
{{--            --}}{{--    {--}}
{{--            --}}{{--        if(this.readyState === 4 && this.status === 200)--}}
{{--            --}}{{--        {--}}
{{--            --}}{{--            console.log('connection made');--}}
{{--            --}}{{--        }--}}
{{--            --}}{{--    };--}}

{{--            --}}{{--    xhttp.open('post', '{{route("transaction.get_fuel")}}');--}}
{{--            --}}{{--    xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');--}}
{{--            --}}{{--    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").getAttribute('content'));--}}
{{--            --}}{{--    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');--}}

{{--            --}}{{--    let json_id = JSON.stringify(--}}
{{--            --}}{{--        {--}}
{{--            --}}{{--            "id": pump.value--}}
{{--            --}}{{--        }--}}
{{--            --}}{{--    );--}}

{{--            --}}{{--    console.log(json_id);--}}

{{--            --}}{{--    xhttp.send(json_id);--}}
{{--            --}}{{--});--}}

{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--                    --}}{{--'X-CSRF-TOKEN': '{{csrf_token()}}',--}}
{{--                }--}}
{{--            });--}}
{{--            $('#pump').change(function()--}}
{{--            {--}}
{{--                let pump_id = $(this).val();--}}
{{--                $.ajax({--}}
{{--                    method: "post",--}}
{{--                    type:'post',--}}
{{--                    url: "{{route('transaction.get_fuel')}}",--}}
{{--                    data:--}}
{{--                        {--}}
{{--                            'id' : pump_id,--}}
{{--                            '_token' : '{{csrf_token()}}',--}}
{{--                        },--}}
{{--                    success:function (resp){--}}
{{--                        console.log(resp);--}}
{{--                        $('#fuel').html(resp);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
    </section>

@endsection
