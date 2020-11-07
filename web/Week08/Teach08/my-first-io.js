/*'use strict'
const fs = require('fs')

const contents = fs.readFileSync(process.argv[2])
const lines = contents.toString().split('\n').length - 1
console.log(lines)
*/

const fs = require('fs');

let buf = fs.readFileSync(process.argv[2]);
const str = buf.toString();

let splitstr = str.split("\n");

console.log(splitstr.length - 1);



