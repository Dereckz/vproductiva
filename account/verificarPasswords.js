function verificarPasswords() {
 
     
// Ontenemos los valores de los campos de contraseñas 
pass1 = document.getElementById('password');
pass2 = document.getElementById('confirmpassword');

if (pass1.value != pass2.value) {
 
    // Si las constraseñas no coinciden mostramos un mensaje
    document.getElementById("error").classList.add("mostrar");
 
    return false;
}
 
}