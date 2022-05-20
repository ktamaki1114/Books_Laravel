@extends('layouts.app')
@section('content')

    <div class="card-body">
        <div class="page-info">
            本情報の更新
        </div>

        <form action="{{ url('book/update') }}" method="POST">
            @csrf

            <div class="book_id">
                <input type="hidden" name="id" value="{{ $book->id }}">
            </div> 

            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_name" class="form-control" value="{{ $book->item_name }}">
                </div>

                <div class="col-sm-6">
                    <input type="integer" name="item_number" class="form-control" value="{{ $book->item_number }}">
                </div>

                <div class="col-sm-6">
                    <input type="integer" name="item_amount" class="form-control" value="{{ $book->item_amount }}">
                </div>

                <div class="col-sm-6">
                    <input type="datetime" name="item_published" class="form-control" value="{{ $book->item_published }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>

    </div>


@endsection