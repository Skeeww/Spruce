<?php
class DeviceInfo{
    static function GetUserAgent(){
        return explode("/", $_SERVER["HTTP_USER_AGENT"])[1];
    }
    static function GetBrowser(){
        return explode("/", $_SERVER["HTTP_USER_AGENT"])[2];
    }
    static function GetOs(){
        return str_replace("(", "",explode(" ", $_SERVER["HTTP_USER_AGENT"])[1])." ".str_replace(";", "", explode(" ", $_SERVER["HTTP_USER_AGENT"])[3]);
    }
}