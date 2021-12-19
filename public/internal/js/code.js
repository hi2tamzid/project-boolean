let error_msg = document.querySelectorAll('.err');
error_msg.forEach(item => {
  let temp = item.innerHTML;
  item.innerHTML = '<i class="fas fa-exclamation-circle"></i>'+temp;

});