{{csrf_field()}}

<form method="get">
    <p>検索するURLを入力してください</p>
    <input type="text" name="url"size="20">
    <p>
        <input type="submit" value="タイトルを取得">
    </p>
    <p>
        <a href="/">リセットする</a>
    </p>
</form>
<h2>このサイトの説明</h2>
<p>このサイトはURLを上のフォームに入力すると、そのサイトの過去１０年分のタイトルを取得できます。</p>
<p>※しばらく時間がかかります。気長にしばらくお待ち下さい。修正予定です。</p>
<?php

if (isset($_GET['url'])) {
    $url=$_GET['url'];
//    現在の西暦を取得
    $year = date("Y");

//１０年遡る
    for ($i = 0; $i <= 10; $i++) {
//    $url_yearに過去10年分の西暦を定義
        $url_year = $year - $i;
//    入力されたURLにhttps://web.archive.orgを合体
//    $past_urlにarchive入のURLを代入
        $past_url = "https://web.archive.org/web/" . $url_year."/". $url;
//        echo $url_year. "年<br>";
        $souce = file_get_contents($past_url);
        if(preg_match('/<title>(.*?)<\/title>/i',$souce,$result)==1){
            echo '<textarea cols="40" rows="3">';
            echo $result[1];
            echo'</textarea><br>';
            echo '<br>';
//            echo $past_url;

        }
    }

//URLの中身のコードを取得

}
?>
