require('./bootstrap');

const listOrdenes = document.getElementById('listado-ordenes');

const listAlumnos = document.getElementById('listado-alumnos');


window.Echo.channel('orders')
.listen('OrderStatusUpdated' , e => {
    console.log(e);

    var li = document.createElement("li");
    li.appendChild( document .createTextNode(`${e.order.id} - ${e.order.product} `));
    listOrdenes.appendChild( li );

});


window.Echo.channel('alumnos')
.listen('AlumnoStatusUpdated' , e => {
    console.log(e);

    var li = document.createElement("li");
    li.appendChild( document .createTextNode(`${e.alumno.rut} - ${e.alumno.nombres} `));
    listAlumnos.appendChild( li );

});