<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/18
 * Time: 16:23
 */
class residenceModel{
    private $_table = 'residence';

    function add($data){
        return DB::insert($this->_table,$data);
    }

    function getAll($sid){
        $sql = 'select * from '.$this->_table.' where sid='.$sid;
        return DB::findAll($sql);
    }
}