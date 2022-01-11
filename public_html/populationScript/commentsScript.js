const fs = require('fs');
const fetch = require('node-fetch');
const fileType = require('file-type');


let url = 'https://api.kanye.rest';

for(let i=0;i<10;i++)
  fetchInformation(url);

function fetchInformation() {
  fetch(url)
    .then((response) => (response.json()))
    .then(function(data) {
      console.log(data);
      jsondata = JSON.stringify(data);

      fs.appendFile('comments.json', jsondata, (err) => {
        if (err) {
          throw err;
        }
        console.log("JSON data is saved.");
      });

    });
}
