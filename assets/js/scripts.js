document.addEventListener( 'DOMContentLoaded', function() {
  var $ = jQuery;

  var introSlider = document.getElementsByClassName('intro-splide').length;
  var recommendedProductsSlider = document.getElementsByClassName('recommended-products-splide').length;

  if (introSlider) {
    var introSplide = new Splide( '.intro-splide', {
      type: "slide",
      perPage: 1,
      autoplay: true,
    });
    
    introSplide.mount();
  }

  if (recommendedProductsSlider) {
    var recommendedProductsSlider = new Splide( '.recommended-products-splide', {
      type: "slide",
      perMove: 1,
      perPage: 1,
      gap: 21,
      // fixedWidth: '286px',
      arrows: true,
      autoplay: true,
      rewind: false,
      pagination: true,
      mediaQuery: 'min',

      breakpoints: {
        540: {
          perPage: 2,
        },

        768: {
          perPage: 3,
        },

        992: {
          perPage: 3,
          gap: 42,
        },

        1200: {
          perPage: 4,
        },

        1400: {
          perPage: 5,
        },
      }
    });
    
    recommendedProductsSlider.mount();
  }

} );