<?php
    // класс маршрутизатор
    class Router {

        private $routes;

        public function __construct ()
         {
            // список маршрутов
            $this->routes =  include ROOT . "/config/routes.php";

        }

        // возвращает запрашиваему строку
        private function getURI() 
        {
            if (!empty($_SERVER["REQUEST_URI"])) {
                $homeURI = $_SERVER["REQUEST_URI"] == "/" ?  "index " : trim($_SERVER["REQUEST_URI"], "/");
                return  $homeURI;
            }
        }

        /* метод исходя из запроса
            сравнивает запраштваемый файл 
            и подключает необходимый контроллер */
        public function run()
        {
            $uri = $this->getURI();

            foreach($this->routes as $uriPattern => $path) {

                if (preg_match("~$uriPattern~", $uri)) {

                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                   $segment = explode("/",  $internalRoute);
                   
                   $controllerName = array_shift($segment);

                   $controllerName = ucfirst($controllerName) . "Controller";
                    
                   $actionName = trim("action" .ucfirst(array_shift($segment)));

                   $controllerFille = ROOT . "/controllers/". $controllerName . ".php";
                   $parametrsId = $segment;
                   
                   if (file_exists($controllerFille)) {
                    include_once($controllerFille);
                   }

                   $controllerObject = new $controllerName;
                   $result = call_user_func_array(array($controllerName, $actionName), $parametrsId);

                   if($result != null){
                    break;
                  }
                }
            } 
        }
    }

?>