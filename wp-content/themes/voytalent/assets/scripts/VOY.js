
// VOY imports - all JS
//
// SCRIPTS - Helpers
//

function voyDebounce(func, wait = 10, immediate = true) {
  let timeout;
  return function() {
    let context = this, args = arguments;
    let later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    let callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};


(function() {
    // COOKIES

    const VOY = window.VOY || {};

    VOY.helpers.isMobile = function() {
        if (window.matchMedia('only screen and (max-width:767px)').matches) {
            return true;
        }
        return false;
    };

}());


;
//include('VOY.polyfills.js');



// Sections
(function(window) {
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // //// PATTERN
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
        const VOY = window.VOY || {};

        VOY.sections.header = {
            el: 's-header',
            navBarInitOffset: null,
            wpAdminBarHeight: null,

            init(){
                // Calculate offsets
                //VOY.partials.header.adminBarHeight = $('#wpadminbar').height();
                //VOY.partials.header.navBarInitOffset = $('.header-bottom').offset().top;

                //Init function calls
                VOY.sections.header.openSearch();
                VOY.sections.header.closeSearch();
                VOY.sections.header.toggleMobileMenu();
                VOY.sections.header.tightHeader();
                VOY.sections.header.stickyBreadcrumbs();


            },
            openSearch() {
              document.querySelector('#toggle-search').onclick = function() {
                document.body.classList.toggle('-visible-search');
                document.getElementById("search-input").focus();
              };
            },
            closeSearch() {
              document.querySelector('#search-input').onblur = function() {
                document.body.classList.remove('-visible-search');
              };
            },
            toggleMobileMenu() {
              document.querySelector('#toggle-mobile-menu').onclick = function() {
                document.body.classList.toggle('-visible-mobile-menu');
              };
            },
            tightHeader() {

              h = document.querySelector('.s-header')
              hh = h.offsetHeight
              wy = window.scrollY

              if(!VOY.helpers.isMobile()) {

                if (wy < hh) {
                  h.classList.remove('-is-tight');
                  document.body.classList.remove('-header-is-tight');
                  document.body.classList.remove('-breadcrumb-no-image');
                  document.body.classList.remove('-visible-search');
                } else {
                  h.classList.add('-is-tight');
                  document.body.classList.add('-header-is-tight');
                }

                scrollPos = wy;

              } else {
                h.classList.remove('-is-tight');
                document.body.classList.remove('-breadcrumb-no-image');
                document.body.classList.remove('-header-is-tight');
              }

            },


            stickyBreadcrumbs() {


              h = document.querySelector('.s-header')
              hh = h.offsetHeight
              b = document.querySelector('.s-breadcrumbs')
              f = document.querySelector('.s-featured-image')
              fh = 0
              ft = 0
              wy = window.scrollY

              if (document.body.classList.contains('-has-featured-image')){


                // IF IMAGE
                if (f) {
                  fh = f.offsetHeight
                  ft = f.offsetTop
                }

                trigger = (ft + fh) - hh

                if(!VOY.helpers.isMobile()) {

                  if (wy < trigger) {
                    b.classList.remove('-sticky');
                  } else {
                    b.classList.add('-sticky');
                  }

                  scrollPos = wy;

                } else {
                  h.classList.remove('-sticky');
                }



              } else {

                // IF NO IMAGE
                document.body.classList.add('-breadcrumb-no-image');

              }



            },

            resizeCleanUp() {
              document.body.classList.remove('-visible-search');
              document.body.classList.remove('-visible-mobile-menu');
            },

        };

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    //  if element don't exist, don't go further
        if (!document.getElementsByClassName(VOY.sections.header.el).length) {
            return;
        }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    // SCROLL
    /////////////////////////////////////////////////////////////////////////////////////////////////////

    //     $(window).scroll(() => {
    //         VOY.partials.header.stickyBlogNavbar();
    //     });

      window.addEventListener('scroll', function(e) {

        voyDebounce(VOY.sections.header.tightHeader());
        voyDebounce(VOY.sections.header.stickyBreadcrumbs());

      });

    // // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // // //// READY
    // // ///////////////////////////////////////////////////////////////////////////////////////////////////////

      document.addEventListener('DOMContentLoaded', function(){
          VOY.sections.header.init();
      }, false);


    /////////////////////////////////////////////////////////////////////////////////////////////////////
    // LOAD
    /////////////////////////////////////////////////////////////////////////////////////////////////////

      let reWi = 0;

      window.onload = function(){
        // Set inital width
        reWi = window.innerWidth;

        console.log('onload');



    // function documentWidth() {
    //   dw = document.documentElement.clientWidth
    //   console.log('dw global -> ' + dw)
    // }
    // function documentHeight() {
    //   dw = document.documentElement.clientHeight
    // }

    // window.addEventListener('resize', VOY.helpers.debounce(documentWidth));
    // window.addEventListener('resize', VOY.helpers.debounce(documentHeight));



      }


    // // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // // //// RESIZE
    // // ///////////////////////////////////////////////////////////////////////////////////////////////////////


      window.addEventListener('resize', function(e) {
        if (reWi !== window.innerWidth) {
            // Code here
            voyDebounce(VOY.sections.header.tightHeader());
            voyDebounce(VOY.sections.header.resizeCleanUp());

            // Set the new window width
            reWi = window.innerWidth;
        }
      });

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // ///////////////////////////////////////////////////////////////////////////////////////////////////////
    }(window));
;


