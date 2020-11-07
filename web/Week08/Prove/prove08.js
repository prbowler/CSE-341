let http = require('http');
let data = require('./student.json');

http.createServer(callback).listen(8888);

function callback(req, response) {
    response.writeHead(200, {'Content-Type': 'text/plain'});
    response.writeHead(404, {"Content-Type" : "text/html"});
    if (req.url === "/home") {
        response.write("<h1>Welcome to the Home Page</h1>");
    } else if (req.url == "/getData") {
        response.write("Student: " + data.name + "<br>Class: " + data.class);
    } else {
        response.write("<html><head><title>404 Page Not Found</title></head><body><h1>404 Page Not Found</h1></html>");
    }
    response.end();
}


