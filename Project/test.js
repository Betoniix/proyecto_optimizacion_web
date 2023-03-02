/*
// ejemplo de archivo JSON
var jsonData = '[8,"Maurizio Costanzo, Who Transformed Italian Talk Shows, Dies at 84","Praised by critics as the inventor of contemporary Italian television, he also used his position to take on the Sicilian Mafia, which tried to kill him.","01\/03\/2023","https:\/\/www.nytimes.com\/2023\/03\/01\/world\/europe\/maurizio-costanzo-dead.html",7,"Deaths (Obituaries)"]';

//{"datos":[1,2,3,4,5]}

// parsear el archivo JSON
let obj = JSON.parse(jsonData);

// obtener el valor en la posición n
var n = 1; // posición deseada
var valorN = obj[n];

// imprimir el valor obtenido
console.log(valorN); // resultado: 4

*/

let parrafo = "JavaScript es un lenguaje de programación popular para la web.";
let palabra= "JavaScript";

if (parrafo.indexOf(palabra) !== -1) {
  console.log("La palabra JavaScript se encuentra en el párrafo.");
} else {
  console.log("La palabra JavaScript no se encuentra en el párrafo.");
}



var array = ["palabra1", "palabra2", "palabra3"]; // array de ejemplo


  var searchTerm = "palabra1"; // obtenemos el valor del input
  var found = false; // inicializamos la variable found como false
    console.log("si");
  for (var i = 0; i < array.length; i++) {
    if (array[i] === searchTerm) { // si encontramos una coincidencia
      found = true; // actualizamos la variable found a true
      console.log("La palabra '" + searchTerm + "' ha sido encontrada en el array en la posición " + i);
      break; // salimos del loop
    }
  }

  if (!found) { // si no encontramos ninguna coincidencia
    console.log("La palabra '" + searchTerm + "' no ha sido encontrada en el array");
  }





