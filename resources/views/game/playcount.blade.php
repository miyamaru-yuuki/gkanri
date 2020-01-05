<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>プレイ記録一覧</title>
</head>
<body>

<h1>プレイ記録一覧</h1>
<table>
    <tr><th>ゲームID</th><th>メーカー名</th><th>ゲーム名</th><th>プレイした回数</th></tr>
    @foreach ($gameData as $data)
        <tr><td>{{$data->gid}}</td><td>{{$data->mname}}</td><td>{{$data->gname}}</td><td>{{$data->playcount}}</td></tr>
    @endforeach
</table>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>