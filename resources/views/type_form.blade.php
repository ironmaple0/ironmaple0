@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>カテゴリ</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('create.type_s') }}" method="post">
                            @csrf
                            <label for='name'>カテゴリ</label>
                                <input type='text' class='form-control' name='name'/>
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