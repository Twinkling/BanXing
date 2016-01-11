<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/9
 * Time: 17:17
 */
class qaController{
    public function getAll(){
        $qaobj = M('qa');
        $data = $qaobj->getAllQAndA();
        VIEW::assign(array('data'=>$data));
        VIEW::display('index.html');
    }

    /**
     * 登录后，可提出个人问题
     */
    public function askq(){
        if(!isset($_SESSION['username'])){
            $this->showmessage('请登录后操作！','index.php?controller=user&method=login');
        }
        $question = daddslashes($_POST['question']);
        $question = trim($question);
        if($question == ''){
            $this->showmessage('请输入您的问题！','index.php');
        }
        $username = $_SESSION['username'];
        $data = array(
            'username'=>$username,
            'question'=>$question,
            'dateline'=>time()
        );
        $qaobj = M('qa');
        $qaobj->addQuestion($data);
        $this->showmessage('提问成功','index.php');
    }

    /**
     * 回复问题
     */
    public function ans(){
        if(!isset($_SESSION['username'])){
            $this->showmessage('请登录后操作！','index.php?controller=user&method=login');
        }
        $qid = $_GET['qid'];
        $qid = intval($qid);
        $qaobj = M('qa');
        $que = $qaobj->getQuestion_by_id($qid);
        $ans = $qaobj->getAnswer_by_qid($qid);
        $qtemp = array(
            'question'=>$que,
            'answer'=>$ans
        );
        if(!empty($que))
            $data = array($qtemp);
        VIEW::assign(array('data'=>$data));
        VIEW::display('ans.html');
    }

    /**
     * 回答问题
     */
    public function ansq(){
        $qid = intval($_GET['qid']);
        if(!isset($_SESSION['username'])){
            $this->showmessage('请登录后操作！','index.php?controller=user&method=login');
        }
        $answer = daddslashes($_POST['answer']);
        $answer = trim($answer);
        if(empty($answer)){
            $this->showmessage('请输入您的回答！','index.php?controller=qa&method=ans&qid='.$qid);
        }
        $data = array(
            'qid'=>$qid,
            'username'=>$_SESSION['username'],
            'answer'=>$answer,
            'dateline'=>time()
        );
        $qaobj = M('qa');
        $qaobj->addAnswer($data);
        $this->showmessage('回答成功','index.php?controller=qa&method=ans&qid='.$qid);
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