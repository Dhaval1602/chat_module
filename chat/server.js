console.log("server.js");

var express = require("express");
var cors = require('cors');
var app = express();
//app.use(express.static(path.join(__dirname, 'public')));
app.use('/images', express.static('images')); 
app.use('/public', express.static('public')); 

const fetch = require("cross-fetch");

//app.use(cors());
app.use(cors({
	credentials: true,
	origin: "*"
  }));

//var ss = require('socket.io-stream');
var path = require('path');
const multer  = require('multer')
const upload = multer({});
let fs = require('fs-extra');
var bodyParser = require("body-parser");
app.use(bodyParser.urlencoded());
app.use(bodyParser.json());

var http = require("http").createServer(app);
//var io = require("socket.io")(http);
const io = require('socket.io')(http, {
	cors: {
	  origin: '*',
	  credentials:true,
	}
  });

var mysql = require("mysql");
var connection = mysql.createConnection({
	"host": "localhost",
	"user": "root",
	"password": "",
	"database": "chat_app"
});
const API_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmFwcGVhci5pbiIsImF1ZCI6Imh0dHBzOi8vYXBpLmFwcGVhci5pbi92MSIsImV4cCI6OTAwNzE5OTI1NDc0MDk5MSwiaWF0IjoxNjQ5OTk2NTczLCJvcmdhbml6YXRpb25JZCI6MTU4MTA4LCJqdGkiOiI3ZWE4ODFlZC02MGMxLTQ4MTItYmFhOS00ZDQ2Y2UzMTNiNmYifQ.YQ5fvErjqQ277uxZf8ZMJOwUDLr2DSKvZK8e51AD79s";

const data = {
	endDate: "2099-02-18T14:23:00.000Z",
	fields: ["hostRoomUrl"],
  };


connection.connect(function (error) {
	app.get("/", function (request, result) {
		result.end("Hello world !");
	});

	app.use(function (req, res, next) {
	    res.setHeader('Access-Control-Allow-Origin', '*');
		
	    next();
	});
	app.get("/get_users", function (request, result) {
		
		connection.query("SELECT * FROM users", function (error, users) {
			result.end(JSON.stringify(users));
		});
	});
	app.get("/get_groups", function (request, result) {
		
		connection.query("SELECT * FROM group_details", function (error, group) {
			result.end(JSON.stringify(group));
		});
	});
	app.post("/get_messages", function (request, result) {
	
		connection.query("SELECT * FROM messages WHERE (sender = '" + request.body.sender + "' AND receiver = '" + request.body.receiver + "') OR (sender = '" + request.body.receiver + "' AND receiver = '" + request.body.sender + "')", function (error, messages) {
			result.end(JSON.stringify(messages));
		});
	});
	app.post("/get_group_messages", function (request, result) {
		console.log(request.body)
		connection.query("SELECT * FROM messages WHERE receiver = '"+request.body.receiver+"'", function (error, messages) {
			result.end(JSON.stringify(messages));
		});
	});
	var users = [];

	 io.on("connection", function (socket) {
	 	 //console.log("socket connected = " + socket.id);
		  console.log("User connected: ",  socket.id);
		  socket.on("user_connected", function (username) {
			  users[username] = socket.id;
			  io.emit("user_connected", username);
			  /* io.emit("join_room", {'username': username,'roomname' : 'MyGroup'});
			  socket.join('MyGroup'); */
		  });
		  socket.on("join_room", function (data) {
			  //console.log(data.roomname)
			/* users[username] = socket.id;
			io.emit("user_connected", username); */
			io.emit("join_room", {'username': data.username,'roomname' : data.roomname});
			socket.join(data.roomname);
		});

	 	socket.on("new_user", function (username) {
	 		connection.query("SELECT * FROM users WHERE username = '" + username + "'", function (error, result) {
	 			if (result.length == 0) {
	 				connection.query("INSERT INTO users(username) VALUES('" + username + "')", function (error, result) {
	 					io.emit("new_user", username);
	 				});
	 			} else {
	 				io.emit("new_user", username);
	 			}
	 		});
	 	});

		 socket.on("send_message", function (data) {
			 //console.log(data.receiver);
			 if(data.msg_type == 'group')
			 {
				 //console.log(data);
				 
				//socket.on('send_message', function (msg) {
					io.to(data.receiver).emit('message_received', data);
					connection.query("INSERT INTO messages (sender, receiver,msg_type,media_type, message) VALUES ('" + data.sender + "','" + data.receiver + "','" + data.msg_type + "','" + data.media_type + "', '" + data.message + "')", function (error, result) {
					});
//				});
				//console.log("ddddd");
			 }
			 else
			 {
				var socketId = users[data.receiver];
				console.log(data);
				socket.to(socketId).emit("message_received", data);
				connection.query("INSERT INTO messages (sender, receiver,msg_type,media_type, message) VALUES ('" + data.sender + "', '" + data.receiver + "','" + data.msg + "','" + data.media_type + "', '" + data.message + "')", function (error, result) {
					
				});
			 }
			
			
		});

		socket.on("delete_message", function (id) {
			connection.query("DELETE FROM messages WHERE id = '" + id + "'", function (error, result) {
				io.emit("delete_message", id);
			});
		})

		socket.on("new_message", function (data) {
			console.log("ddd");

			console.log("INSERT INTO messages(sender, message) VALUES('" + data.username + "', '" + data.message + "')");
			
			connection.query("INSERT INTO messages(sender, message) VALUES('" + data.username + "', '" + data.message + "')", function (error, result) {
				console.log(result);

				//data.id = result.insertId;
				io.emit("new_message", data);
			});
		});

		
	});
});
let profile_image = multer({

    storage: multer.diskStorage({
      destination: (req, file, callback) => {
        let type = req.params.type;
        let path = `./public`;
        fs.mkdirsSync(path);
        callback(null, path);
      },
      filename: (req, file, callback) => {
        //originalname is the uploaded file's name with extn
        callback(null, file.originalname);
      }
    })
});
app.post('/uploadImage', profile_image.single('files'), async (req, res, next) => {
var fileExt = req.file.filename.split('.').pop();
console.log(fileExt);

if(fileExt == 'jpeg' || fileExt == 'jpg' || fileExt == 'png')
{

	//console.log('image')
	imgUrl = "http://localhost:3000/public/"+req.file.filename;
res.status(201).json({
	"status": "success",
	'fileType' :'image',
	"message": imgUrl
});
}
else
{
	imgUrl = "http://localhost:3000/public/"+req.file.filename;
	res.status(201).json({
		"status": "success",
		'fileType' :'other',
		"message": imgUrl
	});
	//console.log("other")	
}
//console.log(fileExt);
});

app.post('/download', function(req, res){
	//console.log(req);

	const file = `${__dirname}/public/pointCode.xlsx`;
	res.status(201).json({
		"status": "success",
		"path": file
	});

	//res.download(file); // Set disposition and send it.
  });

http.listen(3000, function () {
	console.log("Listening :3000");
});