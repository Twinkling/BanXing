<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/7
 * Time: 15:52
 */
class indexController{
    public function index(){
        $result = M("index");
        $introduction = $result->getIntroduction();
        $introduction = str_replace("\n", "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",str_replace("\r", "",$introduction));
        $introduction = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$introduction;
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        //print_r($data);
        VIEW::assign(array("title"=>"简介","introduction"=>$introduction,"view"=>"index","data"=>$data));
        VIEW::display("index.html");
    }
    public function tip(){
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        VIEW::assign(array("title"=>"旅行贴士","view"=>"tip","data"=>$data));
        VIEW::display("tip.html");
    }
    public function scene(){
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        $scene = M('scene');
        $top = $scene->getInfo();
        print_r($top);
        VIEW::assign(array("title"=>"景点排行","view"=>"scene","data"=>$data,"top"=>$top));
        VIEW::display("scene.html");
    }
    public function partner(){
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        VIEW::assign(array("title"=>"结伴旅行","view"=>"partner","data"=>$data));
        VIEW::display("partner.html");
    }
}