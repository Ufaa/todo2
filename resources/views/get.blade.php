<!doctype html>
<html lang="ja">

<head>
  <title>Todoリスト</title>
  <!-- 必要なメタタグ -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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

      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>作成日</th>
          <th>削除日</th>
          <th>タスク名</th>
          <!--<th>更新日</th>-->
        </tr>
      </thead>

      <tbody>
        @foreach ($todos ?? '' as $todo)
        <tr>
          <!--<td>{{$todo->id}}</td>-->
          <!--<td>{{$todo->content}}</td>-->
          <td>{{$todo->created_at}}</td>
          <td>{{$todo->deleted_at}}</td>
          <!--<td>{{$todo->updated_at}}</td>-->

          <td>
            <form action="{{route('todos.update',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <input type="text" name="content" class="task" value="{{$todo->content}}">
            </form>
          </td>

          <td>
            <form action="{{route('todos.destroy',$todo->id)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
          </td>
        </tr>
        @endforeach
        <!--ページネーションのページ別リンク追記-->
        {{ $todos ?? ''->links() }}
    </table>
  </div>
</body>

</html>