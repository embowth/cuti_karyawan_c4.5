var date = new Date();
var day = date.getDate();
var year = date.getFullYear();

var month = date.getMonth();
var monthLabels= ["Januari", "Februari",  "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

var weekDay = date.getDay();
var weekDayLabels = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

//create function to grab day, month, date, year
function Day(){
month = monthLabels[month];
weekDay = weekDayLabels[weekDay];
  
document.getElementById("day").innerHTML = "" + "<span>" + weekDay.toUpperCase() + "</span>";
document.getElementById("date").innerHTML = month.toUpperCase() + " " + "<span>" + day + "</span>" + year;  
}

Day();