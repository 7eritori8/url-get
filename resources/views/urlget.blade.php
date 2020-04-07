{{csrf_field()}}
<form method="get">
    <p>検索するURL</p>
    <input type="text" name="url">
    <p>
        <input type="submit" value="URLを入力してタイトルを取得">
    </p>
</form>

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
        echo $past_url . "<br>";
        $souce = file_get_contents($past_url);
        if(preg_match('/<title>(.*?)<\/title>/i',$souce,$result)==1){
            echo '<textarea cols="40" rows="3">';
            echo $result[1];
            echo'</textarea>';

        }
    }

//URLの中身のコードを取得

}
?>
