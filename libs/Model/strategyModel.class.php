<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/11
 * Time: 22:13
 */
class strategyModel{
    private $_table = 'strategy';

    function listStrategy(){
        $sceneobj = M('scene');
        $data = $sceneobj->getIDAndName();
        return $data;
    }

    function getAll($sid){
        $sql = 'select * from '.$this->_table.' where sid='.$sid;
        return DB::findAll($sql);
    }

    function addStrategy($data){
        return DB::insert($this->_table,$data);
    }
}