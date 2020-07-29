<?php
class Messages{
    public static function setMsg($text, $type){
        if($type= 'error'){
            $_SESSION['errorMsg'] = $text;
        }else{
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display(){
        if(isset($_SESSION['errorMsg'])){
            echo sprintf('<div class="alert alert-danger">%s</div>',$_SESSION['errorMsg']);
            unset($_SESSION['errorMsg']);
        }

        if(isset($_SESSION['successMsg'])){
            echo sprintf('<div class="alert alert-success">%s</div>',$_SESSION['successMsg']);
            unset($_SESSION['successMsg']);
        }
    }
}