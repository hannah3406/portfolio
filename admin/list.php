<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once $root.'/public/admin/check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <article>
        <h2>List of portfolio</h2>
        <ul>
            <?php
                $root = $_SERVER['DOCUMENT_ROOT'];
                // echo $root."/admin1/db.php";
                include_once $root."/public/admin/db.php";
                $query = "SELECT * FROM admin1 ORDER BY num DESC";
                $resultJson = mysqli_query($connect,$query);

                @mkdir('../data');
                $array = array();
                while( $row =mysqli_fetch_array($resultJson) ){
                    array_push($array,array(
                        'num'=>$row['num'],
                        'title'=>$row['title'],
                        'thum'=>$row['thum'],
                        'contents'=>$row['contents'],
                        'date'=>$row['date']
                    ));
                }
                $jsonData = json_encode($array);
                file_put_contents('../data/data.json',$jsonData);

                $result = mysqli_query($connect,$query);
                while( $row =mysqli_fetch_array($result) ){
            ?>
            <li data-num="<?=$row['num']?>">
                <figure>
                    <img src="./files/<?=$row['thum']?>" alt="">
                    <figcaption><?=$row['date']?></figcaption>
                </figure>                
                <p>
                    <?=$row['title']?><br><br>
                    <a href="write.php?mode=update&num=<?=$row['num']?>">수정</a>
                    <a href="res.php?mode=delete&num=<?=$row['num']?>">삭제</a>
                </p>
            </li>
            <?php } ?>
        </ul>
    </article>
    <div class="popup">
        <div>

        </div>
    </div>
    <a href="write.php" class="aa">글쓰기</a>
    <a href="logout.php">로그아웃</a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const li = document.querySelectorAll('li');
        const popup = document.querySelector('.popup');

        li.forEach(function(el){
            el.onclick=function(){
                let num = this.dataset.num;
                data(num);
                popup.style = "display:flex";

            }
        });

        popup.addEventListener('click',function(e){
                if(e.target.nodeName == 'DIV'){
                    popup.style = "display:none";
                };
        })

        function data(n){
            $.ajax({
                url:'data.php',
                data:{'num':n},
                success:function(d){
                    const content = popup.querySelector('div');
                    content.innerHTML = d;
                }
            });
        }
    </script>


    <style>
        *{font-family:noto Sans KR; }
        body{background-color:#fff;color:#2E4559;}
        h2{width:85%; margin:30px auto; text-align:center;}
        .popup{
            position:fixed; top:0; left:0;
            z-index: 9;
            width:100%; height:100%;
            background-color: rgba(0,0,0,0.6);
            display: flex; 
            align-items: center; 
            justify-content: center;
            display:none;
        }
        .popup > div{
            width:50%;
            margin:0 auto;
            background-color: #fff;
            padding:30px;
        }
        .popup > div > ul{
            display:flex;
            width:100%;
            flex-direction: column;
        }
        .popup > div > ul > li{
            width:100%;
        }

        article{
            width:65%; 
            margin:100px auto;}
        ul,li{
            list-style: none; margin:0;
            padding:0;
        }
        ul{
            display:flex; 
            justify-content: space-between;
            flex-wrap: wrap;

        }
        li{width:30%;}
        li figure{width:100%;height:170px; margin:0; padding:0;border:10px solid #f6f7f9;box-shadow: 10px 10px 10px rgba(0,0,0,0.2);}
        li figure > img{width:100%; height:80%;}
        li figure > figcaption{width:100%;}
        p{margin-top:30px;}
        a{
            text-decoration: none; 
            color:#2E4559;font-size:14px;
            font-weight: bold;
            background-color: #A9D0D9;
            padding:3px 10px;margin-top:5px;
            border-radius: 10px;
            margin-right:3px;
        }
    </style>



</body>
</html>