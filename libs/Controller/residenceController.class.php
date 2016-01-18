<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/18
 * Time: 16:23
 */
class residenceController{
    public function detail(){
        $sid = intval(daddslashes($_GET['sid']));
        $sname = daddslashes($_GET['sname']);
        $resobj = M('residence');
        $res = $resobj->getAll($sid);
        if(empty($res))
            unset($res);
        VIEW::assign(array('title'=>$sname."民宿详情",'sid'=>$sid,'sname'=>$sname,'residence'=>$res));
        VIEW::display('resdetail.html');
    }

    public function add(){
        if((!isset($_SESSION['username']))||empty($_SESSION['username'])){
            $this->showmessage('请登录后操作！',"index.php?controller=user&method=login");
        }
        $sid = intval(daddslashes($_GET['sid']));
        $sname = daddslashes($_GET['sname']);
        if($_SESSION['admin'] == 0){
            $this->showmessage('权限不足！',"index.php?controller=residence&method=detail&sid=".$sid."&sname=".$sname);
        }
        if(empty($_POST['submit'])||!isset($_POST['submit'])){
            $scene = array('id'=>$sid,'name'=>$sname);
            VIEW::assign(array('title'=>"增加".$sname."民宿",'scene'=>$scene));
            VIEW::display('addres.html');
        }else{
            $contact = daddslashes($_POST['contact']);
            $name = daddslashes($_POST['name']);
            if(!isset($name)||empty($name)){
                $this->showmessage("请输入民宿名称",
                    'index.php?controller=residence&method=add&sid='.$_POST['sid'].'&sname='.$_POST['sname']);
            }
            $sid = intval(daddslashes($_POST['sid']));
            $star = daddslashes($_POST['star']);
            $star = $this->checkstar($star);
            if($email = filter_var($contact,FILTER_VALIDATE_EMAIL)){
                $contact = $email;
            }elseif(preg_match("/1[3458]{1}\d{9}$/",$contact)){
                $contact = $contact;
            }else{
                $this->showmessage("联系方式不正确，只能输入邮箱和手机号！",
                    'index.php?controller=residence&method=add&sid='.$_POST['sid'].'&sname='.$_POST['sname']);
            }
            $data = array(
                'sid'=>$sid,
                'name'=>$name,
                'star'=>$star,
                'contact'=>$contact
            );
            $resobj = M('residence');
            $resobj->add($data);
            $this->showmessage("新增民宿成功！",'index.php?controller=residence&method=detail&sid='.$_POST['sid'].'&sname='.$_POST['sname']);
        }
    }

    private function checkstar($star){
        switch($star){
            case "one":
                $star = 1;
                break;
            case "two":
                $star = 2;
                break;
            case "three":
                $star = 3;
                break;
            case "four":
                $star = 4;
                break;
            case "five":
                $star = 5;
                break;
            default:
                $star = 1;
                break;
        }
        return $star;
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