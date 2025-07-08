  /**
   * Main JS
   *
   * @summary   The Main JS for WP Theme, refer to
   *            the webpack config for other files
   */

/* slider stuff */

$(document).on('ready', function() {
  $(".vertical-center-4").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 4,
    slidesToScroll: 2
  });
  $(".vertical-center-3").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".vertical-center-2").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 2,
    slidesToScroll: 2
  });
  $(".vertical-center").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    arrows: true,
//    loop: true,
//    infinite: true,
    dots: true,
//    autoplay: true,
//    autoplaySpeed: 3500,
    dotsClass: 'custom_paging',
    customPaging: function (slider, i) {
        console.log(slider);
        return  (i + 1) + '/' + slider.slideCount;
    }
  });
  $(".vertical").slick({
    dots: true,
    vertical: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".regular").slick({
    dots: false,
    infinite: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000
  });
  $(".center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
    slidesToScroll: 3
  });
  $(".variable").slick({
    dots: false,
    arrows: true,
    infinite: true,
    variableWidth: true,
    slidesToShow: 2,
    slidesToScroll: 1,
  });
  $(".variable-width").slick({
    dots: true,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
  });
  $(".lazy").slick({
    lazyLoad: 'ondemand', // ondemand progressive anticipated
    infinite: false,
    dots: true,
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
      responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1008,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $('.continuous').slick({
    speed: 8000,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
  });  
  
});



$(document).ready(function(){    
    
    
    $('.one-time').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});
    
    
  /* fade in scroll */


       $(window).scroll(function(){
         inViewport();
       });

       $(window).resize(function(){
         inViewport();
       });


      function inViewport(){
         $('.fade-in').each(function(){
             var divPos = $(this).offset().top,
                   topOfWindow = $(window).scrollTop();

             if( divPos < topOfWindow+(window.innerHeight)*0.7 ){
                 $(this).addClass('visible');
             }
         });        

         $('.staggered_section').each(function(){
            var divPos = $(this).offset().top,
                  topOfWindow = $(window).scrollTop();

            if( divPos < topOfWindow+(window.innerHeight)*1 ){
                $(this).addClass('change');
            }
          });        


    }	

    

    
	$('a[href*="#"]:not([href="#"])').click(function() {
      var target = $(this.hash);
        $('html,body').stop().animate({
          scrollTop: target.offset().top - 120
        }, 1000, 'linear');   
  });    
    if (location.hash){
    var id = $(location.hash);
    }
    $(window).on('load', function() {
    if (location.hash){
        $('html,body').animate({scrollTop: id.offset().top -120}, 'linear')
    };
    });
	
	


	$("#play-button").click(function(){
        $(".video-container").addClass('active');
		$("#play-button").hide();
		$("#pause-button").show();		
	});

	$("#pause-button").click(function(){
        $(".video-container").removeClass('active');
		$("#pause-button").hide();
		$("#play-button").show();
	});

    
    
  $(".accordion .flex_wrap").click(function(){
    if ($(this).hasClass("open")) {
      $(".flex_wrap").removeClass('open');
    } else{
      $(".accordion .flex_wrap").removeClass('open');
      $(this).addClass('open');
    }
});

$(".menu_icon").click(function(){
  $(this).toggleClass('active');
  $('body').toggleClass('no-scroll');
  $(".mobile_nav").toggleClass('active');
});
  
$(".stag_trig .flex_start").click(function(){
  $(".stag_trig").toggleClass('open');
  $(".flex_wrap").removeClass('open');
});


// archive page filters

$(".cat_all").click(function(){
  $(".loop_news").removeClass('active');
  $(".loop_view").removeClass('active');
  $(".loop_event").removeClass('active');
  $(".loop_all").addClass('active');
  $(".cat_loop a").removeClass('active');
  $(this).addClass('active');
});

$(".cat_news").click(function(){
  $(".loop_all").removeClass('active');
  $(".loop_view").removeClass('active');
  $(".loop_event").removeClass('active');
  $(".loop_news").addClass('active');
  $(".cat_loop a").removeClass('active');
  $(this).addClass('active');
});

$(".cat_views").click(function(){
  $(".loop_all").removeClass('active');
  $(".loop_news").removeClass('active');
  $(".loop_event").removeClass('active');
  $(".loop_view").addClass('active');
  $(".cat_loop a").removeClass('active');
  $(this).addClass('active');
});

$(".cat_events").click(function(){
  $(".loop_all").removeClass('active');
  $(".loop_view").removeClass('active');
  $(".loop_news").removeClass('active');
  $(".loop_event").addClass('active');
  $(".cat_loop a").removeClass('active');
  $(this).addClass('active');
});


// publications flex filters
  
$(".category-all").click(function(){
  $(".Article").removeClass('hide');
  $(".Report").removeClass('hide');
  $(".Method").removeClass('hide');

  $(this).addClass('active');
  $(".category-article").removeClass('active');
  $(".category-report").removeClass('active');
  $(".category-method").removeClass('active');
});
  


$(".category-method").click(function(){
  $(".Article").addClass('hide');
  $(".Report").addClass('hide');
  $(".Method").removeClass('hide');

  $(this).addClass('active');
  $(".category-article").removeClass('active');
  $(".category-report").removeClass('active');
  $(".category-all").removeClass('active');
});

$(".category-article").click(function(){
  $(".Article").removeClass('hide');
  $(".Report").addClass('hide');
  $(".Method").addClass('hide');

  $(this).addClass('active');
  $(".category-method").removeClass('active');
  $(".category-report").removeClass('active');
  $(".category-all").removeClass('active');
});

$(".category-report").click(function(){
  $(".Article").addClass('hide');
  $(".Report").removeClass('hide');
  $(".Method").addClass('hide');

  $(this).addClass('active');
  $(".category-article").removeClass('active');
  $(".category-method").removeClass('active');
  $(".category-all").removeClass('active');
});
  

  
function waitForElement(id, callback){
  var poops = setInterval(function(){
    if(document.getElementById(id)){
      clearInterval(poops);
      callback();
    }
  }, 100);
}

waitForElement("projectplayer", function(){
  var iframe = document.getElementById('projectplayer');

  // $f == Froogaloop
  var player = $f(iframe);

  // bind events
  var playButton = document.getElementById("play-button");
  playButton.addEventListener("click", function() {
    player.api("play");
  });

  var pauseButton = document.getElementById("pause-button");
  pauseButton.addEventListener("click", function() {
    player.api("pause");
  });
});
	
$(window).scroll(function () {
  var scrollTop = 200;
  if ($(window).scrollTop() >= scrollTop) {
    $(".top_arrow").addClass("fadein");
  }
  if ($(window).scrollTop() < scrollTop) {
    $(".top_arrow ").removeClass("fadein");
  }
});

	// make the site logo change on scroll

	$(window).scroll(function () {
    var scrollTop = 300;
    if ($(window).scrollTop() >= scrollTop) {
      $(".logo_big").addClass("hide");
      $(".logo_small").addClass("show");
      $(".logo_small_mob").addClass("show");
      $("header").addClass("show");
    }
    if ($(window).scrollTop() < scrollTop) {
      $(".logo_big").removeClass("hide");
      $(".logo_small").removeClass("show");
      $(".logo_small_mob").removeClass("show");
      $("header").removeClass("show");
    }
  });
});

// hide page H1 on scroll

// $(window).on('scroll', function() {
//   var scrollPosition = $(window).scrollTop();
//   var offsetValue = $('body').offset().top - 900; 
//   if (scrollPosition >= offsetValue) {
//     console.log('testing');
//     $('.page_header_title_wrap').addClass('hide');
//   } else {
//     $('.page_header_title_wrap').removeClass('hide');

//   }
// });


// let animation = anime({
//   targets: '.page_title',
//   // Properties 
//   translateX: 100,
//   borderRadius: 50,
//   // Property Parameters
//   duration: 2000,
//   easing: 'linear',
//   // Animation Parameters
//   direction: 'alternate'
// });  


// let animation = anime({
//   targets: '.page_title',
//   opacity: 1,
//   translateY: 50, 
//   rotate: {
//     value: 360,
//     duration: 2000,
//     easing: 'easeInExpo'
//   },
// });                


// anime.timeline({loop: true})
//   .add({
//     targets: '.page_title',
//     scale: [0, 1],
//     duration: 1500,
//     elasticity: 600,
//     delay: (el, i) => 45 * (i+1)
//   }).add({
//     targets: '.ml9',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   });




  // Function to update the scale based on scroll position

// function updateScaleOnScroll() {
  // Calculate the new scale based on scroll position
  // const scrollY = window.scrollY;
  // const scale = 1 - (scrollY / 1000); // Adjust the divisor as needed

  // Use anime.js to animate the scale property
  // anime({
   //  targets: '.page_title',
    // scale: scale,
    // duration: 0, // Instantaneous change
 //  });
// }
// Add a scroll event listener to trigger the scale update
// window.addEventListener('scroll', updateScaleOnScroll);

// Call the function initially to set the initial scale
// updateScaleOnScroll();




// adding scale when scroll to top of images

// const elementsToAnimate = document.querySelectorAll('.slick-slide');

// // Function to handle intersection events
// function handleIntersection(entries, observer) {
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       // Element is in the viewport, animate it
//       anime({
//         targets: entry.target,
//         scale: 1, // Scale to full size
//         opacity: 1, // Make it visible
//         duration: 1000, // Adjust the duration as needed
//         easing: 'easeOutExpo', // Choose your desired easing function
//       });

//       // Remove the observer to animate it only once
//       observer.unobserve(entry.target);
//     }
//   });
// }

// // Create an Intersection Observer
// const observer = new IntersectionObserver(handleIntersection, {
//   root: null, // Use the viewport as the root
//   rootMargin: '0px', // No margin
//   threshold: 0.5, // Trigger when 50% of the element is in the viewport
// });

// // Observe each element to trigger the animation when they enter the viewport
// elementsToAnimate.forEach((element) => {
//   observer.observe(element);
// });



// on a loop

// anime.timeline({loop: true})
//   .add({
//     targets: '.page_header_title_wrap .title_wrap .letter',
//     scale: [0, 1],
//     duration: 1500,
//     elasticity: 600,
//     delay: (el, i) => 45 * (i+1)
//   }).add({
//     targets: '.ml9',
//     opacity: 0,
//     duration: 1000,
//     easing: "easeOutExpo",
//     delay: 1000
//   });





// // Function to handle intersection events
// function handleIntersection(entries, observer) {
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       // Wrap every letter in a span
//       var textWrapper = document.querySelector('.title_wrap .page_title');
//       textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<h1 class='letter'>$&</h1>");

//       // Element is in the viewport, start the animation
//       startAnimation();
      
//       // Remove the observer to trigger the animation only once
//       observer.unobserve(entry.target);
//     }
//   });
// }

// // Create an Intersection Observer
// const observer = new IntersectionObserver(handleIntersection, {
//   root: null, // Use the viewport as the root
//   rootMargin: '0px', // No margin
//   threshold: 0, // Trigger when the element enters the viewport
// });

// // Observe the element you want to animate
// const elementToAnimate = document.querySelector('.title_wrap');

// if (elementToAnimate) {
//   observer.observe(elementToAnimate);
// }

// // Function to start the animation using anime.js
// function startAnimation() {
//   anime.timeline()
//     .add({
//       targets: '.title_wrap .letter',
//       scale: [0, 1],
//       duration: 1500,
//       elasticity: 600,
//       delay: (el, i) => 45 * (i + 1)
//     });
// }





// // Function to handle intersection events for each .two_col_text_title element
// function newHandleIntersection(entries, observer) {
//   entries.forEach((entry) => {
//     if (entry.isIntersecting) {
//       const twoColTextWrapper = entry.target;
//       const textContent = twoColTextWrapper.textContent;

//       // Create an array of characters, including spaces
//       const charArray = textContent.split('').map(char => {
//         if (char === ' ') {
//           return '<h3 class="letter">&nbsp;</h3>';
//         } else {
//           return `<h3 class="letter">${char}</h3>`;
//         }
//       });

//       // Set the innerHTML to the array and join it
//       twoColTextWrapper.innerHTML = charArray.join('');

//       // Element is in the viewport, start the animation
//       startNewAnimation(twoColTextWrapper);

//       // Remove the observer to trigger the animation only once
//       observer.unobserve(entry.target);
//     }
//   });
// }

// // Function to start the animation using anime.js for each .two_col_text_title element
// function startNewAnimation(element) {
//   anime.timeline()
//     .add({
//       targets: element.querySelectorAll('.letter'),
//       scale: [0, 1],
//       duration: 1500,
//       elasticity: 600,
//       delay: (el, i) => 45 * (i + 1)
//     });
// }

// // Create an Intersection Observer for each .two_col_text_title element
// const twoColTextWrappers = document.querySelectorAll('.two_col_text_title');

// twoColTextWrappers.forEach(twoColTextWrapper => {
//   const newObserver = new IntersectionObserver(newHandleIntersection, {
//     root: null, // Use the viewport as the root
//     rootMargin: '0px', // No margin
//     threshold: 0, // Trigger when the element enters the viewport
//   });

//   if (twoColTextWrapper) {
//     newObserver.observe(twoColTextWrapper);
//   }
// });
