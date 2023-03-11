<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

try {

    // Init basic route
    $home_route = new Route('/', array('controller' => 'HomeController'));


    // Add Route object(s) to RouteCollection object
    $routes = new RouteCollection();
    $routes->add('home_route', $home_route);

    // Init RequestContext object 
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());

    // Init UrlMatcher object 
    $matcher = new UrlMatcher($routes, $context);

    // Find the current route 
    $parameters = $matcher->match($context->getPathInfo());

    // How to generate a SEO URL 
    $generator = new UrlGenerator($routes, $context);
 
    echo '<h1>Hello Yann!</h1>';
    exit;

} catch(ResourceNotFoundException $e) {
    echo $e->getMessage();
}