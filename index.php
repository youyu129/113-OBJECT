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
    // return是回傳值
    public function getName(){
        return $this->name;
    }
    // 設定名稱，不需要return(回傳)
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

<h1>繼承</h1>
<?php

class Cat extends Animal implements Behavior{
    protected $type='cat';
    protected $name="Judy";

    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }

    function jump(){
        echo $this->name . " jummpping 2m";
    }
}

// 界面
// 先看Interface 就可以看這些類別裡面有哪些方法
Interface Behavior{
    public function run();
    public function speed();
    public function jump();
}



$mycat=new Cat('white');

echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");
echo "<br>";
echo $mycat->getName();
echo "<br>";
echo $mycat->jump();



?>

</body>
</html>