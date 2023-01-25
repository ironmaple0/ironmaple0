<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData;

use Illuminate\Support\Facades\Auth;

use App\Spending;

use App\Income;

use App\Type;

use Carbon\Carbon;


class DisplayController extends Controller
{

    public function fillter(string $yearMonth){
        
        $date = new Carbon($yearMonth);

        $yearMonth = $date->format('Y-m');

        $lastMonth = $date->subMonthsNoOverflow(1)->format('Y-m');

        $nextMonth = $date->addMonthsNoOverflow(2)->format('Y-m');
        
        $spending = Auth::user()->Spending()->where("date", "LIKE", "$yearMonth%")->get();

        $SpendAll = $spending->where("del_flg",0);

        $sum_spend = $SpendAll->sum('amount');

        $income = Auth::user()->Income()->where("date", "LIKE", "$yearMonth%")->get();

        $IncomeAll = $income->where("del_flg",0);

        $sum_income = $IncomeAll->sum('amount');

        $sum_total =  $sum_income - $sum_spend ;

        return view('next',[
            'spends' => $SpendAll,
    
            'incomes' => $IncomeAll,

            'sum_s' => $sum_spend,

            'sum_i' => $sum_income,

            'sum_t' => $sum_total,

            'lastMonth' => $lastMonth,

            'nextMonth' => $nextMonth,

            'yearMonth' => $yearMonth,
        ]);
    }

    public function index() {
        
        $date = Carbon::now();

        $yearMonth = $date->format('Y-m');

        //$lastMonth = date("Y-m",strtotime($yearMonth."-1 month"));

        $lastMonth = $date->subMonthsNoOverflow(1)->format('Y-m');

        //$nextMonth = date("Y-m",strtotime($yearMonth."+1 month"));

        $nextMonth = $date->addMonthsNoOverflow(2)->format('Y-m');
        
        $spending = Auth::user()->Spending()->where("date", "LIKE", "$yearMonth%")->get();

        $SpendAll = $spending->where("del_flg",0);

        $sum_spend = $SpendAll->sum('amount');

        $income = Auth::user()->Income()->where("date", "LIKE", "$yearMonth%")->get();

        $IncomeAll = $income->where("del_flg",0);

        $sum_income = $IncomeAll->sum('amount');

        $sum_total =  $sum_income - $sum_spend ;

        return view('home',[
            'spends' => $SpendAll,
    
            'incomes' => $IncomeAll,

            'sum_s' => $sum_spend,

            'sum_i' => $sum_income,

            'sum_t' => $sum_total,

            'lastMonth' => $lastMonth,

            'nextMonth' => $nextMonth,

            'yearMonth' => $yearMonth,
        ]);

    }

    public function spendDetail(Spending $spending) {

        return view('spend',[
            'params' => $spending,
        ]);
    }

    public function incomeDetail(Income $income) {

        return view('income',[
            'params' => $income,
        ]);
    }

}