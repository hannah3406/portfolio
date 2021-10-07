<?php
    include_once "db.php";
    $query = "CREATE TABLE admin1(
            num INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(100),
            thum VARCHAR(100),
            contents TEXT,
            date DATE,
            PRIMARY KEY(num)
        )";
    mysqli_query($connect, $query);


    // insert, update, delete처리하는 문서
    if( isset($_POST['mode']) ){
        $mode = $_POST['mode'];
    }else{
        $mode = $_GET['mode'];
    }

    if($mode == 'insert'){
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $thum = $_FILES['thum'];
        $date = date('Y-m-d');

        @mkdir('./files',0777,false);
        $fileName = $thum['name'];
        $tmpName = $thum['tmp_name'];
        move_uploaded_file($tmpName, './files/'.$fileName);

        $query = "INSERT INTO admin1(
                title, thum, contents, date
            ) values (
                '$title','$fileName','$contents','$date'
            )";
        
        mysqli_query($connect, $query);
    }

    if($mode == 'delete'){
        $num = $_GET['num'];
        $query = "delete from admin1 where num='$num'";
        mysqli_query($connect, $query);
    }

    if($mode == 'update'){
        $num = $_POST['num'];
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $thum = $_FILES['thum'];
        $date = date('Y-m-d');

        $fileName = $thum['name'];
        $tmpName = $thum['tmp_name'];

        if( !empty($fileName) ){
            echo "파일이 있습니다.";

            $query = "SELECT * FROM admin1 WHERE num='$num'";
            $result = mysqli_query($connect,$query);
            $row = mysqli_fetch_array($result); 

            @unlink( './files/'.$row['thum']  ); /* 파일삭제 */
            move_uploaded_file($tmpName, './files/'.$fileName);

            $query = "update admin1 set
                    thum='$fileName' where num='$num'"; 
            mysqli_query($connect, $query);
        }

        $query = "update admin1 set
            title='$title', contents='$contents',date='$date' 
            where num='$num'"; 
        mysqli_query($connect, $query);
    }
?>

<script>
    location.href="list.php";
</script>