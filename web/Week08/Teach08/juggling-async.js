/*
'use strict'
    const http = require('http')
    const bl = require('bl')
    const results = []
    let count = 0

    function printResults () {
      for (let i = 0; i < 3; i++) {
        console.log(results[i])
      }
    }

    function httpGet (index) {
      http.get(process.argv[2 + index], function (response) {
        response.pipe(bl(function (err, data) {
          if (err) {
            return console.error(err)
          }

          results[index] = data.toString()
          count++

          if (count === 3) {
            printResults()
          }
        }))
      })
    }

    for (let i = 0; i < 3; i++) {
      httpGet(i)
    }
 */

var http = require('http');

var links = [2, 3, 4];

var buffer = [];

(function render(index) {

    http.get(process.argv[links[index]], function (response){

        response.setEncoding('utf8');

        response.on('data', function(chunk){
            if(buffer[index] === undefined) {
                buffer[index] = '';
            }
            buffer[index] += chunk;
        });
        response.on('end', function () {
            var newIndex = index+1;
            if(links[newIndex] !== undefined) {
                render(newIndex);
            } else {
                return renderOutput();
            }
        });
        response.on('error', console.error);

    }).on('error', console.error);
})(0); //self-calling function

function renderOutput() {

    buffer.forEach(function (elem) {

        console.log(elem);

    });
}