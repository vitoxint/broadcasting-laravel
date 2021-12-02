require('./bootstrap');

const listOrdenes = document.getElementById('listado-ordenes');





window.Echo.channel('orders')
.listen('OrderStatusUpdated' , e => {
    console.log(e);

    var li = document.createElement("li");
    li.appendChild( document .createTextNode(e.order.id + e.order.product));
    listOrdenes.appendChild( li );
});