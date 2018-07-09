export const tablesorterInit = function(){
  $('.sco-table-sort').on('click',tablesorter).append('<span class="ml-3 sco-sort-icon"><i class="fas fa-sort-down " aria-hidden="true"></i></span>');
}
export const tablesorter = function(){
  const column = $(this).index();
  const sort_content = $(this).attr('data-sort-content');
  var dir = 0;
  if($(this).attr('data-sort-dir') == 'asc'){
    dir = 1;
    $(this).attr('data-sort-dir', 'desc');
    $(this).find('.sco-sort-icon').empty().append('<i class="fas fa-sort-up" aria-hidden="true"></i>');
  }else{
    dir = -1;
    $(this).attr('data-sort-dir', 'asc');
    $(this).find('.sco-sort-icon').empty().append('<i class="fas fa-sort-down " aria-hidden="true"></i>');
  }
  var table = $(this).parent().parent().parent().find('tbody').first();
  var rows = table.find('tr').get();
  table.empty();
  rows.sort(function(a,b){
    var aVal, bVal;
    if(sort_content == 'text'){
      aVal = $(a).find('td:nth-child('+(column+1)+')').text();
      bVal = $(b).find('td:nth-child('+(column+1)+')').text();
    }else if (sort_content == 'date') {
      aVal = $(a).find('td:nth-child('+(column+1)+')').attr('data-sort-date');
      bVal = $(b).find('td:nth-child('+(column+1)+')').attr('data-sort-date');
    }else if(sort_content == 'numeric'){
      aVal = parseFloat($(a).find('td:nth-child('+(column+1)+')').text());
      bVal = parseFloat($(b).find('td:nth-child('+(column+1)+')').text());
    }

    return (aVal>bVal?dir:(aVal==bVal?0:-dir));
  });
  table.append(rows);
}
