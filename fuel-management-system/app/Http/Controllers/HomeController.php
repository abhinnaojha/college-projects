<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $admin_flag = false;
        $customer_flag = false;
        $pump_flag = false;


        $user_id = 0;
        $pump_id = 0;
        $customer_id = 0;

        $admin_list = DB::table('admins')
            ->select('id', 'user')
            ->get();

        $customer_list = DB::table('customers')
            ->select('id', 'user')
            ->get();

        $pump_list = DB::table('pumps')
            ->select('id', 'user')
            ->get();

        foreach ($admin_list as $admins)
        {
            if(Auth::user()->id == $admins->user)
            {
                $user_id = $admins->user;
                $admin_flag = true;
            }
        }
        foreach ($customer_list as $customers)
        {
            if(Auth::user()->id == $customers->user)
            {
                $user_id = $customers->user;
                $customer_id = $customers->id;
                $customer_flag = true;
            }
        }
        foreach ($pump_list as $pumps)
        {
            if(Auth::user()->id == $pumps->user)
            {
                $user_id = $pumps->user;
                $pump_id = $pumps->id;
                $pump_flag = true;
            }
        }


        if($admin_flag)
        {
            return view('backend.home.admin');
        }
        else if($customer_flag)
        {
            $records['current_fuel'] = DB::table('transactions')
                ->join('pumps', 'transactions.pump', '=', 'pumps.id')
                ->join('fueltypes', 'transactions.fuel', '=', 'fueltypes.id')
                ->select(
                    'transactions.id as tran_id',
                    'transactions.quantity as quantity',
                    'pumps.name as pump',
                    'fueltypes.name as fuel',
                    'transactions.amount as amount',
                )
                ->where('transactions.customer', '=', $customer_id)
                ->whereDate('transactions.created_at', '>=', Carbon::now()->startOfMonth())
                ->get();

            return view('backend.home.customer', compact('records'));
        }
        else if($pump_flag)
        {
            $records['current_fuel'] = DB::table('transactions')
                ->join('customers', 'transactions.customer', '=', 'customers.id')
                ->join('fueltypes', 'transactions.fuel', '=', 'fueltypes.id')
                ->select(
                    'transactions.id as tran_id',
                    'transactions.quantity as quantity',
                    'customers.id as customer',
                    'fueltypes.name as fuel',
                    'transactions.amount as amount',
                )
                ->where('transactions.pump', '=', $pump_id)
                ->whereDate('transactions.created_at', '>=', Carbon::now()->startOfMonth())
                ->get();
            $records['pump_id'] = $pump_id;
            return view('backend.home.pump', compact('records'));
        }
        else
        {
            return view('backend.home.guest');
        }
    }
}
