<?php
require '../vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    
    $r->get('/', function() {
        echo '<h1>page d\' accueil</h1> <br/>';
        echo'<a href="/annonces">Visualiser les annonces =></a>';
    });

    $r->addRoute('GET', '/annonces', 'afficher_annonces');
    $r->addRoute('GET', '/annonces/{id}', 'afficher_une_annonce');
    $r->addRoute('GET', '/add/annonce', 'ajouter_une_annonce');
    $r->addRoute('GET', '/update/annonce/{id}', 'modifier_une_annonce');
    $r->addRoute('POST', '/validate/update/annonce', 'valider_modifier_une_annonce');
    $r->addRoute('POST', '/validate/add/annonce', 'valider_ajout_une_annonce');
    $r->addRoute('GET', '/delete/annonce/{id}', 'supprimer_annonce');
    /*
    $r->get('/books/{id}', function ($args) {
        // Show book identified by $args['id']
        echo "Book #" . $args['id'];
    });

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', function ($args) {
        echo "User #" . $args['id'];
    });
    // The /{title} suffix is optional2
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', function ($args) {
        echo "User #" . $args['id'];
        echo "<br>Title: " . $args['title'];
    });*/

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

function getUsers()
{
    echo "getUsers function action goes here...";
}

function testFunction()
{
    echo "testFunction action goes here...";
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die('NOT_FOUND');
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        die('Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        print $handler($vars);
        break;
}