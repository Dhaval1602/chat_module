<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<style class="cp-pen-styles"></style>
<link rel='stylesheet' href='style.css'>
</head><body>
<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
				<p class="uname"></p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Set UserName" id="user_name" value="" />
			<button type="button">
		</div>
		<div id="contacts">
			<ul id="myContact" class="cont">
							
			</ul>
			<p>Groups</p>
			<ul id="myGroup" class="contGrp">
		
			</ul>
		</div>
		<div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile \">
			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
			<p class="chatname"> - </p>
			<div class="social-media">
				<i id="videoCall" class="fa fa-video-camera" aria-hidden="true"></i>
				<!-- <i class="fa fa-twitter" aria-hidden="true"></i>
				 <i class="fa fa-instagram" aria-hidden="true"></i> -->
			</div>
		</div>
		<div class="messages">
			<ul id="chatHistory">
				
			</ul>
		</div>
		
		<div class="message-input">
			<div class="wrap">
			<form id="myForm" onsubmit="return sendMessage();" enctype="multipart/form-data">
			<input type="text" id="message" placeholder="Write your message..." />
			<input type="hidden" name="msg_type" value="1" id="msg_type">
			<input type="file" name="files" id="uploadfile" style="display:none" />
			<i class="fa fa-paperclip attachment" id="uploader" aria-hidden="true"></i>
			<button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</form>
			</div>
		</div>
	</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="main.js"></script>
<script src="socket.io.js"></script>
<script src="socket.io-stream.js"></script>

<script>

	$('#uploader').click(function() {
		$('input[type=file]').click();
	});
	var url = "http://localhost:3000";
	var io = io(url);
	var username = "";
	var otherPersonName = "";
	
	$(document).ready(function()
	{
	$("ul.cont").on("click","li", function(){		
		$(this).attr("data-id")
		username = $("#user_name").val();
		$(".uname").text(username);
		io.emit("user_connected", username);
		io.emit('join_room',{'username' :username,'roomname' : 'MyGroup' })
		otherPersonName = $(this).attr("data-id")
		$(".chatname").text(otherPersonName);
		var msg =  $(this).attr("id");
		$("#msg_type").val(msg);
		//user = $(this).attr("data-id")
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
				var chat = '';
				for (var a = 0; a < response.length; a++) {
					if (response[a].sender == username) {
						
						if(response[a].msg_type == 'media')
						{	
								
							if(response[a].media_type == 'image')
							{
								chat += "<li class='replies'>";
								chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
								chat +="<img src = '"+ response[a].message +"' style='width:50%'>";
								chat +="</li>";
							}
							else
							{
								chat += "<li class='replies'>";
								chat +="<p>"+response[a].message+"</p>";
								chat +="<button class='downloadFile' id='downLoad' data-id='"+response[a].message+"' >Download</button>";
								chat +="</li>";
								//chat +=a;
							}
							//li.innerHTML = response[a].message;
							/* chat += "<li class='replies'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<img src='"+response[a].message +"' style='width:30%' alt='' />";
							chat +="</li>"; */
						}
						else
						{
							//li.innerHTML = response[a].message;
							chat += "<li class='replies'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<p>"+response[a].message+"</p>";
							chat +="</li>";
						}
					} else {
						if(response[a].msg_type == 'media')
						{
							chat += "<li class='sent'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<img src='"+response[a].message +"' style='width:30%' alt='' />";
							chat +="</li>";
						}
						else
						{
							chat += "<li class='sent'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<p>"+response[a].message+"</p>";
							chat +="</li>";
						}
						//li.innerHTML = "<b>" + response[a].username + ":</b> " + response[a].message;
					}					
					if (response[a].username == username) {
						
						//li.innerHTML += "<button class='btn-delete' data-id=" + response[a].id + " onclick='deleteMessage(this);'>Delete</button>";
					}
					$("#chatHistory").html(chat);
					//messages.appendChild(li);
				}
				io.emit("new_user", username);
			}
		});
		return false;
	});
	});
	$(document).ready(function()
	{
	$("ul.contGrp").on("click","li", function(){
		
		$(this).attr("data-id")
		username = $("#user_name").val();
		$(".uname").text(username);
		otherPersonName = $(this).attr("data-id")
		//alert(otherPersonName);
		$(".chatname").text(otherPersonName);
		io.emit("user_connected", username);
		io.emit('join_room',{'username' :username,'roomname' : otherPersonName })
		
		var msg =  $(this).attr("id");
		$("#msg_type").val(msg);
		//user = $(this).attr("data-id")
		
		$.ajax({
			url: url + "/get_group_messages",
			method: "POST",
			data: {
				"sender": username,
          		"receiver": otherPersonName
			},
			success: function (response) {
				response = JSON.parse(response);
				var messages = document.getElementById("messages");
				var chat = '';
				for (var a = 0; a < response.length; a++) {
					if (response[a].sender == username) {
						if(response[a].media_type == 'image')
							{
								chat += "<li class='replies'>";
								chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
								chat +="<img src = '"+ response[a].message +"' style='width:50%'>";
								chat +="</li>";
							}
							else
							{
								chat += "<li class='replies'>";
								chat +="<p>"+response[a].message+"</p>";
								chat +="<button class='downloadFile' id='downLoad' data-id='"+response[a].message+"' >Download</button>";
								chat +="</li>";
								//chat +=a;
							}
						/* chat += "<li class='replies'>";
						chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
						chat +="<p>"+response[a].message+"</p>";
						chat +="</li>"; */
					} else {
						
						chat += "<li class='sent'>";
						chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
						chat +="<p>"+response[a].message+"</p>";
						chat +="</li>";
					}
					if (response[a].username == username) {
						
						//li.innerHTML += "<button class='btn-delete' data-id=" + response[a].id + " onclick='deleteMessage(this);'>Delete</button>";
					}
					$("#chatHistory").html(chat);
					//messages.appendChild(li);
				}
				io.emit("new_user", username);
			}
		});
		return false;
	});
	});
	$('#uploadfile').change(function(e) {
		var file = e.target.files[0];
        var stream = ss.createStream();

    // upload a file to the server.
    ss(socket).emit('file', stream, {size: file.size});
    ss.createBlobReadStream(file).pipe(stream);
  	});

	$(document).ready(function() {
		$.ajax({
			url: url + "/get_users",
			method: "GET",
			success: function (response) {
				response = JSON.parse(response);
				
				var messages = document.getElementById("messages");
						var htm = ''
						$.each(response, function (key, val) {
							htm += "<li class='contact' data-id='"+val.username+"' id='user'>";
							
							htm +="<div class='wrap'>";
							htm +="<span class='contact-status online'></span>";
							htm +="<img src='"+val.profile_pic+"' alt='' />";
							htm +="<div class='meta'>";
							htm +="<p class='name'>"+val.username+"</p>";
							htm +="<p class='preview'>You just got LITT up, Mike.</p>";
							htm +="</div>";
							htm +="</div>";
							htm +="</li>";
						});
						$("#myContact").html(htm);
			}
		});
	});
	$(document).ready(function() {
		$.ajax({
			url: url + "/get_groups",
			method: "GET",
			success: function (response) {
				response = JSON.parse(response);
				
				console.log(response);

				//var messages = document.getElementById("messages");
						var htm = ''
						$.each(response, function (key, val) {
							htm += "<li class='contact' data-id='"+val.group_name+"' id='group'>";
							htm +="<div class='wrap'>";
							htm +="<span class='contact-status online'></span>";
							htm +="<img src='"+val.group_icon+"' alt='' />";
							htm +="<div class='meta'>";
							htm +="<p class='name'>"+val.group_name+"</p>";
							htm +="<p class='preview'>You just got LITT up, Mike.</p>";
							htm +="</div>";
							htm +="</div>";
							htm +="</li>";
						});
						$("#myGroup").html(htm);
			}
		});
	});
	function readThenSendFile(data){
	var reader = new FileReader();
	reader.onload = function(evt){
		var msg ={};
		msg.username = username;
		msg.file = evt.target.result;
		msg.fileName = data.name;
		io.emit('base64 file', msg);
	};
	reader.readAsDataURL(data);
	}
	/* function setUsername() {
		username = $("#username").val();
		//otherPersonName = $("#toName").val();
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
	} */
	function sendMessage(e) {
		//event
		event.preventDefault();
		var mediaMsg = '' ;
		var mediaMsg1 = '' ;
		var mediaType = '';
		var message_text = document.getElementById("message").value;
		var msg_type = $("#msg_type").val();
		if(message_text == '')
		{
		var formdata = new FormData($('form')[0]);
		
            var url = "http://localhost:3000/uploadImage";
            $.ajax({
                url: url,
                type: "POST",
				async: false,
                data: formdata,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (data) {
                    mediaMsg = data.message,
					mediaType = data.fileType
                }
            });
		}
		document.getElementById("myForm").reset();
		if(mediaMsg != '')
		{
			if(mediaType == 'image')
			{
				message = mediaMsg
				msg = 'media';
				mediaType = 'image';
			}
			else
			{
				message = mediaMsg
				msg = 'media';
				mediaType = 'other';
			}			
		}
		else
		{
			message = message_text
			msg = 'text';
			mediaType = '';
		}
			io.emit("send_message", { 
			"sender": username,
			"receiver": otherPersonName,
			"message": message,
			"msg_type" : msg_type,
			"media_type" : mediaType,
			"msg" : msg
			});
		

	chat = "";
	if(msg == 'media')
	{
		chat += "<li class='sent'>";
						chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
						chat +="<img src = '"+message +"' style='width:50%'>";
						chat +="</li>";
	}
	else
	{
		chat += "<li class='sent'>";
						chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
						chat +="<p>"+message+"</p>";
						chat +="</li>";
	}
	
	//$("#chatHistory").html(chat);
	document.getElementById("chatHistory").innerHTML += chat;
    return false;
	}

	io.on("user_connected", function (username) {
});

	function deleteMessage(self) {
		var id = self.getAttribute("data-id");
		io.emit("delete_message", id);
	}

	io.on("delete_message", function (id) {
		document.getElementById("message-" + id).innerHTML = "<i>Message has been deleted</i>";
	});

	io.on("message_received", function (data) {
		console.log(data.msg);
		chat = "";
		if(data.msg == 'media')
		{
			if(data.media_type == 'image')
			{
				chat += "<li class='replies'>";
				chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
				chat +="<img src = '"+ data.message +"' style='width:50%'>";
				chat +="</li>";
			}
			else
			{
				chat += "<li class='replies'>";
				chat +="<p>"+data.message+"</p>";
				chat +="<button class='downloadFile' id='downLoad' data-id='"+data.message+"' >Download</button>";
				chat +="</li>";
				//chat +=a;
			}
		}
		else
		{
			chat += "<li class='replies'>";
						chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
						chat +="<p>"+data.message+"</p>";
						chat +="</li>";
		}
		
	//$("#chatHistory").html(chat);
	document.getElementById("chatHistory").innerHTML += chat;
});

/* $('#GetFile').on('click', function () {
    $.ajax({
        url: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/172905/test.pdf',
        method: 'GET',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = 'myfile.pdf';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        }
    });
}); */
$(document).ready(function()
	{
		
	$(document).on("click","button.downloadFile", function(){
		
		
		var docPath = $(this).attr("data-id")
		

		//username = $("#user_name").val();
		window.location = docPath;
		/* $.ajax({
			url: url + "/download",
			method: "POST",
			
			data: {
				"filePath": 'pointCode',
          		"receiver": otherPersonName
			},
			success: function (res) {
				alert('123');
            	
			}
		}); */
		return false;
	});
	});


	$("#videoCall").on("click", function(){		
		alert("ddd");
		//$(this).attr("data-id")
		username = $("#user_name").val();
		$(".uname").text(username);
		//io.emit("user_connected", username);
		//io.emit('join_room',{'username' :username,'roomname' : 'MyGroup' })
		otherPersonName = $(this).attr("data-id")
		$(".chatname").text(otherPersonName);
		var msg =  $(this).attr("id");
		$("#msg_type").val(msg);
		//user = $(this).attr("data-id")
		$.ajax({
			url: url + "/createMeeting",
			method: "POST",
			data: {
				"sender": username,
          		"receiver": otherPersonName
			},
			success: function (response) {
				response = JSON.parse(response);
				var messages = document.getElementById("messages");
				var chat = '';
				for (var a = 0; a < response.length; a++) {
					if (response[a].sender == username) {
						
						if(response[a].msg_type == 'media')
						{	
								
							if(response[a].media_type == 'image')
							{
								chat += "<li class='replies'>";
								chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
								chat +="<img src = '"+ response[a].message +"' style='width:50%'>";
								chat +="</li>";
							}
							else
							{
								chat += "<li class='replies'>";
								chat +="<p>"+response[a].message+"</p>";
								chat +="<button class='downloadFile' id='downLoad' data-id='"+response[a].message+"' >Download</button>";
								chat +="</li>";
								//chat +=a;
							}
							//li.innerHTML = response[a].message;
							/* chat += "<li class='replies'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<img src='"+response[a].message +"' style='width:30%' alt='' />";
							chat +="</li>"; */
						}
						else
						{
							//li.innerHTML = response[a].message;
							chat += "<li class='replies'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<p>"+response[a].message+"</p>";
							chat +="</li>";
						}
					} else {
						if(response[a].msg_type == 'media')
						{
							chat += "<li class='sent'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<img src='"+response[a].message +"' style='width:30%' alt='' />";
							chat +="</li>";
						}
						else
						{
							chat += "<li class='sent'>";
							chat +="<img src='http://emilcarlsson.se/assets/mikeross.png' alt='' />";
							chat +="<p>"+response[a].message+"</p>";
							chat +="</li>";
						}
						//li.innerHTML = "<b>" + response[a].username + ":</b> " + response[a].message;
					}					
					if (response[a].username == username) {
						
						//li.innerHTML += "<button class='btn-delete' data-id=" + response[a].id + " onclick='deleteMessage(this);'>Delete</button>";
					}
					$("#chatHistory").html(chat);
					//messages.appendChild(li);
				}
				io.emit("new_user", username);
			}
		});
		return false;
	});
	
</script>
</body></html>
