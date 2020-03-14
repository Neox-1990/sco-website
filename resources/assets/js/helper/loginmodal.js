export function init(){
  $('#loginmodal #loginmodal_toggle').on('click', ()=>{
    if($('#loginmodal #loginmodal_login').hasClass('d-none')){
      $('#loginmodal #loginmodaltitle').text('Login');
    }else{
      $('#loginmodal #loginmodaltitle').text('Register');
    }

    $('#loginmodal #loginmodal_login').toggleClass('d-none');
    $('#loginmodal #loginmodal_register').toggleClass('d-none');
  });
}
