jQuery(document).ready(function() {
  jQuery('#portfolio-section').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 2,
          nav: false
        },
        1000: {
          items: 3,
          nav: true,
          loop: false,
          margin: 20
        }
      }
    });
  jQuery('#testimonial-section').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        
      },
      767: {
        items: 1,
       
      },
      768: {
        items: 2,
       
      },

      1000: {
        items: 3,
        
        margin: 20
      }
    }
  });
  jQuery(window).load(function() {
    jQuery(".preloader-block").delay(400).fadeOut(500),jQuery("#page_effect").delay(400).fadeIn(400);
})  
})
