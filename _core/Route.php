<?php

class Route{
    private static $status= false;

    public static function request($url,$controller,$method,array $option = []){
        // if(isset($url[1])){
        //     $params =  self::matchUrlAndExtractParams(URL,$url[0],$url[1]) ;
        // }
        if((isset($option['guard']))){
            $guard = $option['guard'];
            $bool = Guard::$guard();
        }
        $params = static::getUrlParams($url);
        if(isset($_POST) && is_array($params)) $params = array_merge($params,$_POST);
        
        if($params!==false && method_exists($controller,$method)) {
            if(isset($_POST) && is_array($_POST)) $params = array_merge($params,$_POST);
            self::$status = true ;
            //call_user_func([new $controller(...$models),$method],$params);
            call_user_func([new $controller(),$method],$params);
        }

    }
    public static function get($url,$controller,$method,array $option = []){
        if(URL_METHOD=="GET" && !self::$status){
            static::request($url,$controller,$method,$option);
        }
    }
    public static function post($url,$controller,$method,array $models = []){
        if(URL_METHOD=="POST" && !self::$status){
            static::request($url,$controller,$method,$models);
        }
    }
    public static function end(){
        if(!self::$status){
            self::$status = true ;
            $controller = 'Controller';
            call_user_func([new $controller(),'pageNotFound']);
        }
    }

    public static function redirect($path,$newPath){
        $params = static::getUrlParams($path);
        if($params!==false){
            header('Location: '.SERVER_ROUTE.$newPath);
            exit();
        }
    }
    // public static function matchUrlAndExtractParams($urlSpecifique, $motifDeRoute,$cle) {
    //     $pattern = str_replace('{'.$cle.'}', '(?P<'.$cle.'>[^/]+)', $motifDeRoute); 
        
    //     if (preg_match("#^{$pattern}$#", $urlSpecifique, $matches)) {
    //         $params = [];
    //         foreach ($matches as $key => $value) {
    //             if (!is_int($key)) { 
    //                 $params[strtolower(str_replace('(', '', $key))] = $value;
    //             }
    //         }
    //         return $params;
    //     } else {
    //         return false;
    //     }
    // }
    public static function getUrlParams($url){
        $params = [];

        $URL = explode('?',URL);
        $URL = explode('/',$URL[0]);
        $url = explode('/',$url);

        foreach($url as $k =>$u){
            if(!isset($URL[$k])){
                return false;
            }
            else if(isset($u[0]) && $u[0]=="{"){
                $p = str_replace('{','',$u);
                $p = str_replace('}','',$p);
                $params[$p]=$URL[$k];
            }
            else if($u!=$URL[$k]){
                return false;
            }
        }
        return $params;
    }
}
?>