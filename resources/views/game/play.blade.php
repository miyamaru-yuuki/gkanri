<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>プレイ記録一覧</title>
</head>
<body>

<h1>プレイ記録一覧</h1>
<table>
    <tr><th>プレイID</th><th>メーカー名</th><th>ゲーム名</th><th>プレイした日時</th><th>プレイの評価</th></tr>
    @foreach ($gameData as $data)
        <tr><td>{{$data->pid}}</td><td><a href="{{url('play/0/' .$data->mid. '/squeeze')}}">{{$data->mname}}</a></td><td><a href="{{url('play/' .$data->gid. '/0/squeeze')}}">{{$data->gname}}</a></td><td>{{$data->hi}}</td><td>{{$data->evaluation}}</td></tr>
    @endforeach
</table>

<br>

<p>プレイの平均評価：{{$playData[0]->evaluationAvg}}</p>

<form action="/playaddkakunin" method="post">
    {{ csrf_field() }}
    <div>ゲーム名：
        <select name="gid">
            @foreach($gameDataAll as $data)
                <option value="{{$data['gid']}}">{{$data['gname']}}</option>
            @endforeach
        </select>
    </div>
    <p>プレイした日時：<input type="date" name="hi"></p>
    <p>プレイの評価：<input type="text" name="evaluation"></p>
    <input type="submit" value="追加">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>