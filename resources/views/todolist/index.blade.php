<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todolist</title>
</head>

<body>
  <style>
    body {
      background-color: #2d197c;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 800px;
      text-align: center;
      position: absolute;
      margin-left: 25vw;
      margin-top: 15vw;
      border-radius: 20px;
    }

    table {
      padding: 50px 100px;
    }

    td {
      padding: 0 15px;
    }
    .ttl{

    }

    .create {
      width: 500px;
      height: 30px;
    }
  </style>
  <div class="card">
    <h1 class="ttl">TodoList</h1>
    <form action="/create" method="POST">
      @csrf
      <input type="text" name="name" class="create"><input type="submit" value="追加">
    </form>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif

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
        <form action="/update/{id},$todo->id" method="POST">
          @csrf
          <td><input type="text" name="name" value="{{$todo->name}}"></td>
          <td><input type="submit" value="更新"></td>
        </form>
        <form action="/delete/{id},$todo->id" method="POST">
          @csrf
          <td><input type="submit" value="削除"></td>
        </form>
      </tr>
      @endforeach

    </table>
  </div>
</body>

</html>