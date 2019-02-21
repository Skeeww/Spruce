<?php
/**
 * Interface for read config files in folder /config/...
 */
class ReadConfig{
    function __construct($filename){
        $this->raw_file = file_get_contents("./config/".$filename.".json");
    }
    function Read(){
        return json_decode($this->raw_file, true);
    }
}