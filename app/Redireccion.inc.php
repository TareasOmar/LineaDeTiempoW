<?php

class Redireccion{
    public static function redirigir($url){
        //unique resource locator(url)
        header('Location: '.$url,true,301);
        exit();
    }
}
