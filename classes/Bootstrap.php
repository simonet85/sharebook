<?php
class Bootstrap{
    private $action;
    private $controller;
    private $request;

    public function __construct( $request){
        //http://shareboard.local/controller
        $this->request =  $request;
        if ($this->request['controller'] === "") {
            $this->controller = 'home';
        }else{

            $this->controller = $this->request['controller'];
        }
        //http://shareboard.local/controller/action
        
        if ($this->request['action'] === '') {
            $this->action = 'index';
        }else{

            $this->action = $this->request['action'];
        }
        // echo $this->action;
    }
    
    public function createController(){
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
                if(in_array("Controller", $parents)){
                    if(method_exists($this->controller, $this->action)){
                        return new $this->controller($this->action, $this->request);
                    }else{
                        echo "<h1>Method doesn't exists</h1>";
                        return;
                    }
                }else{
                    echo "<h1>Base Controller doesn't exists</h1>";
                    return;
                }
        }else{
            echo "<h1>Class Controller doesn't exists</h1>";
            return;
        }
    }
}