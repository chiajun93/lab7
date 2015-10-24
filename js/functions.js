function postFunc(postId, name, comment, author){

  //ask user for input variables
  var post_name = prompt("Post Name:", name);
  var post_comment = prompt("Comment", comment);
  var update_id = "post_" + postId;

  //AJAX request
  var request = $.ajax({
			url: "../php/updatePosts.php",
			type: "POST",
			dataType: "html",
      data: {ajax_post_name: post_name, ajax_post_comm: post_comment, ajax_post_author:author, ajax_post_id:postId},
		});

    //what to do when the request is done
		request.done(function(msg) {
      //if we are createing a new post
      if(postId<0){

        //insert before the third child node
        //(the fourth child node happens to be where we want it)
        $(msg).insertBefore(document.body.childNodes[4]);

        //refresh the page if all else fails
        //location.reload();
      }
      else{
        //update post
        var x=document.getElementById(update_id);
        x.innerHTML = msg;
      }

		});

    //what to do if the request fails
		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});

}
