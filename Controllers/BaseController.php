<?php
class BaseController
{
    const VIEW_FOLDER_NAME = "Views";
    const MODEL_FOLDER_NAME = "Models";
    protected function view($viewPath, array $data= []){
        foreach($data as $key => $value){
            $$key = $value;
        }
         $viewPath = self::VIEW_FOLDER_NAME .'/' . str_replace(".","/",$viewPath).'.php';
        require ($viewPath);
    }
    
    protected function loadModel($modelPath){
         require (self::MODEL_FOLDER_NAME .'/'. $modelPath.'.php');
    }
    protected function back(){
        return require("../request.php");
    }

}
?>