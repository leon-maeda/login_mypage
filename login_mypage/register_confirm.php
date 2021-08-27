<?php
    mb_internal_encoding("utf8");

    $temp_pic_name = $_FILES['picture']['tmp_name'];

    $original_pic_name = $_FILES['picture']['name'];
    $path_filename = './image/'.$original_pic_name;

    move_uploaded_file($temp_pic_name, './image/'.$original_pic_name);

?>


<!doctype HTML>
<html lang = "ja">

<head>

    <meta charset = "utf-8">
    <title>登録情報の確認</title>
    <link rel = "stylesheet" type = "text/css" href = "register_confirm.css">

</head>

<body>

    <header>
        <p>
            <img src = "4eachblog_logo.jpg">
        </p>
    </header>

    <div class = "main_contain">

        <h1>会員登録情報の確認</h1>

        <h2>以下の内容で間違いないかご確認ください</h2>

        <div class = "confirm">

            <div>氏名 : 
                <?php echo $_POST['name']; ?>
            </div>

            <div>メールアドレス : 
                <?php echo $_POST['mail']; ?>
            </div>

            <div>パスワード : 
                <?php echo $_POST['password']; ?>
            </div>

            <div>プロフィール写真 : 
            <?php echo $original_pic_name; ?>
            </div>

            <div>コメント : 
                <?php echo $_POST['comment']; ?>
            </div>

        </div>

        <div class = "buttons">

            <form ethod = "POST" action = "register.php">
                <input type = "submit" class = "submit gray" value = "戻って修正"/>
            </form>
                
            <form method = "POST" action = "register_insert.php">
                <input type = "submit" class = "submit green" value = "送信"/>
                <input type = "hidden" value = "<?php echo $_POST['name']; ?>" name = "name">
                <input type = "hidden" value = "<?php echo $_POST['mail']; ?>" name = "mail">
                <input type = "hidden" value = "<?php echo $_POST['password']; ?>" name = "password">
                <input type = "hidden" value = "<?php echo $original_pic_name; ?>" name = "picture">
                <input type = "hidden" value = "<?php echo $_POST['comment']; ?>" name = "comment">

            </form>

        </div>

    </div>

</body>

</html>