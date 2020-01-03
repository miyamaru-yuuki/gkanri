<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>プレイ記録追加確認</title>
</head>
<body>

<p>ゲーム名：{{$gameData['gname']}}</p>
<p>プレイした日時：{{$hi}}</p>
<p>プレイの評価：{{$evaluation}}</p>
<p>を追加しますか？</p>

<form action="/playaddkanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="gid" value="{{$gid}}">
    <input type="hidden" name="hi" value="{{$hi}}">
    <input type="hidden" name="evaluation" value="{{$evaluation}}">
    <input type="submit" value="追加">
</form>

<a href="{{ url('play/') }}">戻る</a>

</body>
</html>