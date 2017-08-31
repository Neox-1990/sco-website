
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Popper=require('./../../../node_modules/popper.js/dist/umd/popper.js');
require('./bootstrap');

import {updateNumbers, addDriverForm} from './helper/myteamhelper.js';
import {tablesorterInit, tablesorter} from './helper/tablesorter.js';

$(document).ready(function(){
  $('#flash_message').delay(200).fadeIn(500,function(){
    /*$(this).delay(5000).fadeOut(500,function(){
      $(this).remove();
    });*/
  });
  $('#flash_message>button.close').on('click', function(){
    $(this).parent().fadeOut(500,function(){
      $(this).remove();
    });
  })
  tablesorterInit();
  if(typeof(numbers) !== 'undefined'){
    updateNumbers();
    $('#car').on('change', updateNumbers);
  }

  $('#add-driver-form').on('click',addDriverForm);
});
