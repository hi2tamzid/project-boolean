// Show password function

function showPassword() {
  var password = document.getElementById('pwd');
  var show_pass_icon = document.querySelector('.pass_btn_icon');
  if (password.type === 'password') {
    password.type = "text";
    show_pass_icon.classList.add('fa-eye-slash');
    show_pass_icon.classList.remove('fa-eye'); 
    
  }
  else {
    password.type = "password";
    show_pass_icon.classList.remove('fa-eye-slash');
    show_pass_icon.classList.add('fa-eye'); 
  }
}