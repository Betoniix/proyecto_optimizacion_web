function formatDate(date, format) {
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
  
    format = format.replace("dd", day < 10 ? "0" + day : day);
    format = format.replace("MM", month < 10 ? "0" + month : month);
    format = format.replace("yyyy", year);
  
    return format;
}


const dateString= "27 Feb 2023 03:19" ;

let date = new Date(dateString); // Aqui se ingresa la fecha
let formattedDate = formatDate(date, "dd/MM/yyyy");
console.log(formattedDate);
