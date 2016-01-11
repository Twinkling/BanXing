<?php
/**
 * Created by PhpStorm.
 * User: TwinklingZ
 * Date: 2016/1/9
 * Time: 17:16
 */
class qaModel{
    private $_questionTable = 'question';
    private $_answerTable = 'answer';

    /**
     * @param $qid
     * @return mixed
     * 根据问题编号获得问题详细
     */
    function getQuestion_by_id($qid){
        //$res = array();
        if(is_array($qid)){
            foreach($qid as $id){
                $sql = 'select * from '.$this->_questionTable.' where id='.$id;
                $temp = DB::findOne($sql);
                if(!empty($temp))
                    $res[] = $temp;
            }
        }else{
            $qid = intval($qid);
            $sql = 'select * from '.$this->_questionTable.' where id='.$qid;
            $temp = DB::findOne($sql);
            $temp['dateline'] = date("Y-m-d H:i:s  T",$temp['dateline']);
            if(!empty($temp))
                $res = $temp;
        }
        return $res;
    }

    /**
     * @param string $order
     * @param string $rank
     * @return mixed
     * 获取所有问题的编号
     */
    function getAllQuestionId($order='dateline',$rank='desc'){
        $sql = 'select id from '.$this->_questionTable.' order by '.$order.' '.$rank;
        return DB::findAll($sql);
    }

    /**
     * @param $qid
     * @return array
     * 根据问题编号查找所有问题答案
     */
    function getAnswer_by_qid($qid){
        $res = array();
        if(is_array($qid)) {
            foreach ($qid as $id) {
                $sql = 'select * from '.$this->_answerTable .' where qid='. $id.' order by dateline desc';
                $temp = DB::findAll($sql);
                if(!empty($temp))
                    $res[] = $temp;
            }
        }else{
            $sql = 'select * from '.$this->_answerTable.' where qid='.$qid.' order by dateline desc';
            $temp = DB::findAll($sql);
            if(is_array($temp))
                foreach($temp as $key=>$val){
                    $val['dateline'] = date("Y-m-d H:i:s  T",$val['dateline']);
                    $temp[$key] = $val;
                }
            if(!empty($temp))
                $res = $temp;
        }
        return $res;
    }

    /**
     * 获取所有问题和答案
     */
    function getAllQAndA(){
        $qid = $this->getAllQuestionId();
        $qaobj = M('qa');
        $data = array();
        if(is_array($qid)){
            foreach($qid as $id){
                $que = $qaobj->getQuestion_by_id($id['id']);
                $ans = $qaobj->getAnswer_by_qid($id['id']);
                $qtemp = array(
                    'question'=>$que,
                    'answer'=>$ans
                );
                $data[] = $qtemp;
            }
        }else{
            $que = $qaobj->getQuestion_by_id($id);
            $ans = $qaobj->getAnswer_by_qid($id);
            $qtemp = array(
                'question'=>$que,
                'answer'=>$ans
            );
            $data[] = $qtemp;
        }
        return $data;
    }

    /**
     * @param $data
     * @return mixed
     * 新增问题
     */
    function addQuestion($data){
        return DB::insert($this->_questionTable,$data);
    }

    /**
     * @param $data
     * @return mixed
     * 新增回答
     */
    function addAnswer($data){
        return DB::insert($this->_answerTable,$data);
    }
}