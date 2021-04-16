<?php

namespace App\Http\Controllers;

use App\Http\Resources\Customer\CustomerCollection;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_customers()
    {
        $customers = User::where('user_level_id', UserLevel::where('scope', 'customer')->first()->id)->get();

        if(count($customers) > 0) {
            return new CustomerCollection($customers);
        } else {
            return 'no registered customers';
        }
    }
}
