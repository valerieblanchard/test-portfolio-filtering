/**
 * Ajout du JavaScript isotope sur le portfolio.
 * Attention a bien récupérer les classes de la structure html mise en place dans archive-realisation.php
 */
jQuery(function($) {
  $(window).load(function() {

    function pixi_portfolio_isotope() {
      var $container = $('#portfolio-list');
      $container.isotope({
      itemSelector: '.item-portfolio',
      percentPosition: true,
      masonry: {
        columnWidth: '.item-sizer',
      },
      });
    }
    pixi_portfolio_isotope();

    $('.filter a').click(function() {
      var selector = $(this).attr('data-filter');
      $('#portfolio-list').isotope({ filter: selector });
      $(this).parents('ul').find('a').removeClass('active');
      $(this).addClass('active');
      return false;
    });

  });
});
