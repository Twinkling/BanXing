<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/9
 * Time: 9:13
 */
class userModel{
    private $_table = "user";

    function findOne_by_username($username){
        $sql = 'select * from '.$this->_table.' where username="'.$username.'"';
        return DB::findOne($sql);
    }

    function register($data){
        DB::insert($this->_table,$data);
    }
}