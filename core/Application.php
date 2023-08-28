<?php 
    //use general namespace
    namespace app\core;

    /**
     * @package app\core;
     */

    //class that include all logic application
    class Application {
        //var-Router
        public Router $router;
        //var-Request
        public Request $request;
        //var-Response
        public Response $response;
        //var-app
        public static Application $app;
        //var-controller
        public Controller $controller;

        public static string $ROOT_DIR;

        public function __construct($rootPath)
        {
            //static var root path
            self::$ROOT_DIR = $rootPath;
            //var app
            self::$app = $this;
            //include object request in var-request
            $this->request = new Request();
            //include object response in var-response
            $this->response = new Response();
            //include object router in var-router
            $this->router = new Router($this->request, $this->response);

        }

        //function run app
        public function run() {
            echo $this->router->resolve();
        }

        /**
         * @return \app\core\Controller
         */
        public function getController(): \app\core\Controller {
            return $this->controller;
        }
        /**
         * @return \app\core\Controller $controller
         */
        public function setController(\app\core\Controller $controller): void {
            $this->controller = $controller;
        }
    }
?>