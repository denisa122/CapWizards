<?php

// Holds the registered routes
$routes = [];

// Register a new route
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

// Dispatch the router
function dispatch($action)
{
    global $routes;

    $action = trim(parse_url($action, PHP_URL_PATH), '/'); // Extract the path part of the URL

    if (array_key_exists($action, $routes)) {
        $callback = $routes[$action];
        echo call_user_func($callback);
    } else {
        // Handle 404 or not found case
        echo "Page not found";
    }
}
