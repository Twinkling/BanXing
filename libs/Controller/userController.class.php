<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/9
 * Time: 9:24
 */
class userController{

    public function login(){
        if(!isset($_POST['submit'])){
            VIEW::display('login.html');
        }else{
            $this->checklogin();
        }
    }

    public function logout(){
        unset($_SESSION['username']);
        $this->showmessage('退出成功！', 'index.php');
    }

    public function register(){
        if(!isset($_POST['submit'])){
            VIEW::display('register.html');
        }else{
            $this->checkregister();
        }
    }
    private function checklogin(){
        if(empty($_POST['username'])||empty($_POST['password'])){
            $this->showmessage('登录失败！', 'index.php?controller=user&method=login');
        }
        $username = daddslashes($_POST['username']);
        $password = daddslashes($_POST['password']);
        $authobj = M('auth');
        if($auth = $authobj->checkauth($username, $password)){
            $_SESSION['username'] = $auth['username'];
            $this->showmessage('登录成功！', 'index.php');
        }else{
            $this->showmessage('登录失败！', 'index.php?controller=user&method=login');
        }
    }
    public function checkusername(){
        extract($_POST);
        $username = daddslashes($_POST['username']);
        $authobj = M('auth');
        if($auth = $authobj->checkauthname($username)){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        echo json_encode($data);
    }
    private function checkregister(){
        extract($_POST);
        if(empty($username)||empty($password)||empty($verify)){
            $this->showmessage('请把注册信息填写完整！', 'index.php?controller=user&method=register');
        }
        $username = daddslashes($_POST['username']);
        $authobj = M('auth');
        if($auth = $authobj->checkauthname($username)){
            $this->showmessage('用户已存在！', 'index.php?controller=user&method=register');
        }
        $pwd = daddslashes($_POST['password']);
        $verify = daddslashes($_POST['verify']);
        if($pwd != $verify){
            $this->showmessage('两次密码不一致！', 'index.php?controller=user&method=register');
        }
        $data = array(
            'username'=>$username,
            'pwd'=>$pwd,
            'registerTime'=>time()
        );
        $registerobj = M('user');
        $registerobj->register($data);
        $_SESSION['username'] = $username;
        $this->showmessage('注册成功', 'index.php');
    }
    private function showmessage($info, $url){
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit;
    }
}