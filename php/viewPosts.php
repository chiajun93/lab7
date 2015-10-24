<!--viewPosts.php-->
<?php
  //get the file contents and convert it to a php object
  $posts_string = file_get_contents("../rec/posts.txt");
  $posts_obj = json_decode($posts_string,true);

  // Start the session
  session_start();

  // Set session variables
  $_SESSION["username"] = "billybob";

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

    //show the create new post button
    echo("<hr>\n");
    echo("<button type=\"button\" onclick=\"postFunc(-1, 'Enter post name', 'Enter post comment','$curr_author')\">Create Post</button><hr>\n");

    //build each thing from the database in backwards order
    foreach (array_reverse($posts_obj) as $post_id => $post) {
      //variables
      $postId = $post['postID'];
      $postName = $post['postName'];
      $comment = $post['postComment'];
      $author = $post['postAuthor'];  //original post author

      //echo the correct html
      echo("<p id=\"post_$postId\">\n");
      echo ("$postId<br>\n");
      echo ("$postName<br>\n");
      echo ("    Comment: $comment<br>\n");
      echo ("    Author: $author<br><br>\n");
      echo("<button type=\"button\" onclick=\"postFunc($postId, '$postName', '$comment','$curr_author')\">Update Post</button><hr>\n");
      echo("</p>\n");
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
