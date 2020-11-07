/*'use strict'
    const fs = require('fs')
    const file = process.argv[2]

    fs.readFile(file, function (err, contents) {
      if (err) {
        return console.log(err)
      }
      // fs.readFile(file, 'utf8', callback) can also be used
      const lines = contents.toString().split('\n').length - 1
      console.log(lines)
    })
 */

const fs = require('fs');

fs.readFile(process.argv[2], 'utf8', callback);

function callback(err, data) {
    let str = data.toString();
    let lines = str.split("\n");
    console.log(lines.length - 1);
}
