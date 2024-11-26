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
    * 1. 整張資料表
    * 2. 有條件
    * 3. 其他SQL功能
    */
    // 下面隨時可以呼叫$this->table $this->pdo
    // 下面的function可以隨時取用這兩個變數 $pdo $table
    // 不定參數...$arg
    function all(...$arg){
        // table後面加一個空白
        $sql="SELECT * FROM $this->table ";
        
        if(!empty($arg[0])){
            if(is_array($arg[0])){
                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                // $sql=$sql.$arg[0];
                $sql .= $arg[0];
            }

        }
        return $this->fetchAll($sql);
    }

        // $table就是dept
        // return $this->q("SELECT * FROM $this->table");
        
        // 一筆資料
        // return $this->fetchOne($sql);
    

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
$dept=$DEPT->all(['id'=>3]);

dd($dept);


?>