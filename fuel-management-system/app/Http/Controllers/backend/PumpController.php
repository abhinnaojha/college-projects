<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Fueltype;
use App\Models\backend\Fueltype_Pump;
use App\Models\backend\Pump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PumpController extends BackendBaseController
{
    protected $base_route = 'pump.';
    protected $base_view = 'backend.pump.';
    protected $module = 'Pump';

    public function __construct()
    {
        $this->model = new Pump();
    }
    function index()
    {
        $data['records'] = $this->model::all();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    function view($id)
    {
        $data['record'] = $this->model::find($id);
        $data['fuel'] = DB::table('fueltype_pump')
            ->join('fueltypes', 'fueltype_pump.fuel', '=','fueltypes.id')
            ->select('fueltypes.id as f_id', 'fueltypes.name as f_name')
            ->where('fueltype_pump.pump', '=', $id)
            ->get();
        return view($this->__loadDataToView($this->base_view.'view'), compact('data'));
    }
    function create()
    {
        $data['fuels'] = DB::table('fueltypes')
            ->select('id', 'name')
            ->get();
        $data['records'] = DB::table('users')
            ->select('users.id as user_id', 'users.name as user_name')
            ->whereNotIn('users.id', function ($query){
                $query->select('user')->from('admins');
            })
            ->whereNotIn('users.id', function ($query){
                $query->select('user')->from('customers');
            })
            ->whereNotIn('users.id', function ($query){
                $query->select('user')->from('pumps');
            })
            ->get();

        return view($this->__loadDataToView($this->base_view .'create'), compact('data'));
    }

    function store(Request $request)
    {
        try{
            $record = $this->model::create($request->all());

            $last = DB::table('pumps')->latest()->first();

            foreach ($request->input('fuel') as $fuel)
            {
                Fueltype_Pump::create([
                    'fuel' => $fuel,
                    'pump' => $last->id
                ]);
            }

            if($record)
            {
                request()->session()->flash('success',$this->module." created");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }else{
                request()->session()->flash('error',($this->module." creation failed "));
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
        $data['fuels'] = DB::table('fueltypes')
            ->select('id', 'name')
            ->get();

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
                'name'=>'required',
                'address'=>'required'
            ]);
            $data['record']=$this->model::find($id);
            $data['fuel_pump'] = DB::table('fueltype_pump')
                ->where('pump','=', $id)
                ->get();

            if(!$data['record']){
                request()->session()->flash('error',"Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }
            $record=$data['record']->update($request->all());

            foreach ($data['fuel_pump'] as $fuel_pump)
            {
                DB::table('fueltype_pump')
                    ->delete($fuel_pump->id);
            }

            foreach ($request->input('fuel') as $fuel)
            {
                Fueltype_Pump::create([
                    'fuel' => $fuel,
                    'pump' => $id
                ]);
            }

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
