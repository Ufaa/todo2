<!doctype html>
<html lang="ja">

<head>
  <title>Todoリスト</title>
  <!-- 必要なメタタグ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->

  <style>
    body {
      background-color: #000080;
      display: relative;
    }

    .container {
      width: 900px;
      display: absolute;
      margin: auto;
      margin-top: 200px;
      background-color: white;
      border-radius: 10px;
      padding: 15px 30px 30px 30px;
    }

    .container2 p {
      color: red;
    }

    .form-group {
      float: left;
      text-align: justify;
      justify-content: space-between;
      margin: auto 10px;
    }

    .form-control {
      height: 30px;
    }

    .task {
      height: 20px;
      width: 300px;
      border-radius: 5px;
      border: solid 1px #C0C0C0;
      ;
    }

    table {
      margin-left: auto;
      margin-right: auto;
    }

    thead {
      text-align: center;
    }

    tbody {
      border: none;
      text-align: center;
    }

    td {
      padding: 5px 25px;
    }

    .form-group button {
      color: #FF00FF;
      background-color: white;
      font-size: 12px;
      font-weight: 700;
      border: 2px solid #FF00FF;
      border-radius: 5px;
      padding: 7px 15px;
      margin-left: 130px;
    }

    .btn-primary {
      color: #FF8C00;
      background-color: white;
      font-size: 12px;
      font-weight: 700;
      border: 2px solid #FF8C00;
      border-radius: 5px;
      padding: 7px 15px;
    }

    .btn-danger {
      color: #00FFFF;
      background-color: white;
      font-size: 12px;
      font-weight: 700;
      border: 2px solid #00FFFF;
      border-radius: 5px;
      padding: 7px 15px;
    }

    thead th {
      font-size: 15px;
      padding: 20px 0;
    }

    /*paginateメソッドの矢印の大きさ調整のために追加*/
    svg.w-5.h-5 {
      width: 30px;
      height: 30px;
    }
  </style>

</head>

<body>

  <div class="container">
    <div class="container2">
      <h2>Todo List</h2>

      <form action="/todos" method="post">
        {{csrf_field()}}
        @if ($errors->has('content'))
        <tr>
          <th></th>
          <td>
            <p>{{$errors->first('content')}}</p>
          </td>
        </tr>
        @endif
        <div class="form-group">
          <!--<label>やることを追加してください</label>-->
          <input type="text" name="content" class="form-control" placeholder="" style="width:675px;">
          <button type="submit" class="btn btn-primary">追加</button>
        </div>
      </form>

      <form action="{{route('index.search')}}" method="post">
        {{csrf_field()}}
        @if ($errors->has('content2'))
        <tr>
          <th></th>
          <td>
            <p>{{$errors->first('content2')}}</p>
          </td>
        </tr>
        @endif
        <input type="text" name="content2" value="{{$input ?? ''}}">
        <input type="submit" value="見つける">
      </form>
    </div>


    <!--<h1 style="margin-top:50px;">Todoリスト</h1>-->
    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <!--<th>更新日</th>-->

          <th>削除</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($todos ?? '' as $todo)
        <tr>
          <!--<td>{{$todo->id}}</td>-->
          <!--<td>{{$todo->content}}</td>-->
          <td>{{$todo->created_at}}</td>
          <!--<td>{{$todo->updated_at}}</td>-->

          <td>
            <form action="{{route('todos.update',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <input type="text" name="content" class="task" value="{{$todo->content}}">
          <td><button type="submit" class="btn btn-primary">更新</button></td>
          </form>
          </td>

          <td>
            <form action="{{route('todos.destroy',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
        <!--ページネーションのページ別リンク追記-->
        {{ $todos ?? ''->links() }}
    </table>
  </div>


  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    (function() {
      'use strict';

      var cmds = document.getElementsByClassName('del');
      var i;

      for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function(e) {
          e.preventDefault();
          if (confirm('are you sure?')) {
            document.getElementById('form_' + this.dataset.id).submit();
          }
        });
      }

    })();
  </script>
</body>

</html>