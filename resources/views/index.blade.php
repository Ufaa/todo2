<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap基本テンプレート</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </head>
  <body>
    <table class = "table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">やること</th>
          <th scope="col">追加日</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($todos as $todolist)
      <tr>
        <th scope="row">{{$todoList->id}}</th>
        <td>{{$todoList->content}}</td>
        <td>{{$todoList->created_at}}</td>

        <td>
          <form action="/" method="DELETE">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" value="{{$todoList->id}}">
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </tr>
      @endforeach
      </tbody>
    </table>
  </body>
</html>