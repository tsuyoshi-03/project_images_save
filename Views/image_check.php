<?php 
require_once("../Models/image_model.php");
$files = get_file_path();
ini_set( 'display_errors', 1 );
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../Public/css/user_form.css">
  <title>画像表示機能</title>
</head>
<body>
  <?php foreach($files as $file): ?>
    <div><img src="<?php echo $file['file_1_path'] ?>"></div>
    <div><img src="<?php echo $file['file_2_path'] ?>"></div>
  <?php endforeach; ?>
  <div>

  </div>
</body>
</html>