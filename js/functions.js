function testing(postId, name, comment, author){

  var post_name = prompt("Post Name:", name);
  var post_comment = prompt("Comment", comment);
  var update_class = "#post_" + postId;

  alert(postId + author + post_name + post_comment);

  var request = $.ajax({
			url: "../php/updatePosts.php",
			type: "POST",
			dataType: "html",
      data: {ajax_post_name: post_name, ajax_post_comm: post_comment, ajax_post_author:author, ajax_post_id:postId},
		});

		request.done(function(msg) {
			//$("#bod").html(msg);
		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});

}
