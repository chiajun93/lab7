<!--viewPosts.php-->
<?php
  //get the file contents and convert it to a php object
  $posts_string = file_get_contents("../rec/posts.txt");
  $posts_obj = json_decode($posts_string,true);

  // Start the session
  session_start();
  // Set session variables
  $_SESSION["username"] = $_POST['userName'];

?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/functions.js"></script>
    <title><?php echo($_SESSION["username"]) ?></title>
  </head>
  <body>

    <?php
    //current user
    $curr_author = $_SESSION["username"];
    date_default_timezone_set("America/Chicago");
    $timeStamp = date("h:i:sa");
    //show the create new post button
    echo("<hr>\n");
    echo("<button type=\"button\" onclick=\"postFunc(-1, 'Enter post name', 'Enter post comment','$curr_author', '$timeStamp')\">Create Post</button>");
    echo("<button type = \"button\" onclick=\"window.location.href = 'logout.php'\">Logout</button><hr>\n");

    //build each thing from the database in backwards order
    foreach (array_reverse($posts_obj) as $post_id => $post) {
      //variables
      $postId = $post['postID'];
      $postName = $post['postName'];
      $comment = $post['postComment'];
      $author = $post['postAuthor'];  //original post author
      $timeStamp = $post['timeStamp'];

      //echo the correct html
      echo("<p id=\"post_$postId\">\n");
      echo ("$postId<br>\n");
      echo ("$postName<br>\n");
      echo ("    Comment: $comment<br>\n");
      echo ("    Author: $author<br><br>\n");
          echo ("Posted on: $timeStamp<br>\n");
      echo("<button type=\"button\" onclick=\"postFunc($postId, '$postName', '$comment','$curr_author', '$timeStamp')\">Edit Post</button>\n");
       echo ("<input type=\"button\" onclick=\"toggleColor($postId)\" id = \"likeThis$postId\" value = \"Like\"></button><hr>\n");
      echo("</p>\n");
    }
   ?>

  </body>
</html>
