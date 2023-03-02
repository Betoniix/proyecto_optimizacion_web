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