<?php
require_once("../Models/image_model.php");

//画像１関連情報の取得
$file_1 = $_FILES['image_1'];
$file_1_name = basename($file_1['name']);
$file_1_tmpPath = $file_1['tmp_name'];
$file_1_err = $file_1['error'];
$file_1_size = $file_1['size'];
//画像2関連情報の取得
$file_2 = $_FILES['image_2'];
$file_2_name = basename($file_2['name']);
$file_2_tmpPath = $file_2['tmp_name'];
$file_2_err = $file_2['error'];
$file_2_size = $file_2['size'];

//画像の保存先ディレクトリ
//$image_1_upload_dir = '/Applications/MAMP/htdocs/project_images_save/Images/images_1/';
$image_1_upload_dir = '../Images/images_1/';
//$image_2_upload_dir = '/Applications/MAMP/htdocs/project_images_save/Images/images_2/';
$image_2_upload_dir = '../Images/images_2/';

//画像の拡張子を取得
$file_1_ext = pathinfo($file_1_name, PATHINFO_EXTENSION);
$file_2_ext = pathinfo($file_2_name, PATHINFO_EXTENSION);

//ファイルサイズ制限を超えていなければtrue
function fileSizeCheck($file_size, $file_err){
  //なんとなく1MBバイトに制限
  $limit_file_size = 1048576;
  return $file_size < $limit_file_size && $file_err  === 0;
}

//拡張子が画像形式だったらtrue
function fileExtCheck($file_ext){
  //拡張子は画像形式か確認する配列
  $allow_ext = array('jpg','jpeg','png');
  return in_array(strtolower($file_ext), $allow_ext);
}

//任意のディレクトリに名前をつけて(ファイル名に保存した時刻を付けて)データを保存
function uploadFile($file_tmp_path, $image_upload_dir, $file_name){
  //保存用ファイル名には日付をつける
  $save_file_name = date('YmdHis') . $file_name;
  $save_file_path = $image_upload_dir . $save_file_name;
  //一時ファイルパスから任意のパスへ
  move_uploaded_file($file_tmp_path, $save_file_path);
  return $save_file_path;
}

//画像がアップロードされていたら
if(is_uploaded_file($file_1_tmpPath) && is_uploaded_file($file_2_tmpPath)){
  //拡張子がimageだったら
  if(fileExtCheck($file_1_ext) && fileExtCheck($file_2_ext)){
    //ファイルサイズが制限以下だったら
    if(fileSizeCheck($file_1_size, $file_1_err) && fileSizeCheck($file_2_size, $file_2_err)){
      //各ディレクトリに保存
      $save_file_path_1 = uploadFile($file_1_tmpPath, $image_1_upload_dir, $file_1_name);
      $save_file_path_2 = uploadFile($file_2_tmpPath, $image_2_upload_dir, $file_2_name);
      //DBに保存
      imageSave($file_1_name, $save_file_path_1, $file_2_name, $save_file_path_2);
      echo '<p>ファイルがアップロードされました。</p>';
      echo '<p><a href="http://localhost/Views/user_form.html">戻る</a></p>';
      echo '<p><a href="http://localhost/">トップページへ</a></p>';
      exit();
    }else{
      echo '<p>ファイルサイズは1MB以下にしてください</p>';
      echo '<p><a href="http://localhost/Views/user_form.html">戻る</a></p>';
      exit();
    }
  }else{
    echo '<p>画像ファイルを添付してください</p>';
    echo '<p><a href="http://localhost/Views/user_form.html">戻る</a></p>';
    exit();
  }
}else{
  echo '<p>選択されていないファイルがあります。</p>';
  echo '<p><a href="http://localhost/Views/user_form.html">戻る</a></p>';
  exit();
}
