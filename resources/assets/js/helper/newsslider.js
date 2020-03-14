export function init(){
  $('#news.sco-news-carousel').carousel({
    interval: 15000,
    ride: true,
    wrap: true,
    touch: true
  }).on('slid.bs.carousel', lazyLoad);

  lazyLoad();

}

export function lazyLoad(){
  let current = $('#news.sco-news-carousel .carousel-item.active');
  let next = current.next().children('img').first();
  let prev = current.prev().children('img').first();

  if(prev.length == 0){
    
  }

  current = current.children('img').first();

  current.attr('src', current.attr('data-imgsrc'));
  next.attr('src', next.attr('data-imgsrc'));
  prev.attr('src', prev.attr('data-imgsrc'));
}
