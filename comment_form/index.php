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

        ?>
    </div>

    <button>
        Show More Comments
    </button>

</body>

</html>