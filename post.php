<?php
include 'connect.php';
;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>post</title>
    </head>
    <body>

        <?php
        if (isset($POST['submit'])) {

            $title = $_POST['title'];

            $q1 = "insert into student (firstneme) values ('$title')";
            $q2 = "insert into borrowing (title) values ('$title')";
        }
        ?>

        <form style="text-align: center;">
            <textarea> name="title"></textarea>
            <input type="submit" name="submit" value="Post">



            </body>
            </html>