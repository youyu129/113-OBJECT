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
    // 通常成員不會公開
   protected $type='animal';
   protected $name='John';
   protected $hair_color='black';
   protected $feet=['front-left','front-right','back-left','back-right'];

    // 通常方法是public
    // $this就是class Animal
    function __construct($type,$name,$hair_color){
        // Animal裡面的type就是傳進來的type
        $this->type=$type;
        $this->name=$name;
        $this->hair_color=$hair_color;
    }

    // function通常是public
    function run(){
        echo $this->name.' is running';
    }

    function speed(){
        // 請把裡面的name丟出來
        echo $this->name.' is running at 20km/h';
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }
}

// 實例化instance
// 有三個屬性及兩個方法(function)
$cat=new Animal('cat','Kitty','white');

// type使用的時候不需要$
// $cat->type 取用cat裡面的type

// echo $cat->type;

// echo $cat->name;
echo $cat->getName();

// echo $cat->hair_color;

echo $cat->run();

echo $cat->speed();

// 陣列要用print_r
// print_r($cat->feet);

// $cat->name='';
// echo $cat->getName();

$cat->setName('Mary');
echo $cat->getName();




?>
</body>
</html>