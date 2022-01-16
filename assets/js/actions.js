$(document).ready(function(){
  // CONFIGURAÇÕES VITRINES HOME
    $('.full-banner ul').slick({
      infinite: true,
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000
    });
  // FIM CONFIGURAÇÕES VITRINES HOME

  // CONFIGURAÇÕES DO MAPA NA PÁGINA DE CONTATO
  if($('#mapid').length){
    var mymap = L.map('mapid').setView([-23.711229, -46.4174737], 16);
    
    L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    var marker = L.marker([-23.711229, -46.4174737]).addTo(mymap);
  }
  // FIM CONFIGURAÇÕES DO MAPA NA PÁGINA DE CONTATO

  // NEWSLETTER MODAL HOME
  if($('body.home').length){
    $('.modal-newsletter-home').fadeIn();
  }

  $('.modal-newsletter-home .modal-bg').on('click', function(){
    $('.modal-newsletter-home').fadeOut();
  });

  $('.modal-newsletter-home .close').on('click', function(){
    $('.modal-newsletter-home').fadeOut();
  });
  // FIM NEWSLETTER MODAL HOME
 
  if ($(window).width() < 768) {
    // CONFIGURAÇÕES DO MENU HAMBURGUER MOBILE
      $('.close-menu').on('click', function(){
        $('.menu.box-menu').removeClass('atv');
      });

      $('.hamburguer').on('click', function(){
        $('.menu.box-menu').addClass('atv');
      });

      $('.bg-menu').on('click', function(){
        $('.menu.box-menu').removeClass('atv');
      });

      $('header.elastic .content-header .menu.box-menu #menu-menu-principal>li.menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
        $(this).parent().toggleClass('atv');
      });

      $('header.elastic #menu-menu-principal>.menu-item>.sub-menu>li.menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
        $(this).parent().toggleClass('atv');
      });
    // FIM CONFIGURAÇÕES DO MENU HAMBURGUER MOBILE
  }
});