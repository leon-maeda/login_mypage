
<?php
    session_start();

    if(!isset($_POST['from_mypage'])){
        header("Location:http://localhost/login_mypage/login_error.php");
    }
?>

<!doctype HTML>
<html lang = "ja">

    <head>

        <meta charset = "utf-8">
        <title>マイページ</title>
        <link rel = "stylesheet" type = "text/css" href = "mypage_hensyu.css">

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

            <form class = "edit" method = "POST" action = "mypage_update.php">

                <div class = "prof">

                    <img src = "./image/<?php echo $_SESSION['picture'];?>" style = "width:200px">

                    <div class = "prof2">
                        <p>氏名      : <input type = "text" size = "35" name = "name" required value = "<?php echo $_SESSION['name'];?>"></p>
                        <p>メール    : <input type = "text" size = "35" name = "mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value = "<?php echo $_SESSION['mail'];?>"></p>
                        <p>パスワード : <input type = "text" size = "35" name = "password" pattern = "^[a-zA-Z0-9]{6,}$" required value = "<?php echo $_SESSION['password'];?>"></p>
                    </div>

                </div>

                <h3></h3>

                <div class = "my_comment">
                    <textarea cols = "50" rows = "7" name = "comment"><?php echo $_SESSION['comment'];?></textarea>
                    <br>
                    <input type = "submit" class = "submit" value = "更新">

                </div>

            </form>


        </div>


    </body>

</html>