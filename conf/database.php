<?php
class DB{
    protected $pdo=null;
    protected $stmt=null;
    public $error="";
    public $lastid=null;

    function __construct()
    {
        try{
            $str="mysql:host".DB_HOST.";charset=". DB_CHARSET;
            if (defined('DB_NAME')) {
                $str .=";dbname=" . DB_NAME;

            }
            $this->pdo=new PDO(
                $str,DB_USER,DB_PASSWORD,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
            return true;
        }
        catch(Exception $ex){
            print_r($ex);
            die();
        }
    }
    function __destruct()
    {
        if($this->stmt !==null){$this->stmt=null;}
        if($this->pdo!==null){$this->pdo=null;}
    }
    function start(){
        $this ->pdo->beginTransaction();
    }
    function end($commit=1){
        if($commit){
            $this->pdo->commit();
        }
        else{
            $this->pdo->rollBack();
        }
    }
    function exec($sql,$data=null){
        try{
            $this->stmt=$this->pdo->prepare($sql);
            $this->stmt->execute($data);
            $this->lastID = $this->pdo->lastInsertId();
        } catch (Exception $ex) {
          $this->error = $ex;
          return false;
        }
        $this->stmt = null;
        return true;
        }
        
  function fetch($sql, $cond=null, $key=null, $value=null) {
    // fetch() : perform select query
    // PARAM $sql : SQL query
    //       $cond : array of conditions
    //       $key : sort in this $key=>data order, optional
    //       $value : $key must be provided, sort in $key=>$value order
  
      $result = false;
      try {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($cond);
        if (isset($key)) {
          $result = array();
          if (isset($value)) {
            while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
              $result[$row[$key]] = $row[$value];
            }
          } else {
            while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
              $result[$row[$key]] = $row;
            }
          }
        } else {
          $result = $this->stmt->fetchAll();
        }
      } catch (Exception $ex) {
        $this->error = $ex;
        return false;
      }
      $this->stmt = null;
      return $result;
    }
    }
    ?>