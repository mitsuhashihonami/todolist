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
      font-size: large;
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

    .ttl {}

    .create {
      width: 500px;
      height: 30px;
    }

    .tuika {
      width: 50px;
      border-color: #dc70fa;
      color: #dc70fa;
      background-color: #fff;
      border-radius: 5px;
      padding: 5px;
      margin-left: 30px;
    }

    .kousinn {
      width: 50px;
      border-color: #fa9770;
      color: #fa9770;
      background-color: #fff;
      border-radius: 5px;
      padding: 5px;
    }

    .sakujyo {
      width: 50px;
      border-color: #71fadc;
      color: #71fadc;
      background-color: #fff;
      border-radius: 5px;
      padding: 5px;
    }
  </style>
  <div class="card">
    <h1 class="ttl">TodoList</h1>
    <form action="/create" method="POST">
      @csrf
      <input type="text" name="name" class="create"><input type="submit" class="tuika" value="追加">
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
        <form action="/update/{{$todo->id}}" method="POST">
          @csrf
          <td><input type="text" name="name" value="{{$todo->name}}"></td>
          <td><button type="submit" class="kousinn">更新</button></td>
        </form>
        <form action="/delete/{{$todo->id}}" method="POST">
          @csrf
          <td><button type="submit" class="sakujyo">削除</button></td>
        </form>
      </tr>
      @endforeach

    </table>
  </div>
</body>

</html>