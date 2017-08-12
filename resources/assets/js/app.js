
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){
  $('#flash_message').delay(200).fadeIn(500,function(){
    $(this).delay(5000).fadeOut(500,function(){
      $(this).remove();
    });
  });
});
