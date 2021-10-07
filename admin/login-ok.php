<?php 
    $id= $_POST['id'];
    $pw= $_POST['pw'];

include_once 'db.php';
    $query = "SELECT * FROM adminlogin 
              WHERE id='$id' AND pw='$pw'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_num_rows($result);

    if($row){
        @session_start();
        $_SESSION['id'] = 'admin';
        echo "<script>location.href='list.php';</script>";
    }else{
        echo "
        <script>
        alert('관리자 정보가 잘못되었습니다..');
        history.back();
        </script>";
    }
?>