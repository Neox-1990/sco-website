
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./../../../node_modules/popper.js/dist/umd/popper.js');
require('./bootstrap');
window.easteregg = '********************\nActivate epic for epicness\n********************\nActivate useless for useless information @ home\n********************';
import * as myTeamHelper from './helper/myteamhelper.js';
import {tablesorterInit, tablesorter} from './helper/tablesorter.js';
import {toggleTeamTables, toggleTeamTablesInit, changeTeamStatusInit, changeTeamStatus} from './helper/adminhelper.js';
import {resultToggleInit, resultToggle} from './helper/resulthelper.js';
import * as iRatingloader from './helper/iratingloader.js';
import * as adminSettingsUpdater from './helper/settinghelper.js';

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
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
  iRatingloader.initIRloader();
  adminSettingsUpdater.init();
  if(typeof(numbers) !== 'undefined'){
    myTeamHelper.updateNumbers();
    $('#car').on('change', myTeamHelper.updateNumbers);
  }

  $('#add-driver-form').on('click',myTeamHelper.addDriverForm);

  $('#loadoldteam').on('click',myTeamHelper.loadOldTeam);
  $('.clear_driver').on('click', myTeamHelper.clearDriver);
});
