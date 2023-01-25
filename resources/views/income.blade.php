@extends('layouts.layout')
    @section('content')
        <main class="py-4">
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
                                        <tr>
                                            <th scope='col'>日付</th>
                                            <th scope='col'>金額</th>
                                            <th scope='col'>カテゴリ</th>
                                            <th scope='col'>コメント</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                        <tr>
                                            <th scope='col'>{{ $params['date'] }}</th>
                                            <th scope='col'>{{ $params['amount'] }}</th>
                                            <th scope='col'>{{ $params->type['name'] }}</th>
                                            <th scope='col'>{{ $params['comment'] }}</th>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class='d-flex'>
                         <div class='d-flex justify-content-left mt-3'>
                         <form action="{{ route('delete.income', ['income' => $params['id']]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-secondary">削除</button>
                         </form>
                         <a href="{{ route('edit.income', ['income' => $params['id']]) }}">
                          <button class='btn btn-secondary'>編集</button>
                         </a>
                         <form action="{{ route('softdelete.income', ['income' => $params['id']]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-secondary">論理削除</button>
                         </form>
                     </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection
    </div>
</body>
</html>