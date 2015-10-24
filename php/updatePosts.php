<!--updatePosts.php-->
<?php

  //echo "updatePosts.php";

  // Start the session
  session_start();

  //get the current author
  $curr_author = $_SESSION["username"];  //current user

  //load existing entries
  $file = file_get_contents("../rec/posts.txt");
  $data = json_decode($file, true);

  $id = $_POST["ajax_post_id"];
  $name = $_POST["ajax_post_name"];
  $comm = $_POST["ajax_post_comm"];
  $author = $_POST["ajax_post_author"];


  //if post exits in database, update it
  //echo(count($data));
  //echo($id);
  if(0<$id && $id<=count($data)){
    //create new data entry
    $data_entry = array('postID' => $id, 'postName' => $name, 'postComment' => $comm, 'postAuthor' => $author);

    $data[$id] = $data_entry;
  }
  //otherwise make it
  else{
    //create new data entry
    $data_entry = array('postID' => count($data)+1, 'postName' => $name, 'postComment' => $comm, 'postAuthor' => $author);

    $data[count($data)+1] = $data_entry;
    $id=count($data);
  }

  //write the modified data
  file_put_contents('../rec/posts.txt', json_encode($data, JSON_FORCE_OBJECT));

  //tell ajax what to display
  echo("<p id=\"post_$id\">");
  echo ("$id<br>");
  echo ("$name<br>");
  echo ("    Comment: $comm<br>");
  echo ("    Author: $author<br><br>");
  echo("<button type=\"button\" onclick=\"postFunc($id, '$name', '$comm','$curr_author')\">Update Post</button>");
  echo("</p>");



?>
