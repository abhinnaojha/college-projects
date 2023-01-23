<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Fuelscheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuelschemeController extends BackendBaseController
{
    protected $base_route = 'fuelscheme.';
    protected $base_view = 'backend.fuelscheme.';
    protected $module = 'FuelScheme';

    public function __construct()
    {
        $this->model = new Fuelscheme();
    }
    function index()
    {
        $data['records'] = DB::table('fuelschemes')
            ->join('fueltypes', 'fuelschemes.fuel', '=', 'fueltypes.id')
            ->select('fuelschemes.id as fs_id',
                'fuelschemes.end_at as fs_end',
                'fuelschemes.price as fs_price',
                'fuelschemes.fuel as fuel',
                'fueltypes.name as type')
            ->orderBy('fuel')
            ->orderBy('fs_end')
            ->get();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    function create()
    {
            $data['fuels'] = DB::table('fueltypes')
                ->select('id', 'name')
                ->get();
        return view($this->__loadDataToView($this->base_view .'create'), compact('data'));
    }

    function store(Request $request)
    {
        try{
            $record = $this->model::create($request->all());
            if($record)
            {
                request()->session()->flash('success',$this->module." created");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module)).$this->module." creation failed ");
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());
            return redirect()->route($this->__loadDataToView($this->base_route.'create'));
        }
    }

    function edit($id)
    {
        $data['record'] = $this->model::find($id);
        $data['fuel'] = DB::table('fueltypes')
            ->select('id', 'name')
            ->where('id', '=', $data['record']->fuel)
            ->get();

        if(!$data['record'])
        {
            request()->session()->flash('error',"Data not found, please enter a valid request.");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));
        }
        return view($this->__loadDataToView($this->base_view . 'edit'), compact('data'));
    }


    function update(Request $request, $id)
    {
        try{
            $data['record'] = $this->model::find($id);
            if(!$data['record' ]){
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));

            }
            $record=$data['record']->update($request->all());
            if($record)
            {
                request()->session()->flash('success',$this->module."Updated");
            }else{
                request()->session()->flash('error',$this->module."Update Failed");

            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
}
