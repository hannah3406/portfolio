<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login-ok.php" method="post">
        <article>
            <h2>ADMIN LOGIN</h2>
            <div>
                <p>
                    <input type="text" name="id">
                    <input type="password" name="pw">
                </p>
                <input class="btn-submit"type="submit" value="login">
            </div>
        </article>
    </form>
    <style>
        *{font-family:noto Sans KR; }
        body{background-color:#fff;color:#2E4559;}

        form{
            width:40%;
            margin:100px auto;
            padding: 5%;
            border: 2px solid #2E4559;
            box-shadow: 10px 10px 10px rgba(0,0,0,0.4);
        }
        article{
            width: 100%;
            margin: 0 auto;
            padding: 5%;
        }
        article > h2{
            width: 80%;
            margin: 0 auto;
            font-size: 2rem;
            text-align: center;
        }
        div{
            width:100%;
        }
        div p{
            width: 80%;
            margin:20px auto;
        }
        div p > input{
            width:100%;
            margin:5px 0;
        }
        div .btn-submit{
            width:80%;
            margin:0 auto;
            display:block;
            color:#2E4559;font-size:14px;
            font-weight: bold;
            background-color: #A9D0D9;
            border: none;
        }
        *{box-sizing: border-box;}
    </style>
</body>
</html>