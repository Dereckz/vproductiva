function validarPassword(){
var pass=document.getElementById('password').value;
var confi_pass=document.getElementById('confirmpassword').value;

if(pass===confi_pass){
  document.getElementById('recibido').innerHTML ="Password: "+confi_pass+ "coinciden correctamente";

}else{
  document.getElementById('recibido').innerHTML ="Password: no valido";

}


}

document.getElementById('confirmpassword').addEventListener('click', validarPassword);