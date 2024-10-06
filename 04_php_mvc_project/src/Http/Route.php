<?php

namespace PhpMvc\Http;

class Route
{
    public Request $request;
    protected Response $response;

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public static array $routes = [];


    static public function get($url, $action) {
        self::$routes['get'][$url] = $action;
    }

    public static function post($url, $action) {
        self::$routes['post'][$url] = $action;
    }

    public function resolve()
    {

        $path = $this->request->path();
        $method = $this->request->method();
        $action = self::$routes[$method][$path] ?? false;

        if (!$action) {
            return;
        }

        // 404 handling

        if (is_callable($action)) {
            call_user_func_array($action, []);
        }
        if (is_array($action)){
            $controller = new $action[0];
            $action = $action[1];
            call_user_func_array([$controller, $action], []);

        }
    }


}