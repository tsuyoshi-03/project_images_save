<?php
if(empty($_POST['search_id'])){
  header("Location: http://localhost/Views/image_result.php");
  exit();
}else{
  header("Location: http://localhost/Views/image_result.php?search_id=".$_POST['search_id']);
  exit();
}
