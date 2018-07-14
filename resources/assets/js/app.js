
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./../../../node_modules/popper.js/dist/umd/popper.js');
require('./bootstrap');
window.easteregg = '********************\nActivate epic for epicness\n********************\nActivate useless for useless information @ home\n********************';
import {updateNumbers, addDriverForm, loadOldTeam, clearDriver} from './helper/myteamhelper.js';
import {tablesorterInit, tablesorter} from './helper/tablesorter.js';
import {toggleTeamTables, toggleTeamTablesInit, changeTeamStatusInit, changeTeamStatus} from './helper/adminhelper.js';
import {resultToggleInit, resultToggle} from './helper/resulthelper.js';

$(document).ready(function(){
  $('#flash_message').slideDown(150,function(){
    $(this).delay(10000).slideUp(150,function(){
      $(this).remove();
    });
  });
  $('#flash_message button.close').on('click', function(){
    $(this).parent().remove();
  })
  tablesorterInit();
  toggleTeamTablesInit();
  resultToggleInit();
  changeTeamStatusInit();
  if(typeof(numbers) !== 'undefined'){
    updateNumbers();
    $('#car').on('change', updateNumbers);
  }

  $('#add-driver-form').on('click',addDriverForm);

  $('#loadoldteam').on('click',loadOldTeam);
  $('.clear_driver').on('click', clearDriver);
});
