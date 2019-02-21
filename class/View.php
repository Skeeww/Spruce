<?php
/**
 * Manage .sp files contain in the view folder
 */
class View{
    static function Show($view_name, $args = null){
        $GLOBALS[$view_name] = $args;
        include "./view/".$view_name.".sp";
    }
}