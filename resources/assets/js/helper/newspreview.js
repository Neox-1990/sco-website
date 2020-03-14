export function init(){
  $('#news-preview').on('click', preview);
}

export function preview(){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  let previewRequest = $.post(`/ajax/newspreview`, {'text': $('textarea#body').val()});
  previewRequest.done(function(data){
    let text = data[0];
    $('#preview-section .markdown-article').first().empty();
    $('#preview-section .markdown-article').first().html(text);
  });
}
