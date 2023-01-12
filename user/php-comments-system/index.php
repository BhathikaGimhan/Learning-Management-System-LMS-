<html>
<head>
<style>
body {
	font-family: Arial;
	width: 600px;
}

.comment-form-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 4px;
}

.input-row {
	margin-bottom: 20px;
}

.input-field {
	width: 100%;
	border-radius: 4px;
	padding: 10px;
	border: #e0dfdf 1px solid;
}

.btn-submit {
	padding: 10px 20px;
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 4px;
	cursor: pointer;
}

ul {
	list-style-type: none;
}

.comment-row {
	border-bottom: #e0dfdf 1px solid;
	margin-bottom: 15px;
	padding: 15px;
}

.outer-comment {
	background: #F0F0F0;
	padding: 20px;
	border: #dedddd 1px solid;
	border-radius: 4px;
}

span.comment-row-label {
	color: #484848;
}

span.posted-by {
	font-weight: bold;
}

.comment-info {
	font-size: 0.9em;
	padding: 0 0 10px 0;
}

.comment-text {
	margin: 10px 0px 30px 0;
}

.btn-reply {
	color: #2f20d1;
	cursor: pointer;
	text-decoration: none;
}

.btn-reply:hover {
	text-decoration: underline;
}

#comment-message {
	margin-left: 20px;
	color: #005e00;
	display: none;
}

.label {
	padding: 0 0 4px 0;
}
</style>
<title>Skill Hub || Comment Section</title>
<script src="jquery-3.2.1.min.js"></script>


<body>

	<!--<h1>Comment System using PHP and Ajax</h1>-->
	<div class="comment-form-container">
		<form id="frm-comment">
			<div class="input-row">
				<div class="label">Name:</div>
				<input type="hidden" name="comment_id" id="commentId" /> <input
					class="input-field" type="text" name="name" id="name"
					placeholder="Enter your name" />
			</div>
			<div class="input-row">
				<textarea class="input-field" name="comment" id="comment"
					placeholder="Your comment here"></textarea>
			</div>
			<div>
				<input type="button" class="btn-submit" id="submitButton"
					value="Publish" />
				<div id="comment-message">Comment added successfully.</div>
			</div>
		</form>
	</div>
	<div id="output"></div>
	<script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
            	   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                        	$("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                     	   listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
            	   listComment();
            });

            function listComment() {
                $.post("comment-list.php",
                        function (data) {
                           var data = JSON.parse(data);
                            
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent == "0")
                                {
                                    comments = "<div class='comment-row'>"+
                                    "<div class='comment-info'><span class='comment-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='comment-row-label'>at</span> <span class='posted-at'>" + data[i]['comment_at'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                                    "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }

            function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        " <div class='comment-info'><span class='comment-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='comment-row-label'>at</span> <span class='posted-at'>" + data[i]['comment_at'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
        </script>
</body>

</html>