<?php
/**
 * Interface for connection to the database
 */
include(__DIR__."/ReadConfig.php");
class Database extends ReadConfig
{
    function __construct($DBName)
    {
        $Config = new ReadConfig("Database");
        $this->dbname = $DBName;
        $this->host = $Config->Read()[$DBName]["ip"];
        $this->port = $Config->Read()[$DBName]["port"];
        $this->charset = $Config->Read()[$DBName]["charset"];
        $this->user = $Config->Read()[$DBName]["username"];
        $this->password = $Config->Read()[$DBName]["password"];
    }
    function Connect(){
        try{
            $this->database = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->port.";charset=".$this->charset, $this->user, $this->password);
            return $this->database;
        }catch (Exception $e){
            $this->database = $e->getMessage();
            return $this->database;
        }
    }
    function IsConnected(){
        if(gettype($this->database) != "string"){
            return true;
        }else{
            return false;
        }
    }
    function ShowAll($table, $order = null, $label = null){
        if($order != null){
            $req = $this->database->query("SELECT * FROM ".$table." ORDER BY ".$label." ".$order);
        }else{
            $req = $this->database->query("SELECT * FROM ".$table);
        }
        return $req->fetchAll();
    }
    function Show($fields = "*", $table, $col = null, $comparator = null, $value = null){
        if($col != null && $comparator != null && $value != null) {
            $req = $this->database->query("SELECT ".$fields." FROM ".$table." WHERE ".$col.$comparator.$value);
            return $req->fetchAll();
        }else{
            $req = $this->database->query("SELECT " . $fields . " FROM " . $table);
            return $req->fetchAll();
        }
    }
    function Insert($table, $fields, $values){
        $req = $this->database->prepare("INSERT INTO ".$table."(".$fields.") VALUES(".$values.")");
        $req->execute();
        var_dump($req->errorInfo());
        return true;
    }
}