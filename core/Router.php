<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [
        'get' => [
            '/' => callback,
            '/contact' => callback,
        ],
        'post' => [
            '' => callback,
        ]
    ];

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
        {
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            if ($callback === false){
                echo "404 Not found";
                exit;
            }
        }
}