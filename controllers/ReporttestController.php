<?php

namespace app\controllers;

class ReporttestController extends \yii\web\Controller
{
    public function actionIndex()
    {    
        //step 1. logic processing
//    $a=10;
//    $b=20;
//    $c=$a*$b;
           //สร้างการเชื่อมต่อ
        $conn=\Yii::$app->db;
        //คำสั่ง sql
        $sql='select * from com_type';
        // สร้าง query
        $cmd=$conn->createCommand($sql);
        // run query
        $data=$cmd->queryAll();
    
        //step 2. เรียก viewพร้อมส่งข้อมูล => reporttest
        return $this->render('index',['data'=>$data]); //คำสั่งเรียก view โฟลเดอร์เหมือนชื่อ controller คือ reporttest View =>reporttest/index.php ส่งค่า c
 
        // return $this->render('index',['cv'=>$c]); //คำสั่งเรียก view โฟลเดอร์เหมือนชื่อ controller คือ reporttest View =>reporttest/index.php ส่งค่า c
        
    }

}
