function postFunc(postId, name, comment, author){

  var post_name = prompt("Post Name:", name);
  var post_comment = prompt("Comment", comment);
  //var update_id = "post_" + postId;
  //var node_index = 4;

  var request = $.ajax({
			url: "../php/updatePosts.php",
			type: "POST",
			dataType: "html",
      data: {ajax_post_name: post_name, ajax_post_comm: post_comment, ajax_post_author:author, ajax_post_id:postId},
		});

		request.done(function(msg) {
      //if we are createing a new post
      if(postId<0){

        //ugh
        location.reload();

        //var para = document.createElement("p");
        //var node = document.createTextNode(msg);
        //para.appendChild(node);

        /*var para = document.getElementById("new_post");
        var child = document.createElement("p");
        child.innerHTML = msg;
        para.insertBefore(para,child);*/

        /*var newPost = document.getElementById("new_post");
        var newPost = document.getElementById("new_post");
        var textnode = document.createTextNode(msg);         // Create a text node
        newPost.appendChild(textnode);*/
        //newPost.insertBefore(msg);
        //msg.insertBefore($('#new_post'));

        //elem = document.createElement("div");
        //elem.id = 'myID';
        //newPost.innerHTML = msg;
        //document.body.insertBefore(newPost,document.body.childNodes[node_index--]);
      }
      else{
        //update post
        var x=document.getElementById(update_id);
        x.innerHTML = msg;
      }

		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});

}
