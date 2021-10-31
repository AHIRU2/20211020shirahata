<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>

<body>
    <div class="TodoList">
        <div class="TodoContents">
            <h1>Todo List</h1>
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
            @endif
            <form action="todo/create" method="post">
                @csrf
                <div class="add">
                    <input type="text" name="content">
                    <button class="create">追加</button>
                </div>
            </form>
            <table>
                <tr>
                    <th>作成日</th>
                    <th>タスク</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                @foreach ($contents as $item)
                <tr>
                    <td>
                        {{$item->created_at}}
                    </td>
                    <form action="todo/update" method="post">
                        @csrf

                        <td>
                            <!-- <input type="hidden" name="_token" value="{{$item->id}}"> -->
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="task">
                                <input type="text" name="content" value="{{$item->content}}">
                            </div>
                            <!-- {{$item->content}} -->
                        </td>
                        <td>
                            <button type="submit" class="edit">編集</button>
                        </td>
                    </form>
                    <td>
                        <form action="{{url('todo/delete/'.$item->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <!-- <input type="hidden" name="_token" value="{{$item->id}}"> -->
                            <button type="submit" class="delete">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            </form>
        </div>
    </div>
</body>

</html>