<?php
require_once 'vendor/autoload.php';

function renderRoutes($name, $return) {
    Flight::route('* /'.$name, function() use($name, $return){
        if(is_bool($return)) {
            echo $return ? 'true' : 'false';
            return;
        }

        echo $return;
    });
    
    Flight::route('* /'.$name.'/json', function() use($name, $return){
        if(Flight::request()->query->cors) {
            header("Access-Control-Allow-Origin: *");
        }
        
        Flight::json([$name => $return]);
    });
    
    Flight::route('* /'.$name.'/jsonp', function() use($name, $return){
        if(empty(Flight::request()->query->q)) {
            echo 'No "q" parameter set for JSONP callback';
            die();
        }
        Flight::jsonp([$name => $return], 'q');
    });
    
    Flight::route('* /'.$name.'/xml', function() use($name, $return){
        header("Content-type: text/xml");
        
        echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        echo '<'.$name.'>' . (is_bool($return) ? $return ? 'true' : 'false' : $return).'</'.$name.'>';
    });
    
}

function renderLinksSection($name) {
    return [
        'raw' => ($name = '/' . $name),
        'json' => $name . '/json',
        'jsonp' => $name . '/jsonp?q=callbackFunction',
        'xml' => $name . '/xml',
    ];
}
