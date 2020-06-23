"use strict";

/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {
  $("[href]").each(function () {
    if (this.href == window.location.href) {
      $(this).addClass("active");
    }
  });
  var swiper = new Swiper('#slideshow', {
    effect: 'fade',

    /* "fade", "cube", "coverflow" or "flip" */
    loop: true,
    noSwiping: false,
    simulateTouch: false,
    speed: 1000,
    autoplay: {
      delay: 4000
    }
  });
  $('[data-fancybox]').fancybox({
    protect: true,
    autoWidth: true
  });
  /* Smooth Scroll */

  $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(":focus")) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }

          ;
        });
      }
    }
  });
  /*
  *
  *	Wow Animation
  *
  ------------------------------------*/

  new WOW().init();
  $(document).on("click", "#toggleMenu", function () {
    $(this).toggleClass('open');
    $('body').toggleClass('open-mobile-menu');
  });
  /* Stick To Footer To Bottom */

  stickFooterToBottom();

  function stickFooterToBottom() {
    var windowHeight = $(window).height();
    var bodyHeight = $('body').height();

    if (bodyHeight < windowHeight) {
      $("html").addClass('stickToBottom');
    } else {
      $("html").removeClass('stickToBottom');
    }
  }

  $(window).on('resize', function () {
    stickFooterToBottom();
  }); // #####################################     GEt rid of classification if on a higher one.	

  $(function () {
    if (document.location.href.indexOf('kingdom') > -1) {
      $('#phylum').remove();
      $('#class').remove();
      $('#order').remove();
      $('#family').remove();
      $('#genus').remove();
      $('#species').remove();
    }
  });
  $(function () {
    if (document.location.href.indexOf('phylum') > -1) {
      $('#class').remove();
      $('#order').remove();
      $('#family').remove();
      $('#genus').remove();
      $('#species').remove();
    }
  });
  $(function () {
    if (document.location.href.indexOf('class') > -1) {
      $('#order').remove();
      $('#family').remove();
      $('#genus').remove();
      $('#species').remove();
    }
  });
  $(function () {
    if (document.location.href.indexOf('order') > -1) {
      $('#family').remove();
      $('#genus').remove();
      $('#species').remove();
    }
  });
  $(function () {
    if (document.location.href.indexOf('family') > -1) {
      $('#genus').remove();
      $('#species').remove();
    }
  });
  $(function () {
    if (document.location.href.indexOf('genus') > -1) {
      $('#species').remove();
    }
  }); // END  #####################################     GEt rid of classification if on a higher one.	
  // #####################################     Make nav highlight if on url.	
  // If is Biodiversity

  if (window.location.href.indexOf("biodiversity") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("kingdom") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("phylum") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("class") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("order") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("family") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("genus") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  }

  if (window.location.href.indexOf("species") > -1) {
    $('#main-nav .tree-of-life a').addClass("active");
  } // if url classification


  if (window.location.href.indexOf("classification") > -1) {
    // highlight the Biodiversity nav
    $('#main-nav .tree-of-life a').addClass("active"); //remove contents in all these divs "all-classifications 

    $('#kingdom, #phylum, #class, #order, #family, #genus, #species').remove();
  }

  if (window.location.href.indexOf("biology") > -1) {
    $('#main-nav .biology a').addClass("active");
  }

  if (window.location.href.indexOf("blog") > -1) {
    $('#main-nav .our-blog a').addClass("active");
  }

  if (window.location.href.indexOf("filmmaking") > -1) {
    $('#main-nav .how-to-filmmaking a').addClass("active");
  } //  END  #####################################     Make nav highlight if on url.


  $('.homepage-thumb').mouseenter(function () {
    $(this).find('.homepage-thumb-title-slider').animate({
      bottom: '0px'
    }, "fast");
  });
  $('.homepage-thumb').mouseleave(function () {
    $(this).find('.homepage-thumb-title-slider').animate({
      bottom: '-80px'
    }, "fast");
  }); // These are all the Sub Nav Hovers we need.

  $('li.fungi').mouseenter(function () {
    $(this).append("<div class='nav-message mess-fungi'>Fungi</div>");
  });
  $('li.fungi').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.microbes').mouseenter(function () {
    $(this).append("<div class='nav-message mess-microbes'>Microbes</div>");
  });
  $('li.microbes').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.plants').mouseenter(function () {
    $(this).append("<div class='nav-message mess-plants'>Plants</div>");
  });
  $('li.plants').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.plantbio').mouseenter(function () {
    $(this).append("<div class='nav-message mess-plantbio'>Plants</div>");
  });
  $('li.plantbio').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.invertebrates').mouseenter(function () {
    $(this).append("<div class='nav-message mess-invertebrates'>Invertebrates</div>");
  });
  $('li.invertebrates').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.fish').mouseenter(function () {
    $(this).append("<div class='nav-message mess-fish'>Fish</div>");
  });
  $('li.fish').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.reptiles').mouseenter(function () {
    $(this).append("<div class='nav-message mess-reptiles'>Reptiles</div>");
  });
  $('li.reptiles').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.mammals').mouseenter(function () {
    $(this).append("<div class='nav-message mess-mammals'>Mammals</div>");
  });
  $('li.mammals').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.birds').mouseenter(function () {
    $(this).append("<div class='nav-message mess-birds'>Birds</div>");
  });
  $('li.birds').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.amphibians').mouseenter(function () {
    $(this).append("<div class='nav-message mess-amphibians'>Amphibians</div>");
  });
  $('li.amphibians').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.arthropods').mouseenter(function () {
    $(this).append("<div class='nav-message mess-arthropods'>Arthropods</div>");
  });
  $('li.arthropods').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.human').mouseenter(function () {
    $(this).append("<div class='nav-message mess-humans'>Humans</div>");
  });
  $('li.human').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.evolution').mouseenter(function () {
    $(this).append("<div class='nav-message mess-evolution'>Evolution</div>");
  });
  $('li.evolution').mouseleave(function () {
    $('.nav-message').remove(); // console.log('sadf');
  });
  $('li.ecology').mouseenter(function () {
    $(this).append("<div class='nav-message mess-ecology'>Ecology</div>");
  });
  $('li.ecology').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.cells').mouseenter(function () {
    $(this).append("<div class='nav-message mess-cells'>Cells</div>");
  });
  $('li.cells').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.biomes').mouseenter(function () {
    $(this).append("<div class='nav-message mess-biomes'>Biomes</div>");
  });
  $('li.biomes').mouseleave(function () {
    $('.nav-message').remove();
  });
  $('li.genetics').mouseenter(function () {
    $(this).append("<div class='nav-message mess-genetics'>Genetics</div>");
  });
  $('li.genetics').mouseleave(function () {
    $('.nav-message').remove();
  }); // Let's do some blog rollovers...

  $('.blog-square').mouseenter(function () {
    /*$('.blog-featured-image').animate({opacity: .5});*/
    $(this).children('.blog-featured-image').stop(false, true).animate({
      marginTop: -5
    }, "fast");
  });
  $('.blog-square').mouseleave(function () {
    $(this).children('.blog-featured-image').stop(false, true).animate({
      marginTop: 0
    }, "fast");
  }); // Let's change some breadcrumb url's...

  $("a[href='http://www.untamedscience.com/blog/']").attr('href', 'http://www.untamedscience.com/our-blog');
  $("a[href='http://www.untamedscience.com/filmmaking/']").attr('href', 'http://www.untamedscience.com/how-to-filmmaking/');
  $("a[href='http://www.untamedscience.com/biology/']").attr('href', 'http://www.untamedscience.com/world-biology/');
  $("a[href='http://www.untamedscience.com/biodiversity/']").attr('href', 'http://www.untamedscience.com/tree-of-life/'); // init Isotope
  // var $grid = $('#alpha').imagesLoaded( function() {
  //   // init Isotope after all images have loaded
  //   $grid.isotope({
  //     // options...
  //     itemSelector: '.blog-square',
  // 	animationEngine: 'best-available',
  //   });
  // });
}); // END #####################################    END