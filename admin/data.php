<?
// data.php
    include_once "db.php";

    $num = $_GET['num'];

    $query = "SELECT * FROM admin1 WHERE num='$num'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
    
    echo $row['contents'];

?>