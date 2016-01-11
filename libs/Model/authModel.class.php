<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/9
 * Time: 9:24
 */
class authModel{

    function checkauth($username, $password){
        $adminobj = M('user');
        $auth = $adminobj -> findOne_by_username($username);
        if((!empty($auth))&&$auth['pwd']==$password){
            return $auth;
        }else{
            return false;
        }
    }
    function checkauthname($username){
        $adminobj = M('user');
        $auth = $adminobj -> findOne_by_username($username);
        if((!empty($auth))){
            return $auth;
        }else{
            return false;
        }
    }

}