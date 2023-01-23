<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Fueltype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FueltypeController extends BackendBaseController
{
    protected $base_route = 'fueltype.';
    protected $base_view = 'backend.fueltype.';
    protected $module = 'Fueltype';

    public function __construct()
    {
        $this->model = new Fueltype();
    }

    function index()
    {
        $data['records'] = $this->model::all();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    function create()
    {
        return view($this->__loadDataToView($this->base_view .'create'));
    }

    function store(Request $request)
    {
        try{
            $record = $this->model::create($request->all());
            if($record)
            {
                request()->session()->flash('success',($this->__loadDataToView($this->module)).$this->module." created");
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module)).$this->module." creation failed ");

            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());
        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }

    function edit($id)
    {
        $data['record'] = $this->model::find($id);

        if(!$data['record'])
        {
            request()->session()->flash('error',"Data not found, please enter a valid request.");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));
        }
        return view($this->__loadDataToView($this->base_view . 'edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name'=>'required'
            ]);
            $data['record']=$this->model::find($id);
            if(!$data['record' ]){
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));

            }
            $record=$data['record']->update($request->all());
            if($record)
            {
                request()->session()->flash('success',$this->module."Updated");
            }else{
                request()->session()->flash('error',$this->module."Updation Failed ");

            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
}
