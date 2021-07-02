
function deleteRegister(vista, id) {
    var resultado = window.confirm('¿Quieres eliminar el registro ' + id + '?');
    if (resultado === true) {
        window.location.href = "index.php?c="+vista+"&a=eliminar&id="+id;
    }
}