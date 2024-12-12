<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $bust = isset($_POST['bust']) ? (int)$_POST['bust'] : null;
    $waist = isset($_POST['waist']) ? (int)$_POST['waist'] : null;
    $hip = isset($_POST['hip']) ? (int)$_POST['hip'] : null;

    if ($name === null ||$bust === null || $waist === null || $hip === null) {
        echo "全ての項目を入力してください。";
        exit;
    }

    if ($bust >= $waist * 1.3) {
        echo "ダウト！本当にそのサイズですか？";
        exit;
    }

    // データをCSVに保存
    $data = [$name, $bust, $waist, $hip];
    $file = 'data.csv';
    $fp = fopen($file, 'a');
    fputcsv($fp, $data);
    fclose($fp);

    echo "アンケートの回答をありがとうございました！<br>";
    echo "<a href=\"index.html\">戻る</a>";
} else {
    echo "無効なリクエストです。";
}
