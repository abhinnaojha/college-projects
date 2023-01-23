<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends BackendBaseController
{
    protected $base_route = 'admin.';
    protected $base_view = 'backend.admin.';
    protected $module = 'Admin';

    public function __construct()
    {
        $this->model = new Admin();
    }
    function index()
    {
        $data['records'] = DB::table('admins')
            ->join('users', 'admins.user', '=', 'users.id')
            ->select('admins.id as admin_id', 'users.id as user_id', 'users.name as user_name')
            ->get();

//        $data['records'] = DB::table('admins')
//            ->join('users', 'admins.id', '=', 'users.id')
//            ->select('users.id as user_id', 'admins.id as admin_id', 'users.name as user_name')
//            ->whereIn('users.id', function ($query){
//                $query->select('user')->from('admins');
//            })
//            ->get();

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
            echo $request->get('user');
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
