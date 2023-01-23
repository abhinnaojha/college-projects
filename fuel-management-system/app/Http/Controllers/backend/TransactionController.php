<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class TransactionController extends BackendBaseController
{
    protected $base_route = 'transaction.';
    protected $base_view = 'backend.transaction.';
    protected $module = 'Transaction';

    public function __construct()
    {
        $this->model = new Transaction();
    }
    function index()
    {
        $data['records'] = DB::table('transactions')
            ->join('fueltypes', 'transactions.fuel', '=', 'fueltypes.id')
            ->join('pumps', 'transactions.pump', '=', 'pumps.id')
            ->select(
                'transactions.customer as customer',
                'pumps.name as pump',
                'fueltypes.name as fuel',
                'transactions.quantity as quantity',
            )
            ->get();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    function create(Request $request)
    {
        $data['pump_id'] = $request->id;
        $data['fuels'] = DB::table('fueltypes')
            ->join('fueltype_pump', 'fueltypes.id', '=', 'fueltype_pump.fuel')
            ->select('fueltypes.id as ft_id', 'fueltypes.name as ft_name')
            ->where('fueltype_pump.pump', '=', $data['pump_id'])
            ->get();
        $data['customers'] = DB::table('customers')
            ->select('id', 'license_number')
            ->get();


        return view($this->__loadDataToView($this->base_view .'create'), compact('data'));
    }

    function finalise(Request $request)
    {
        $total = 0;

        $data['finalised'] = $request;
        $data['customers'] = DB::table('transactions')
            ->select('id', 'quantity')
            ->where('customer', '=', $data['finalised']->customer)
            ->where('fuel', '=', $data['finalised']->fuel)
            ->whereDate('created_at', '>=', Carbon::now()->startOfMonth())
            ->get();

        foreach ($data['customers'] as  $customer)
        {
            $total = $total + $customer->quantity;
        }
        $new_total = $total + $data['finalised']->quantity;

        $fuel_scheme = DB::table('fuelschemes')
            ->select('end_at', 'price')
            ->where('fuel', '=', $data['finalised']->fuel)
            ->get();


        $data['amount'] = 0;
        for($i = 0; $i < count($fuel_scheme); $i++)
        {
            if($new_total <= $fuel_scheme[$i]->end_at)
            {
                $data['amount'] = $data['amount'] + ($new_total - $total) * $fuel_scheme[$i]->price;
                break;
            }
            else if ($total <= $fuel_scheme[$i]->end_at)
            {
                $diff = $fuel_scheme[$i]->end_at - $total;
                $data['amount'] = $data['amount'] + $diff * $fuel_scheme[$i]->price;
                $total = $total + $diff;
            }
        }

        return view($this->__loadDataToView($this->base_view .'finalise'), compact('data'));
    }

    function store(Request $request)
    {
        try{
            $record = $this->model::create($request->all());
            if($record)
            {
                request()->session()->flash('success',$this->module." created");
                return redirect()->route('home');
            }else{
                request()->session()->flash('error',($this->__loadDataToView($this->module)).$this->module." creation failed ");
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());
            return redirect()->route($this->__loadDataToView($this->base_route.'create'));
        }
    }

    public function get_fueltype(Request $request)
    {
        $pump_id = $request->id;

        echo $pump_id;

        $records = DB::table('fueltype_pump')
            ->join('fueltypes', 'fueltype_pump.pump', '=', 'fueltypes.id')
            ->select('fueltype_pump.fuel as fuel_id', 'fueltypes.name as fuel_name')
            ->where('pump', '=', $pump_id);

//        $options = "<select name='fuel' id='fuel'>";
        $options = "<option value = ''>-select fuel type-</option>";
        foreach ($records as $r)
        {
            $options .= "<option value='$r->fuel_id '>$r->fuel_name</option>";
        }
//        $options .= "</select>";
        return $options;
    }
}
