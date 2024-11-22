<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>
    <h1>物件的宣告</h1>
<?php

// 物件宣告 通常會用大寫開頭
class Animal{
    // 要先宣告public才能用變數 const常數
   public $type='animal';
   public $name='John';
   public $hair_color='black';

    function __construct($type,$name,$hair_color){
        $this->type=$type;
        $this->name=$name;
        $this->hair_color=$hair_color;
    }

    function run(){
        echo $this->name.' is running';
    }

    function speed(){
        echo $this->name.' is running at 20km/h';
    }
}

// 實例化instance
// 有三個屬性及兩個方法(function)
$cat=new Animal('cat','Kitty','white');

// type使用的時候不需要$
// 取用cat裡面的type
echo $cat->type;
echo $cat->name;
echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();

















?>
</body>
</html>