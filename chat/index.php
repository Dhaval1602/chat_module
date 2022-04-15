<link rel="stylesheet" type="text/css" href="css/style.css">

<form method="POST" onsubmit="return setUsername();" id="form-login">
	<div class="form-group">
		<input type="text" autocomplete="off" id="username" placeholder="Enter username">
		<input type="text" autocomplete="off" id="toName" placeholder="Enter Other Name">
	</div>

	<div class="form-group">
		<input type="submit" value="Select">
	</div>
</form>

<div id="chat-box">
	<div id="all-chats">
		<ul id="messages" style="max-height: 1150px; overflow: scroll;"></ul>
	</div>

	<div id="send-message" style="display: none;">
		<form method="POST" onsubmit="return sendMessage();" >
			<div class="form-group">
				<input type="text" autocomplete="off" name="message" id="message" placeholder="Enter message">
			</div>

			<div class="form-group">
				<input type="submit" value="Send">
			</div>
		</form>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/socket.io.js"></script>

<script>
	var url = "http://localhost:3000";
	var io = io(url);
	var username = "";
	var otherPersonName = "";

	function setUsername() {
		username = $("#username").val();
		otherPersonName = $("#toName").val();
		$("#send-message").show();

		$.ajax({
			url: url + "/get_messages",
			method: "POST",
			data: {
				"sender": username,
          		"receiver": otherPersonName
			},

			success: function (response) {
				response = JSON.parse(response);
				var messages = document.getElementById("messages");

				for (var a = 0; a < response.length; a++) {
					var li = document.createElement("li");
					li.id = "message-" + response[a].id;

					if (response[a].username == "") {
						li.innerHTML = response[a].message;
					} else {
						li.innerHTML = "<b>" + response[a].username + ":</b> " + response[a].message;
					}
					
					if (response[a].username == username) {
						li.innerHTML += "<button class='btn-delete' data-id=" + response[a].id + " onclick='deleteMessage(this);'>Delete</button>";
					}

					messages.appendChild(li);
				}

				io.emit("new_user", username);
			}
		});

		return false;
	}

	function sendMessage() {
		//alert("ddd");
		var message = document.getElementById("message").value;
		
    io.emit("send_message", {
      "sender": username,
      "receiver": otherPersonName,
      "message": message
    });
	var html = "";
    html += '<div class="outgoing_msg">';
      html += '<div class="sent_msg">';
        html += '<p>' + message + '</p>';
      html += '</div>';
    html += '</div>';
    document.getElementById("messages").innerHTML += html;

    return false;
	}

	function deleteMessage(self) {
		var id = self.getAttribute("data-id");
		io.emit("delete_message", id);
	}

	io.on("delete_message", function (id) {
		document.getElementById("message-" + id).innerHTML = "<i>Message has been deleted</i>";
	});

	io.on("new_message", function (data) {
		var html = "";
    html += '<div class="incoming_msg">';
      html += '<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>';
      html += '<div class="received_msg">';
        html += '<div class="received_withd_msg">';
          html += '<p>' + data.message + '</p>';
        html += '</div>';
      html += '</div>';
    html += '</div>';

    document.getElementById("messages").innerHTML += html;
    document.getElementById("form-send-message").style.display = "";
    document.getElementById("messages").style.display = "";
    otherPersonName = data.sender;
	});

	io.on("new_user", function (username) {
		var messages = document.getElementById("messages");
		var li = document.createElement("li");
		li.innerHTML = "<b>" + username + "</b> just joined the chat";
		messages.appendChild(li);
	});
</script>