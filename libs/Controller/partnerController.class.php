<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/18
 * Time: 9:06
 */
class partnerController{
    public function detail(){
        $sid = intval(daddslashes($_GET['sid']));
        $sname = daddslashes($_GET['sname']);
        $teamobj = M('partner');
        $team = $teamobj->getAll($sid);
        if(empty($team))
            unset($team);
        VIEW::assign(array('title'=>$sname."旅游队伍",'team'=>$team,'sid'=>$sid,'sname'=>$sname));
        VIEW::display('team.html');
    }
    public function add(){
        if(!isset($_SESSION['username'])){
            $this->showmessage('请登录后操作！','index.php?controller=user&method=login');
        }
        if(empty($_POST['submit'])||(!isset($_POST['submit']))){
            $sid = intval(daddslashes($_GET['sid']));
            $sname = daddslashes($_GET['sname']);
            $team['sid'] = $sid;
            $team['sname'] = $sname;
            VIEW::assign(array('title'=>"创建".$sname."旅游队伍",'team'=>$team));
            VIEW::display('addTeam.html');
        }else{
            $username = array();
            $sid = intval(daddslashes($_POST['sid']));
            $sname = daddslashes($_POST['sname']);
            $username[] = daddslashes($_SESSION['username']);
            $dateline = daddslashes($_POST['date']);
            $dateline = $this->getLeaveTime($dateline);
            $data = array(
                'sid'=>$sid,
                'username'=>$username,
                'dateline'=>$dateline
            );
            $teamobj = M('partner');
            $teamobj->addTeam($data);
            $this->showmessage("创建队伍成功！","index.php?controller=partner&method=detail&sid=".$sid."&sname=".$sname);
        }
    }
    public function join(){
        $id = intval(daddslashes($_GET['id']));
        $sname = daddslashes($_GET['username']);
        $teamobj = M('partner');
        $result = $teamobj->getOne($id);
        $username = unserialize($result['username']);
        if(!in_array($_SESSION['username'],$username)){
            $username[] = $_SESSION['username'];
        }
        $result['username'] = $username;
        $where = 'id='.$id;
        $teamobj->update($result,$where);
        $this->showmessage("加入成功！",'index.php?controller=partner&method=detail&sname='.$sname.'&sid='.$result['sid']);
    }

    private function getLeaveTime($dateline){
        $oneDay = 24*60*60;
        switch($dateline){
            case "one":
                $leaveTime = time() + $oneDay;
                break;
            case "three":
                $leaveTime = time() + 3*$oneDay;
                break;
            case "five":
                $leaveTime = time() + 5*$oneDay;
                break;
            default:
                $leaveTime = time() + $oneDay;
                break;
        }
        return $leaveTime;
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