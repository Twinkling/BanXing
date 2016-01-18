<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/11
 * Time: 22:10
 */
class strategyController{
    public function detail(){
        $sid = $_GET['sid'];
        $sid = intval($sid);
        $sname = daddslashes($_GET['sname']);
        $strategyobj = M('strategy');
        $strategy = $strategyobj->getAll($sid);
        if(empty($strategy)){
            unset($strategy);
        }
        VIEW::assign(array("title"=>$sname."旅游攻略","strategy"=>$strategy,"sid"=>$sid,'sname'=>$sname));
        VIEW::display("stradetail.html");
    }
    public function add(){
        $sid = intval($_GET['sid']);
        $sname = daddslashes($_GET['sname']);
        if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
            $this->showmessage('请登录后操作！',"index.php?controller=user&method=login");
        }
        if(!isset($_POST['submit'])){
            VIEW::assign(array('title'=>"添加".$sname."旅游攻略",'sid'=>$sid));
            VIEW::display("addstrategy.html");
        }else{
            $strategy = daddslashes($_POST['strategy']);
            $impression = daddslashes($_POST['impression']);
            if(empty($strategy)){
                $this->showmessage("请填写您的旅游攻略！",
                    'index.php?controller=strategy&method=add&sid='.$sid.'&sname='.$sname);
            }
            $username = $_SESSION['username'];
            $data = array(
                'sid'=>$sid,
                'username'=>$username,
                'strategy'=>$strategy,
                'dateline'=>time()
            );
            if((!empty($impression))&&isset($impression))
                $data['impression'] = $impression;
            $strategyobj = M('strategy');
            $strategyobj->addStrategy($data);
            $this->showmessage('添加攻略成功！',
                'index.php?controller=strategy&method=detail&sid='.$sid."&sname=".$sname);
        }

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