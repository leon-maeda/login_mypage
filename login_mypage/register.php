<!doctype HTML>
<html lang = "ja">

<head>

    <meta charset = "utf-8">
    <title>新規登録</title>
    <link rel = "stylesheet" type = "text/css" href = "register.css">

</head>

<body>

    <header>
        <p>
            <img src = "4eachblog_logo.jpg">
        </p>
    </header>

    <div class = "main_contain">

        <form method = "POST" action = "register_confirm.php" enctype = "multipart/form-data">

            <h1>会員登録</h1>

            <div>
                <label><span class = "primary">必須</span> 氏名</label>
                <br>
                <input type = "text" size = "35" name = "name" required>
            </div>


            <div>
                <label><span class = "primary">必須</span> メールアドレス</label>
                <br>
                <input type = "text" size = "35" name = "mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            </div>

            <div>
                <label><span class = "primary">必須</span> パスワード</label>
                <br>
                <input type = "text" size = "35" name = "password" id = "password" pattern = "^[a-zA-Z0-9]{6,}$" required>
            </div>

            <div>
                <label><span class = "primary">必須</span> パスワード確認</label>
                <br>
                <input type = "text" size = "35" name = "confirm_password" id = "confirm" oninput = "ConfirmPassword(this)" required>
            </div>

            <div>
                <label>プロフィール画像</label>
                <br>
                <input type = "hidden" name = "max_file_size" value = "1000000" />
                <input type = "file" size = "40" name = "picture">
            </div>

            <div>
                <label>コメント</label>
                <br>
                <textarea cols = "50" rows = "7" name = "comment"></textarea>
            </div>

            <div class = "button">
                <input type = "submit" class = "submit" value = "送信">
            </div>

        </form>

            

    </div>

    <script>
        function ConfirmPassword(confirm){
            var input1 = password.value;
            var input2 = confirm.value;
            if(input1 != input2){
                confirm.setCustomValidity("パスワードが一致しません");
            }else{
                confirm.setCustomValidity('');
            }
        }
    </script>
</body>

</html>