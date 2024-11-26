<?php

class DB {
    // private 不能繼承
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    // 只宣告變數，沒有值，預設是null
    protected $pdo;
    protected $table;

    function __construct($table){
        // this是指上面的DB
        $this->table=$table;
        // 資料庫沒有設密碼
        // pdo的目的：把資料傳出去
        $this->pdo=new PDO($this->dsn,'root'.'');
    }

    /*
    * 撈出全部資料
    *
    */
    // 下面隨時可以呼叫$this->table $this->pdo
    // 下面的function可以隨時取用這兩個變數 $pdo $table
    function all(){
        // $table就是dept
        return $this->q("SELECT * FROM $this->table");
    }

    /*
    * 把陣列轉成條件字串陣列
    */
    // array to string
    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }
    function fetchOne($sql){
        // debug用：
        //echo $sql;
        return $this->$pdo->query($sql)->fetch();
    }
    function fetchAll($sql){
        // debug用：
        //echo $sql;
        return $this->$pdo->query($sql)->fetchAll();
    }
    
}

// function q($sql){
//     return $this->pdo->query($sql)->fetchAll();
// }

// 列印陣列的function
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

// 實例化
$DEPT=new DB('dept');

// 原本$dept=$DEPT->q("SELECT * FROM dept");
// 可以簡化為下面：
$dept=$DEPT->all();

dd($dept);


?>