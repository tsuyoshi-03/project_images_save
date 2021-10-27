<?php
require_once("../Models/dbconnect.php");
dbConnect();//DB接続

function imageSave($file_1_name, $file_1_path, $file_2_name, $file_2_path){
  $sql = "INSERT INTO images (file_1_name, file_1_path, file_2_name, file_2_path, created_at) VALUES (:file_1_name, :file_1_path, :file_2_name, :file_2_path, now() )";
  $stmt = $GLOBALS['pdo'] -> prepare($sql);
  $stmt->bindParam(':file_1_name', $file_1_name, PDO::PARAM_STR);
  $stmt->bindParam(':file_1_path', $file_1_path, PDO::PARAM_STR);
  $stmt->bindParam(':file_2_name', $file_2_name, PDO::PARAM_STR);
  $stmt->bindParam(':file_2_path', $file_2_path, PDO::PARAM_STR);
  $stmt->execute();
}

function get_file_path(){
  $sql = "SELECT file_1_path, file_2_path FROM images";
  $stmt = $GLOBALS['pdo'] -> query($sql);
  $stmt->execute();
  $files = $stmt -> fetchall();
  return $files;
}
