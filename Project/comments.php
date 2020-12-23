<html>

<head>
<style>
body {
	font-family: monospace;
    width: 500px;   
    position: absolute;
    left: 32%;
    background-image: url('images/login.jpg');
    background-size: cover;
    background-attachment: fixed;
}
h1{
    text-align: center;
    color: white;

}

.comment-form {
	background: #ffffff;
	border: #000000 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-bottom: 20px;
}

.input-field {
	width: 100%;
	border-radius: 2px;
	padding: 10px;
	border: #000000 1px solid;
}

.btn{
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #7E017F;
  border: none;
  border-radius: 10px;
}

ul {
	list-style-type: none;
}

.comment-row {
	border-bottom: #aaaaaa 1px solid;
	margin-bottom: 40px;
	padding: 10px;
}

.outer-comment {
	background: #ffffff;
	padding: 20px;
	border: #000000 1px solid;
}

span.commet-row-label {
	font-style: italic;
}

span.posted-by {
    color: #FF0000;
    text-decoration: underline;
}

.comment-info {
	font-size: 1em;
}
.comment-text {
    margin: 10px 0px;
}

#comment-message {
    margin-left: 100px;
    color: #ff0000;
    display: none;
}
h3{
    color: white;
}

</style>
<title>Comment page</title>
<script src="jquery.min.js"></script>


<body>
    <h1>Post your comments:</h1>
    <div class="comment-form-container">
    <form id="frm-comment">
        <div class="input-row">
            <h3>Name:</h3>
            <input type="hidden" name="comment_id" id="commentId"
                placeholder="Name" /> <input class="input-field"
                type="text" name="name" id="name" placeholder="Name" />
        </div>
        <div class="input-row">
            <h3>Comment:</h3>
            <textarea class="input-field" type="text" name="comment"
                id="comment">  </textarea>
        </div>
        <div>
            <input type="button" class="btn" id="submitButton"
                value="Post" />
            <div id="comment-message">Posted Successfully </div>
        </div>

    </form>
</div>
    <div id="output"></div>
    <script>
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
                                    "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + 
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);

                                }
                            }
                            $("#output").html(list);
                        });
            }

        </script>
</body>

</html>