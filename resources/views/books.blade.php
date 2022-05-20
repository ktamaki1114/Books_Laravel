<!-- resources/views/books.blade.php -->
<!-- layout/app.blade.phpをテンプレートに指定 -->
@extends('layouts.app')

<!-- テンプレートのyield(content)にここからの内容が表示される -->
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-info">
            本の情報
        </div>

        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')

        <!-- 本登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('books') }}" method="POST" class="form-horizontal">
            @csrf

            <!-- 本のタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_name" class="form-control" placeholder="本のタイトル" required>
                </div>

                <div class="col-sm-6">
                    <input type="integer" name="item_number" class="form-control" placeholder="冊数" required>
                </div>

                <div class="col-sm-6">
                    <input type="integer" name="item_amount" class="form-control" placeholder="金額" required>
                </div>

                <div class="col-sm-6">
                    <input type="datetime" name="item_published" class="form-control" placeholder="出版年月日" required>
                </div>

                <div class="col-sm-6">
                    <label>画像</label>
                    <input type="file" name="item_img">
                </div>
            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- セッションによるメッセージ表示 -->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <!-- Book: 既に登録されてる本のリスト -->
    @if (count($books) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>本一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        <?php $count = 0; ?>
                        @foreach ($books as $book)
                            <?php $count += 1 ?>
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $count }}&emsp;{{ $book->item_name }}</div>
                                    <div><img src="upload/{{$book->item_img}}" width="100"></div>
                                </td>

                                <!-- 本：編集ボタン -->
                                <td>
                                    <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form>
                                </td>
                                <!-- 本: 削除ボタン -->
                                <td>
                                    <!-- action:処理の投げ先 -->
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                                                     
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ページネート表示用追記 -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                {{ $books->links('paginator.bootstrap-5') }}
            </div>
        </div>
    @endif

@endsection
<!-- テンプレートのyield(content)にここまでの内容が表示される -->