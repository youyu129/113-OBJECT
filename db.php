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

        if(!empty($arg[1])){
            $sql=$sql . $arg[1];
        }
        return $this->fetchAll($sql);
    }

        // $table就是dept
        // return $this->q("SELECT * FROM $this->table");
        
        /*
        * 撈出一筆資料
        * 唯一的，如id、帳號...
        */
        // 一筆資料
        // return $this->fetchOne($sql);
        function find($id){
            // table後面加一個空白
            $sql="SELECT * FROM $this->table";
            
            if(is_array($id)){
                $where=$this->a2s($id);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                // $sql=$sql.$arg[0];
                $sql .=  " WHERE `id`='$id' ";
            }
        return $this->fetchOne($sql);
    }
    
    // save
    // 同時有新增跟編輯的能力
    // 缺點是一次只能處理一筆資料
    function save($array){
        if(isset($array['id'])){
            // update
        }else{
            // insert
            $cols=array_keys($array);
            // $sql="INSERT INTO $this->table (``) VALUES('')"
            // $sql="INSERT INTO $this->table (`".."`) VALUES('".."')";
            $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
            return $this->pdo->exec($sql);
        }
    }

        /*
        * 刪除資料
        * 一筆多筆都可以
        */
        function del($id){
            // table後面加一個空白
            $sql="DELETE FROM $this->table";
            
            if(is_array($id)){
                $where=$this->a2s($id);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                // $sql=$sql.$arg[0];
                $sql .=  " WHERE `id`='$id' ";
            }
            // 不須取回資料
            return $this->pdo->exec($sql);
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
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function fetchAll($sql){
        // debug用：
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
// $dept=$DEPT->all(['id'=>3]);

// 由大到小排列
// $dept=$DEPT->all(" Order by `id` DESC");


$dept=$DEPT->find(['code'=>'404']);
$DEPT->del(['code'=>'504']);
$DEPT->save(['code'=>'504','id'=>'7','name'=>'資訊部']);

dd($dept);


?>