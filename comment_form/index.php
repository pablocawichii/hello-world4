<?php
    include 'dbh.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.2.0.min.js" integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(() => {
                var commentCount = 2;

                $("button").click(() => {
                    commentCount += 2;
                    $("#comments").load("load-comments.php", {
                        commentNewCount: commentCount
                    });
                })
            })
        </script>
    </head>    
<body>
    
    <div id="comments">
        <?php
            $sql = "SELECT author, message FROM comments LIMIT 2;";

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
    </div>

    <button>
        Show More Comments
    </button>

</body>

</html>