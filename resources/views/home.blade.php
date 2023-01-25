@extends('layouts.layout')
    @section('content')
     <main class="py-4">
         <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            <div class='text-left'><a href="{{ route('date.fillter', $lastMonth) }}">前月</a></div>
                            <div class='text-center'>集計:{{ $yearMonth }}</div>
                            <div class='text-right'><a href="{{ route('date.fillter', $nextMonth) }}">来月</a></div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                           <th scope='col'>合計:{{ $sum_t }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
            <div class='row justify-content-around mt-3'>
                <a href="{{ route('create.income') }}">
                    <button type='button' class='btn btn-primary'>+ 収入</button>
                </a>
                <a href="{{ route('create.spend') }}">
                    <button type='button' class='btn btn-secondary'>- 支出</button>
                </a>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>収入</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <th>収入計: {{ $sum_i }}</th>
                                        <tr>
                                            <th scope='col'></th>
                                            <th scope='col'>日付</th>
                                            <th scope='col'>金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                        @foreach($incomes as $income)
                                        <tr>
                                            <th scope='col'>
                                                <a href="{{ route('income.detail', ['income' => $income['id']]) }}">#</a>
                                            </th>
                                            <th scope='col'>{{ $income['date'] }}</th>
                                            <th scope='col'>{{ $income['amount'] }}</th>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>支出</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                        <th>支出計:{{ $sum_s }}</th>
                                    <tr>
                                        <th scope='col'></th>
                                        <th scope='col'>日付</th>
                                        <th scope='col'>金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ここに支出を表示する -->
                                    @foreach($spends as $spend)
                                        <tr>
                                            <th scope='col'>
                                                <a href="{{ route('spend.detail', ['spending' => $spend['id']]) }}">#</a>
                                            </th>
                                            <th scope='col'>{{ $spend['date'] }}</th>
                                            <th scope='col'>{{ $spend['amount'] }}</th>
                                       </tr>
                                      @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection
    </div>
</body>
</html>