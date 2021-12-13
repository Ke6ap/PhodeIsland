const fs = require('fs');
const fetch = require('node-fetch');
const fileType = require('file-type');


let url = 'https://randomuser.me/api/?results=50&inc=email,login,name&password=lower,number,8-16';

fetchInformation(url);

function fetchInformation() {
  fetch(url)
    .then((response) => (response.json()))
    .then(function(data) {
      console.log(data);
      jsondata = JSON.stringify(data);

      fs.writeFile('user.json', jsondata, (err) => {
        if (err) {
          throw err;
        }
        console.log("JSON data is saved.");
      });

    });
}
