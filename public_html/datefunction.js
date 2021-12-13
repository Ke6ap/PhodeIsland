// Everything except weekend days
const validate = dateString => {
    const day = (new Date(dateString)).getDay();
    if (day==2 || day==4) {
      return false;
    }
    return true;
  }

  // Sets the value to '' in case of an invalid date
  document.querySelector('#dateControl').onchange = evt => {
    if (!validate(evt.target.value)) {
      evt.target.value = '';
      alert("We are not accepting reservation on Tuesday and Thursday");
    }
  }

//emfanizw 2 mhnes mprosta
let dtToday = new Date();
let month = dtToday.getMonth() + 1 + 2;  // getMonth() einai me bash to 0 kai to 2 einai 2 mhnes mrosta
let day = dtToday.getDate();
let year = dtToday.getFullYear();

//kolame to 0 mprosta giati ta dates einai 2psifia
if(month < 10)
   month = '0' + month.toString();
if(day < 10)
   day = '0' + day.toString();

let maxDate = year + '-' + month + '-' + day;
$('#dateControl').attr('max', maxDate);

