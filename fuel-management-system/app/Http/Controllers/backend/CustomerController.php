<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends BackendBaseController
{
    protected $base_route = 'customer.';
    protected $base_view = 'backend.customer.';
    protected $module = 'Customer';

    public function __construct()
    {
        $this->model = new Customer();
    }
    function index()
    {
        $data['records'] = DB::table('customers')
            ->join('users', 'customers.user', '=', 'users.id')
            ->select('users.id as user_id', 'customers.id as customer_id', 'users.name as user_name')
            ->get();

        return view($this->__loadDataToView($this->base_view.'index'), compact('data')) ;

    }

    function create()
    {
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
            $record=$this->model::create($request->all());
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
}
