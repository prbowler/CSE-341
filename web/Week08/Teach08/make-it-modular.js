/*
'use strict'
    const filterFn = require('./solution_filter.js')
    const dir = process.argv[2]
    const filterStr = process.argv[3]

    filterFn(dir, filterStr, function (err, list) {
      if (err) {
        return console.error('There was an error:', err)
      }

      list.forEach(function (file) {
        console.log(file)
      })
    })
 */
let path = require('path');
let mymodule = require('./mymodule');
let dir = process.argv[2];
let filterExtension = process.argv[3];

let callback = function (err, list) {
    if (err) throw err;
    list.forEach(function (file) {
        console.log(file);
    })
};

mymodule(dir, filterExtension, callback);

