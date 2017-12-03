<?php
/**
 * GivIP Microservice
 * 
 * @author Janyk Steenbeek <info@janyksteenbeek.nl>
 */

require_once 'base.php';

$baseUri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . rtrim($_SERVER['HTTP_HOST'], '/');
$items = [
    'ip' => Flight::request()->ip,
    'useragent' => Flight::request()->user_agent,
    'content_length' => Flight::request()->length,
    'content_type' => Flight::request()->type,
    'referer' => Flight::request()->referrer,
    'request_method' => $_SERVER['REQUEST_METHOD'],
];

// Show info page
Flight::route('GET|POST /', function() use($baseUri, $items){
    $data = [
        'ip' => Flight::request()->ip,
        'meta' => [
            'name' => 'GivIP',
            'description' => 'Microservice for raw, JSON, JSONP & XML endpoints for request information.',
            'author' => 'Janyk Steenbeek',
            'author_uri' => 'https://www.janyksteenbeek.nl/'
        ],
        'endpoints' => [
            'base' => $baseUri,
        ],
    ];

    foreach(array_keys($items) as $routeItem) {
        $data['endpoints'][$routeItem] = renderLinksSection($routeItem);
    }
    
    Flight::json($data);
});



// Boot route items
foreach($items as $key => $value) {
    renderRoutes($key, $value);
}



// Boot 404
Flight::map('notFound', function(){
    Flight::redirect('/');
});

// Boot application
Flight::start();
