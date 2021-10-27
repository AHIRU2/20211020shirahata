<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
</head>
<style>
    body {
        background-color: #291E77;
        position: relative;
    }

    h1 {
        padding-left: 30px;
        font-size: 25px;
    }

    button {
        height: 35px;
        width: 60px;
        background-color: #ffffff;
        border-radius: 5px;
        font-size: 12px;
    }

    .TodoList {
        width: 55%;
        background-color: #ffffff;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, 50%);
        border-radius: 10px;
    }

    .add {
        margin-bottom: 30px;
        text-align: center;
        width: 100%;
    }

    .add input {
        width: 70%;
        padding-right: 30px;
        height: 30px;
        border: 1px solid #CACACA;
        border-radius: 5px;
    }

    .add button {
        margin-left: 50px;
    }

    .task input {
        height: 25px;
        font-size: 14px;
        border: 1px solid #CACACA;
        border-radius: 5px;
        width: 100%;
    }


    table {
        width: 100%;
        text-align: center;
        margin-bottom: 30px;
    }

    th {
        padding: 5px 40px;
    }


    td {
        padding: 5px 10px;
        text-align: center;
    }
</style>

<body>
    <div class="TodoList">
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
        <form action="/" method="post">
            @csrf
            <div class="add">
                <input type="text" name="content">
                <button>追加</button>
            </div>

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
                    <td>
                        <!-- <div class="task">
                            <input type="text" name="content" value="{{$item->content}}">
                        </div> -->
                        {{$item->content}}
                    </td>
                    <td>
                        <button class="edit" type="button">編集</button>
                    </td>
                    <td>
                        <button class="delete" type="button">削除</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </form>
    </div>
</body>

</html>