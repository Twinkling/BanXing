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

    public function add(){
        if(empty($_SESSION['username'])||!isset($_SESSION['username'])){
            $this->showmessage('请登录后操作！',"index.php?controller=user&method=login");
        }elseif($_SESSION['admin']==0){
            $this->showmessage('权限不足！',"index.php?controller=index&method=scene");
        }
        if(!isset($_POST['submit'])){
            VIEW::display("addscene.html");
        }else{
            $this->checkscene();
        }
    }

    private function checkscene(){
        //print_r($_POST);
        $sname = daddslashes($_POST['sname']);
        $saddress = daddslashes($_POST['saddress']);
        $stop = daddslashes($_POST['stop']);
        $spic = daddslashes($_POST['spic']);
        $description = daddslashes($_POST['description']);
        if(empty($sname)||empty($saddress)||empty($stop)||empty($spic)||empty($description)){
            $this->showmessage('请将信息填写完整！','index.php?controller=scene&method=add');
        }
        $data = array(
            'sname'=>$sname,
            'saddress'=>$saddress,
            'stop'=>$stop,
            'spic'=>$spic,
            'description'=>$description
        );
        $sceneobj = M('scene');
        $sceneobj->addscene($data);
        $this->showmessage('景点增加成功！','index.php?controller=index&method=scene');
    }

    /**
     * @param $info
     * @param $url
     * 显示特定信息，并跳转到指定页面
     */
    private function showmessage($info, $url){
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit;
    }

}