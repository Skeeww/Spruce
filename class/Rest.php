<?php
class Rest{
    static function JsonToArray($url){
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
}
?>