<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>ゲーム一覧</title>
</head>
<body>

<h1>ゲーム一覧</h1>
<table>
    <tr><th>ゲームID</th><th>ゲーム名</th></tr>
    @foreach ($gameData as $data)
        <tr><td>{{$data->gid}}</td><td>{{$data->gname}}</td></tr>
    @endforeach
</table>

</body>
</html>