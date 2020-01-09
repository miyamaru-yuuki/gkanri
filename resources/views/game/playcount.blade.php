<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>プレイ回数</title>
</head>
<body>

<h1>{{$hi}}年プレイ回数</h1>
<table>
    <tr><th>ゲームID</th><th>メーカー名</th><th>ゲーム名</th><th>プレイした回数</th><th>評価の平均</th></tr>
    @foreach ($gameData as $data)
        <tr><td>{{$data->gid}}</td><td>{{$data->mname}}</td><td>{{$data->gname}}</td><td>{{$data->playcount}}</td><td>{{$data->evaluationAvg}}</td></tr>
    @endforeach
</table>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>