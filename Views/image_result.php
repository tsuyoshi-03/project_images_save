<?php 
require_once("../Models/image_model.php");
if(!isset($_GET['search_id'])){
  $search_id = 0;
}else{
  $search_id = $_GET['search_id'];
}
$files = get_filepath_from_search_id($search_id);
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
    <div class="image_display" style="text-align: center; margin: 20px;">
      <div><p>画像確認</p></div>
      <div class="search_space" style="margin: 30px 0px;">
				<form action="../Controllers/image_search_controller.php" method="post">
					<input type="number" name="search_id" placeholder="idを入力">
					<input type="submit" name="submit" value="検索">
				</form>
			</div>
      <?php if(!empty($files)): ?>
        <?php foreach($files as $file): ?>
          <div class="image_1">
            <p>画像１</p>
            <div><img src="<?php echo $file['file_1_path']; ?>"></div>
          </div>
          <div class="image_2">
            <p>画像2</p>
            <div><img src="<?php echo $file['file_2_path']; ?>"></div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>結果がありません。</p>
			<?php endif ?>
      <p><a href="http://localhost/">トップページへ</a></p>
    </div>
</body>
</html>