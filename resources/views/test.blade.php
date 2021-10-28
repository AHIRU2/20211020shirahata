<style>
    th {
        background-color: #289ADC;
        color: white;
        padding: 5px 40px;
    }

    tr:nth-child(odd) td {
        background-color: #FFFFFF;
    }

    td {
        padding: 25px 40px;
        background-color: #EEEEEE;
        text-align: center;
    }

    button {
        padding: 10px 20px;
        background-color: #289ADC;
        border: none;
        color: white;
    }
</style>
<form action="/delete" method="POST">
    <table>
        @csrf
        <tr>
            <th>
                name
            </th>
            <td>
                <input type="text" name="contents" value="{{$form->contents}}">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button>送信</button>
            </td>
        </tr>
    </table>
</form>