<?php

/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Register a new route
 *
 * @param $action string
 * @param \Closure $callback Called when current URL matches provided action
 */
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    //$action = preg_replace('/{[^]+}/' , '(.+)' , $action);
    $routes[$action] = $callback;
}

/**
 * Dispatch the router
 *
 * @param $action string
 */
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
//     if ($callback) {
//         echo call_user_func($callback);
//     } else {
//         // Handle 404 or not found case
//         echo "Page not found";
//     }
// }

// dispatch($_SERVER['REQUEST_URI']);