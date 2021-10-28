<?php 
require_once("../Models/image_model.php");
$files = get_file_path();
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
    <div class="image_display" style="text-align: center; margin: 20px;">
      <div class="search_space" style="margin: 30px 0px;">
				<form action="../Controllers/image_search_controller.php" method="post">
					<input type="number" name="search_id">
					<input type="submit" name="submit" value="検索">
				</form>
			</div>
      <div class="image_1">
        <p>画像１</p>
        <div><img src="<?php echo $file['file_1_path']; ?>"></div>
      </div>
      <div class="image_2">
        <p>画像2</p>
        <div><img src="<?php echo $file['file_2_path']; ?>"></div>
      </div>
    </div>
  <?php endforeach; ?>
  <div>

  </div>
</body>
</html>