<?php

    mb_internal_encoding("utf8");
    session_start();

    require "DB.php";

    $db = new DB();


    if(isset($_SESSION['id'])){
        if(empty($_SESSION['id'])){
            header("Location:http://localhost/login_mypage/login_error.php");
        }
    }else{

        try{
            $pdo = $db->connect();
        }catch(PDOException $e){
            die("<p>申し訳ございませんが現在アクセスできません。</p><br>
            <a href = \"http://localhost/login_mypage/login.php\">ログイン画面へ</a>");
        }

        $stmt = $pdo->prepare($db->login());

        $stmt->bindValue(1, $_POST['mail']);
        $stmt->bindValue(2, $_POST['password']);

        $stmt->execute();

        $pdo = NULL;

        $row = $stmt->fetch();

        if($row == NULL){
            header("Location:http://localhost/login_mypage/login_error.php");
        }

        session_start();

        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['comment'] = $row['comments'];

        if($_POST['login_keep'] == "login_keep"){
            setcookie(keep, 'true', time()+60*60*24*7);
            setcookie(mail, $_SESSION['mail'], time()+60*60*24*7);
            setcookie(password, $_SESSION['password'], time()+60*60*24*7);
        }else{
            setcookie(keep, '', time()-1);
            setcookie(mail, '', time()-1);
            setcookie(password, '', time()-1);
        }
    }

?>

<!doctype HTML>
<html lang = "ja">

    <head>

        <meta charset = "utf-8">
        <title>マイページ</title>
        <link rel = "stylesheet" type = "text/css" href = "mypage.css">

    </head>

    <body>

        <header>
            <p>
                <img src = "4eachblog_logo.jpg">
            </p>
            <p style = "text-align: right; margin-right:50px;">
                <a href = "./log_out.php">ログアウト</a>
            </p>
        </header>

        <div class = "main_contain">


            <h1>アカウント情報</h1>

            <h2>ようこそ <?php echo $_SESSION['name'];?> さん </h2> 

            <div class = "prof">

                <img src = "./image/<?php echo $_SESSION['picture'];?>" style = "width:200px">

                <div class = "prof2">
                    <p>氏名 : <?php echo $_SESSION['name'];?></p>
                    <p>メール : <?php echo $_SESSION['mail'];?></p>
                    <p>パスワード : <?php echo $_SESSION['password'];?></p>
                </div>

            </div>

            <h3></h3>

            <div class = "my_comment">
                <?php echo $_SESSION['comment'];?>
            </div>

            <form method = "POST" action = "mypage_hensyu.php">
                <input type = "hidden" value = <?php echo rand(1,10);?> name = "from_mypage">
                <input type = "submit" class = "submit" value = "編集">

            </form>


        </div>


    </body>

</html>