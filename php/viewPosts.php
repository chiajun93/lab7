<!--viewPosts.php-->
<?php
  //get the file contents and convert it to a php object
  $posts_string = file_get_contents("../rec/posts.txt");
  $posts_obj = json_decode($posts_string,true);

  // Start the session
  session_start();

  // Set session variables
  $_SESSION["username"] = "billybob";
  $_SESSION["posts"] = $posts_obj;



?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/functions.js"></script>
    <title><?php echo($_SESSION["username"]) ?></title>
  </head>
  <body id="bod">
    <?php

    $curr_author = $_SESSION["username"];  //current user

    echo("<hr>");
    echo("<button type=\"button\" onclick=\"testing(-1, 'Enter post name', 'Enter post comment','$curr_author')\">Create Post</button><hr>");

      foreach (array_reverse($posts_obj) as $post_id => $post) {
        $postId = $post['postID'];
        $postName = $post['postName'];
        $comment = $post['postComment'];
        $author = $post['postAuthor'];  //original post author
        echo ("$postId<br>");
        echo ("$postName<br>");
        echo ("    Comment: $comment<br>");
        echo ("    Author: $author<br><br>");
        echo("<button type=\"button\" onclick=\"testing($postId, '$postName', '$comment','$curr_author')\">Update Post</button><hr>");
      }
     ?>

  </body>
</html>


<?php
// var_dump is your friend! prints out info in an object/array
//var_dump($GLOBALS);
//echo "<hr>";


// print_r is print recursive - also used to print info
// can be used to RETURN a string with second parameter true
//echo print_r($_FILES, true);

//echo "<hr>";

// this one's job is to convert a PHP object to a JSON string
//echo json_encode($_FILES);

?>
