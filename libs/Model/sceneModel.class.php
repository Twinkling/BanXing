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