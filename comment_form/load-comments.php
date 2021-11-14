<?php
    include 'dbh.php';

    $commentNewCount = $_POST['commentNewCount'];

    $sql = "SELECT author, message FROM comments LIMIT $commentNewCount;";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc($result)) {
            echo "<p>";

            echo $row['author'];
            echo "<br>";
            echo $row['message'];

            echo "</p>";
            echo "<hr>";
        }
    } else {
        echo "There are no comments!";
    }
?>