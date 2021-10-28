
// Funcion JavaScript para la conversion a mayusculas
function mayusculas(e) {
    e.value = e.value.toUpperCase();
}

let d = new Date();
let days = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
let months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
document.getElementById("date1").value = `${days[d.getDay()]} ${d.getDate()}/${months[d.getMonth()]}/${d.getFullYear()}/${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;