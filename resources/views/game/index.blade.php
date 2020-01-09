<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>ゲーム一覧</title>
</head>
<body>

<h1>ゲーム一覧</h1>
<table>
    <tr><th>ゲームID</th><th>メーカー名</th><th>ゲーム名</th><th>プレイ可能な人数(最小)</th><th>プレイ可能な人数(最大)</th><th>標準プレイ時間</th><th>推奨年齢</th></tr>
    @foreach ($gameData as $data)
        <tr><td>{{$data->gid}}</td><td><a href="{{$data->mweb}}">{{$data->mname}}</a></td><td>{{$data->gname}}</td><td>{{$data->playersnumbermin}}</td><td>{{$data->playersnumbermax}}</td><td>{{$data->playtime}}</td><td>{{$data->recommendedage}}</td></tr>
    @endforeach
</table>

<br>

<div><a href="{{ url('play/') }}">プレイ記録一覧</a></div>
<div><a href="{{ url('playcount/') }}">ゲーム別プレイ回数</a></div>

<form action="/search" method="get">
    <div>
        <p>人数：<input type="text" name="playersnumber"></p>
        <p>年齢：<input type="text" name="playersage"></p>
    </div>
    <input type="submit" value="検索">
</form>

<form action="/playcount" method="get">
    <div>年度：
        <select name="pid">
            @foreach($playData as $data)
                <option value="{{$data['pid']}}">{{$data['hi']}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="表示">
</form>

</body>
</html>