<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;
use App\Http\Requests\CreateTypeData;

use Illuminate\Support\Facades\Auth;

use App\Type;
use App\Spending;
use App\Income;



class RegistIncomeController extends Controller
{
    public function createType(CreateTypeData $request) {

        $type = new Type;

        $type->name = $request->name;

        $type->category = '1';
        
        Auth::user()->type()->save($type);

        return redirect('create_income');
    }
}
