@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>支出</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('edit.income', ['income' => $params['id']]) }}" method="post">
                            @csrf
                            <label for='amount'>金額</label>
                                <input type='text' class='form-control' name='amount' value="{{ $params['amount']}}"/>
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date' value="{{ $params['date']}}"/>
                            <label for='type' class='mt-2'>カテゴリ</label>
                            <select name='type_id' class='form-control'>
                                <option value='' hidden>カテゴリ</option>
                                @foreach($types as $type)
                                 @if($type['id'] == $params['type_id'])
                                  <option value="{{ $type['id']}}" selected>{{ $type['name'] }}</option>
                                 @else
                                 <option value="{{ $type['id']}}">{{ $type['name'] }}</option>
                                 @endif
                                @endforeach
                            </select>
                            <label for='comment' class='mt-2'>メモ</label>
                                <textarea class='form-control' name='comment'>{{ $params['comment']}}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection