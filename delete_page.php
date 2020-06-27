<?php

require("server_conn.php");

$id= $_GET['id'];
//sql to delete a record
$sql = "DELETE FROM user WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header('http://localhost:8012/native/fetch_page.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
header('Location: http://localhost:8012/native/fetch_page.php');
mysqli_close($conn);
?>