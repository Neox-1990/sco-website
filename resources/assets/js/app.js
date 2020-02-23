
window.$ = window.jQuery = require('jquery');
window.Hammer = require('hammerjs')
require('popper.js');
require('bootstrap');
import * as MainNav from './helper/mainnav.js';
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
  });
  MainNav.mainnavInit();
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
