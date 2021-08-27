<?php

    session_start();
    if(isset($_SESSION['id'])){
        header("Location:mypage.php");
    }
?>

<!doctype HTML>
<html lang = "ja">

<head>

    <meta charset = "utf-8">
    <title>新規登録</title>
    <link rel = "stylesheet" type = "text/css" href = "login.css">

</head>

<body>

    <header>
        <p>
            <img src = "4eachblog_logo.jpg">
        </p>
        <p style = "text-align: right; margin-right:50px;">
                <a href = "./register.php">新規登録</a>
        </p>
    </header>

    <div class = "main_contain">

        <form method = "POST" action = "mypage.php">

            <h1>アカウント情報を入力してログイン</h1>

            <p style = "text-align:center; font-size:15px; 
                        color:red; background-color:#ffaaaa;
                        margin-left:50px; margin-right:50px">メールアドレスまたはパスワードが間違っています。
            </p>

            <div class = "login">

                <div>
                    <label>メールアドレス</label>
                    <br>
                    <input type = "text" size = "35" name = "mail" 
                    pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required
                    value = "<?php echo $_COOKIE['mail']; ?>">

                    <br><br>
                    <label>パスワード</label>
                    <br>
                    <input type = "text" size = "35" name = "password" 
                    id = "password" pattern = "^[a-zA-Z0-9]{6,}$" 
                    value = "<?php echo $_COOKIE['password']; ?>">
                </div>

                <div class = "login_check">
                    <label>
                        <input type = "checkbox" class = "formbox" size = "40"
                                name = "login_keep" value = "login_keep"
                                <?php if(isset($_COOKIE['keep'])){
                                        echo "checked = 'checked'";
                                }?>
                        >ログイン状態を保持する
                    </label>
                </div>

                

            </div>

            <div class = "button">
                <input type = "submit" class = "submit" value = "ログイン">
            </div>

        </form>

            

    </div>
</body>

</html>