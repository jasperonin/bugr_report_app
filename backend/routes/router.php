<?php

Class Router {

    private static $routes = [];

    // adding a GET function to eliminate the usual href url
    public static function get($path, $controllerMethod) {
        self::addRoute('GET', $path, $controllerMethod);
    }

    public static function post($path, $controllerMethod) {
        self::addRoute('POST', $path, $controllerMethod);
    }

    // function add to route using a specific method (POST, GET, PUT)
    private static function addRoute($method, $path, $controllerMethod) {
        self::$routes[$method][$path] = $controllerMethod;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if(isset(self::$routes[$method][$path])) {
            $controllerMethod = self::$routes[$method][$path];
            // assign multiple variale using lists instead of the usual array and by adding @ as separator
            list($controller, $method) = explode('@', $controllerMethod);
            
            if(class_exists($controller) && method_exists($controller,$method)) {
                call_user_func([new $controller, $method]);
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    private function notFound(){
        http_response_code(404);
        echo "<h1> Page could not be found. </h1>";
    }
}
