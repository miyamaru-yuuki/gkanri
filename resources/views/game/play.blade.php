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
        <tr><td>{{$data->pid}}</td><td>{{$data->mname}}</td><td>{{$data->gname}}</td><td>{{$data->hi}}</td><td>{{$data->evaluation}}</td></tr>
    @endforeach
</table>

</body>
</html>