<?php

class DB {
    // private 不能繼承
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    // 只宣告變數，沒有值，預設是null
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        // 資料庫沒有設密碼
        // pdo的目的：把資料傳出去
        $this->pdo=new PDO($this->dsn,'root'.'');
    }

    function all(){
        // $table就是dept
        return $this->q("SELECT * FROM $this->table");
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }
}

// 列印陣列的function
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$DEPT=new DB('dept');

// 原本$dept=$DEPT->q("SELECT * FROM dept");
// 可以簡化為下面：
$dept=$DEPT->all();

dd($dept);


?>