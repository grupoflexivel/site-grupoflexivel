$(document).ready(function() {

  var $url = $('body').data('url');

  $('body').on('click', '#header a', function(e){    
    $('#menu__toggle').prop('checked', false);
  });

  $('body').on('click', '#header a', function(e){    
    var elem = $(this);
    $('#header a').removeClass('active');
    elem.addClass('active');
  });
  
  $('body').on('click', '[data-video]', function(e){
    e.preventDefault();
    var elem = $(this);
    var $src = elem.data('video');
    var $container = elem.data('container');
    $($container).html('<iframe src="' + $src + '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
  });

  AOS.init({
    once: true,
  });

});

window.addEventListener('scroll', function() {
  let scrollPosition = window.pageYOffset;

  if(scrollPosition < 100){
    $('#banner').addClass('down');
  }else{
    $('#banner').removeClass('down');    
  }
  
});
