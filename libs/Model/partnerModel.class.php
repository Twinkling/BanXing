<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/18
 * Time: 9:06
 */
class partnerModel{
    private $_table = 'partner';

    function getAll($sid){
        $sql = 'select * from '.$this->_table." where sid=".$sid.' order by dateline desc';
        $temp = DB::findAll($sql);
        if(is_array($temp)){
            foreach($temp as $key=>$val){
                $username = unserialize($val['username']);
                if(is_array($username))
                    $val['username'] = implode(",",$username);
                $val['dateline'] = date("Y-m-d  T",$val['dateline']);
                $temp[$key] = $val;
            }
        }elseif(!empty($temp)){
            $temp['username'] = unserialize($temp['username']);
            $temp['dateline'] = date("Y-m-d  T",$temp['dateline']);
        }
        return $temp;
    }

    function getOne($id){
        $sql = 'select * from '.$this->_table.' where id='.$id;
        return DB::findOne($sql);
    }
    function update($data,$where){
        $data['username'] = serialize($data['username']);
        return DB::update($this->_table,$data,$where);
    }
    function addTeam($data){
        $data['username'] = serialize($data['username']);
        return DB::insert($this->_table,$data);
    }
}