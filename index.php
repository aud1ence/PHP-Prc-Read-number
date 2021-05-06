<?php
$ones = [
    "0" => "",
    "1" => "One",
    "2" => "Two",
    "3" => "Three",
    "4" => "Four",
    "5" => "Five",
    "6" => "Six",
    "7" => "Seven",
    "8" => "Eight",
    "9" => "Nine"
];
$tens = [
    "2" => "twenty",
    "3" => "thirty",
    "4" => "forty",
    "5" => "fifty",
    "6" => "sixty",
    "7" => "seventy",
    "8" => "eighty",
    "9" => "ninety",
];
$teen = [
    "1" => "eleven",
    "2" => "twelve",
    "3" => "thirteen",
    "4" => "fourteen",
    "5" => "fifteen",
    "6" => "sixteen",
    "7" => "seventeen",
    "8" => "eighteen",
    "9" => "nineteen"
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $readCase1 = $_POST["search"];
    if ($readCase1 < 10 && $readCase1 >= 0) {
        switch ($readCase1) {
            case 0:
                echo "";
                break;
            case 1:
                echo "One";
                break;
            case 2:
                echo "Two";
                break;
            case 3:
                echo "Three";
                break;
            case 4:
                echo "Four";
                break;
            case 5:
                echo "Five";
                break;
            case 6:
                echo "Six";
                break;
            case 7:
                echo "Seven";
                break;
            case 8:
                echo "Eight";
                break;
            case 9:
                echo "Nine";
                break;
        }
    } elseif ($readCase1 < 20 && $readCase1 >= 10) {
        switch ($readCase1) {
            case 10:
                echo "Ten";
                break;
            case 11:
                echo "Eleven";
                break;
            case 12:
                echo "Twelve";
                break;
            case 13:
                echo "Thirteen";
                break;
            case 15:
                echo "Fifteen";
                break;
            case 14:
                echo "Fourteen";
                break;
        }
    }
}
$arrCase1 = str_split($readCase1, 1);
if ($readCase1 < 100 && $readCase1 >= 20) {
    foreach ($tens as $k => $v) {
        if ($arrCase1[0] == $k) {
            $readTen = $tens[$k];
        }
    }
    foreach ($ones as $k => $v) {
        if ($arrCase1[1] == $k) {
            $readOne = $ones[$k];
            echo $readTen . ' ' . $readOne;
        }
    }
}
if ($readCase1 < 1000 && $readCase1 >= 100) {
    foreach ($ones as $k => $v) {
        if ($arrCase1[0] == $k) {
            $readHundred = $ones[$k] . ' hundred and ';
        }
    }
    foreach ($tens as $k => $v) {
        if ($arrCase1[1] == $k) {
            $readTen = $tens[$k];
        }
        elseif ($arrCase1[1] == 1) {
          $tam = $readHundred ." ". $teen[$readCase1[2]];
          $flag = true;
        }
    }

    foreach ($ones as $k => $v) {
        if ($arrCase1[2] == $k && $arrCase1[1] != 1) {
            $readOne = $ones[$k];
            $flag = false;
        }
    }
}
if ($flag) {
    echo $tam;
} else {
    echo $readHundred . $readTen . ' ' . $readOne;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Read Number</title>
    <style>
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }

        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<h2>Doc so thanh chu</h2>
<form method="post">
    <input type="text" name="search" placeholder="Nhập số cần đọc"/>
    <input type="submit" id="submit" value="Tìm"/>
</form>
</body>
</html>
