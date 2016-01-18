<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/10
 * Time: 14:01
 */
class sceneModel{
    private $_table = 'scene';

    public function getInfo($order='stop',$rank='asc'){
        $sql = 'select * from '.$this->_table.' order by '.$order.' '.$rank;
        return DB::findAll($sql);
    }

    public function addscene($data){
        return DB::insert($this->_table,$data);
    }

    public function getIDAndName($order='stop',$rank='asc'){
        $sql = 'select id,sname from '.$this->_table.' order by '.$order.' '.$rank;
        return DB::findAll($sql);
    }
}