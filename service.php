<?php

 header("Content-Type:text/plain;charset=utf-8");
 
 
 $staff = array
 (
     array("name" => "Sky","number" => "101" , "sex" => "男","job" => "程式設計"),
      array("name" => "Kelly","number" => "102" , "sex" => "女","job" => "前端設計"),
       array("name" => "Amber","number" => "103" , "sex" => "女","job" => "前端工程師")
 );
 
 if($_SERVER["REQUEST_METHOD"]=="GET"){
     search();
 }else if($_SERVER["REQUEST_METHOD"]=="POST"){
     create();
 }
  
 function search(){
     if(!isset($_GET["number"])||empty($_GET["number"])){
         echo "參數錯誤";
         return ;
     }
     global $staff;
     
     $number = $_GET["number"];
     $result = "沒找到員工";
     
     foreach($staff as $value){
         if($value["number"]==$number){
             $result = "找到員工=>員工編號:".$value["number"].
             " ,員工姓名:".$value["name"]." ,員工性別:".$value["sex"].
             " ,員工職位:".$value["job"];
             
             break;
         }
     }
     echo $result;
  }
 
 function create(){
     if(!isset($_POST["name"])||empty($_POST["name"])
     ||!isset($_POST["number"])||empty($_POST["number"])
     ||!isset($_POST["sex"])||empty($_POST["sex"])
     ||!isset($_POST["job"])||empty($_POST["job"])
     ){
         echo "參數錯誤,員工欄位填寫不完全";
         return;
     }
     echo "員工:".$_POST["name"]."員工資料保存成功";
 }
 
 
?>