<?php
    session_start();
    if( !isset($_SESSION['id']) ){
        echo "<script>
                alert('관리자 로그인 후 이용하세요.');
                location.href='login.php';
            </script>";
    }else{
        if($_SESSION['id'] != 'admin'){
            echo "<script>
                    alert('관리자님 어서오세요.');
                </script>";
        }
    }

?>

