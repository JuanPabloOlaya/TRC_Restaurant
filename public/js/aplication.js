var c = 0;
var url_servidor = "http://192.168.64.2/";
// ------------------------------
// Acciones para el proveedor
// ------------------------------

function deleteProvider(id) {
    Swal.fire({
        title: 'Estas seguro que quieres eliminar este proveedor?',
        text: "Despues de aceptar, no se podra revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo'
    }).then((result) => {
        if (result.value) {
            var url = url_servidor + "Proyecto_MVC/Controllers/ProviderController.php?action=delete&id=" + id;
            location.href = url;
            Swal.fire(
                'Borrado!',
                'El proveedor ha sido eliminado de la lista.',
                'Completado!'
            )
        }
    })
}

function updateProvider(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ProviderController.php?action=update&id=' + id;
    location.href = url;
}

function showDetailsProvider(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ProviderController.php?action=detail&id=' + id;
    location.href = url;
}

// ------------------------------
// Acciones para el cliente
// ------------------------------

function deleteClient(id) {
    Swal.fire({
        title: 'Estas seguro que quieres eliminar este cliente?',
        text: "Despues de aceptar, no se podra revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo'
    }).then((result) => {
        if (result.value) {
            var url = url_servidor + "Proyecto_MVC/Controllers/ClientController.php?action=delete&id=" + id;
            location.href = url;
            Swal.fire(
                'Borrado!',
                'El cliente ha sido eliminado de la lista.',
                'Completado!'
            )
        }
    })
}

function showDetailsClient(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ClientController.php?action=detail&id=' + id;
    location.href = url;
}

function updateClient(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ClientController.php?action=update&id=' + id;
    location.href = url;
}

// ------------------------
// Usuario
// ------------------------

function signUp() {
    var url = url_servidor + 'Proyecto_MVC/Controllers/UserController.php?action=insert';
    location.href = url;
}

function logIn() {
    var url = url_servidor + 'Proyecto_MVC/Controllers/UserController.php?action=login';
    location.href = url;
}

function logOut() {
    var url = url_servidor + 'Proyecto_MVC/Controllers/UserController.php?action=logout';
    location.href = url;
}

function deleteUser(id) {
    Swal.fire({
        title: 'Estas seguro que quieres eliminar este usuario?',
        text: "Despues de aceptar, no se podra revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo'
    }).then((result) => {
        if (result.value) {
            var url = url_servidor + "Proyecto_MVC/Controllers/UserController.php?action=delete&id=" + id;
            location.href = url;
            Swal.fire(
                'Borrado!',
                'El usuario ha sido eliminado de la lista.',
                'Completado!'
            )
        }
    })
}

function showDetailsUser(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/UserController.php?action=detail&id=' + id;
    location.href = url;
}

function updateUser(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/UserController.php?action=update&id=' + id;
    location.href = url;
}


// ------------------------
// Factura
// ------------------------

function agregarProductoTabla() {
    var cod_producto = $("#producto").val();
    var producto = $("#producto option:selected").text();
    var cantidad = $("#cantidad").val();

    var arProducto = producto.split(",", 2);

    $("#tablaP").append("<tr id='tr" + c + "'> <td><input type='hidden' name='codigo[]' value='" + cod_producto + "'>" + cod_producto + "</td> <td>" + arProducto[0] + "</td> <td> <input type='hidden' name='precioProducto[]' value='" + arProducto[1] + "'>$ " + arProducto[1] + "</td><td> <input type='hidden' name='cantidad[]' value='" + cantidad + "'>" + cantidad + "</td><td id='subtotal'>$1</td><td><a onclick='$(" + '"' + "#tr" + c + '"' + ").remove()'><i class='trash alternate icon'></i></a> </td></tr>");

    c = c + 1;
}

function showDetailsFactura(cod_fac) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ClienteXProductoController.php?action=detail&cod_fac=' + cod_fac;
    location.href = url;
}

function deleteFactura(cod_fac) {
    Swal.fire({
        title: 'Estas seguro que quieres eliminar esta factura?',
        text: "Despues de aceptar, no se podra revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrala'
    }).then((result) => {
        if (result.value) {
            var url = url_servidor + 'Proyecto_MVC/Controllers/ClienteXProductoController.php?action=delete&cod_fac=' + cod_fac;
            location.href = url;
            Swal.fire(
                'Borrada!',
                'La factura ha sido eliminada de la lista.',
                'Completado!'
            )
        }
    })
}

function printFactura(cod_fac) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ClienteXProductoController.php?action=print&cod_fac=' + cod_fac;
    location.href = url;
}

// ------------------------
// Producto
// ------------------------

function deleteProduct(id) {
    Swal.fire({
        title: 'Estas seguro que quieres eliminar este product?',
        text: "Despues de aceptar, no se podra revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borralo'
    }).then((result) => {
        if (result.value) {
            var url = url_servidor + "Proyecto_MVC/Controllers/ProductController.php?action=delete&id=" + id;
            location.href = url;
            Swal.fire(
                'Borrado!',
                'El producto ha sido eliminado de la lista.',
                'Completado!'
            )
        }
    })
}

function showDetailsProduct(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ProductController.php?action=detail&id=' + id;
    location.href = url;
}

function updateProduct(id) {
    var url = url_servidor + 'Proyecto_MVC/Controllers/ProductController.php?action=update&id=' + id;
    location.href = url;
}