<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;
use App\Http\Requests\CreateTypeData;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Type;
use App\Spending;
use App\Income;

class RegistrationController extends Controller
{
    public function createSpendForm() {

        $params = Auth::user()->type()->where('category','0')->get();

        if($params->isEmpty()){
            return view('type_form');
        }

        return view('spend_form', [
            'types' => $params,
        ]);
    }

    public function createSpend(CreateData $request) {

        $spending = new Spending;

        $spending->amount = $request->amount;
        $spending->date = $request->date;
        $spending->type_id = $request->type_id;
        $spending->comment = $request->comment;

        Auth::user()->spending()->save($spending);

        return redirect('/');
    }

    public function createIncomeForm() {

        $params = Auth::user()->type()->where('category','1')->get();

        if($params->isEmpty()){
            return view('type_i_form');
        }

        return view('income_form', [
            'types' => $params,
        ]);
    }

    public function createIncome(CreateData $request) {

        $income = new Income;

        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->type_id = $request->type_id;
        $income->comment = $request->comment;

        Auth::user()->income()->save($income);

        return redirect('/');
    }

    public function createType(CreateTypeData $request) {

        $type = new Type;

        $type->name = $request->name;

        $type->category = '0';
        
        Auth::user()->type()->save($type);

        return redirect('create_spend');
    }

    public function editSpendForm(Spending $spending) {

        $type = 0;

        $types = Type::where('category', $type)->get();

        return view('edit_s_form',[
            'params' => $spending,
            'types' => $types,
        ]);
    }

    public function editSpend(Spending $spending, CreateData $request) {

        $columns = ['amount', 'date', 'comment', 'type_id'];

        foreach($columns as $column) {
            $spending->$column = $request->$column;
        }

        Auth::user()->spending()->save($spending);

        return redirect('/');
    }

    public function editIncomeForm(Income $income) {
       
        $type = 1;

        $types = Type::where('category', $type)->get();

        return view('edit_i_form',[
            'params' => $income,
            'types' => $types,
        ]);
    }

    public function editIncome(Income $income,CreateData $request) {

        $columns = ['amount', 'date', 'comment', 'type_id'];

        foreach($columns as $column) {
            $income->$column = $request->$column;
        }

        Auth::user()->income()->save($income);

        return redirect('/');
    }

    public function deleteSpend(Spending $spending) {

        $spending->delete();

        return redirect('/');
    }

    public function deleteIncome(Income $income) {

        $income->delete();

        return redirect('/');
    }

    public function softdeleteSpend(Spending $spending) {
        
        $spending->del_flg = '1';
        
        Auth::user()->spending()->save($spending);

        return redirect('/');
    }

    public function softdeleteIncome(Income $income) {
        
        $income->del_flg = '1';
        
        Auth::user()->spending()->save($income);

        return redirect('/');
    }

}