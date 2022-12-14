<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todolist</title>
</head>

<body>
  <h1>TodoList</h1>
  <form action="/create" method="POST">
    <input type="text" name="name"><input type="button" value="追加">
  </form>
  @csrf
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach($todos as $todo)
    <tr>
      <td>{{$todo->created_at}}</td>
      <td>{{$todo->name}}</td>
    </tr>
    @endforeach
  </table>

</body>

</html>