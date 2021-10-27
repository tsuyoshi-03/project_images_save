<?php
    ini_set( 'display_errors', 1 );  // エラー出力
    //PDO接続する関数
    function dbConnect(){
        global $pdo, $e;
        //開発環境と本番環境分岐
        if($_SERVER['SERVER_NAME'] === "localhost") // サーバー名がlocalhostだったらこっち
        {
            $host="localhost"; // 開発環境のドメイン
            $dbname="upload_image"; // 開発環境のデータベース名
            $dns = "mysql:host=" . $host . "; dbname=".$dbname . ";charset=utf8";
            $user="root"; // 開発環境のデータベースのユーザー名
            $pass="19940316aA"; // 開発環境のデータベースに指定したパスワード
        }
        else // 本番環境などローカルの開発環境以外の設定をする
        {
            $host="***.***.***";
            $dbname="********";
            $dns = "mysql:host=" . $host . "; dbname=".$dbname . ";charset=utf8";
            $user="root";
            $pass="********";
        }

        try
        {
            $pdo = new PDO(
                $dns, 
                $user, 
                $pass, 
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }
        catch (PDOException $e)
        {
            //var_dump($e->getMessage());
            echo $e->getMessage();
            exit;
        }
    }
?>