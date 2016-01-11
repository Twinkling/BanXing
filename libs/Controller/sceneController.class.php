<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/10
 * Time: 13:55
 */
class sceneController{
    public function getSceneTop(){
        $scene = M('scene');
        $top = $scene->getInfo();
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        VIEW::assign(array("title"=>"景点排行","view"=>"scene","data"=>$data,"top"=>$top));
        VIEW::display("scene.html");
    }


}