/*
'use strict';
const fs = require('fs');
const path = require('path');

const folder = process.argv[2];
const ext = '.' + process.argv[3];

fs.readdir(folder, function (err, files) {
  if (err) return console.error(err);
  files.forEach(function (file) {
    if (path.extname(file) === ext) {
      console.log(file)
    }
  })
});
*/

const fs = require('fs');
const path = require('path');

fs.readdir(process.argv[2], callback);

function callback(err, data) {
   if (err){
       return console.error(err);
   } else {
       for (text of data) {
           let ext = path.extname(text);
           if (ext == "." + process.argv[3]) {
               console.log(text);
           }
       }
   }
}
