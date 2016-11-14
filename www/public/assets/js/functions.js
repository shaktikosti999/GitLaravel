;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	$doc.ready(function() {

		// date picker
		$( '[data-date]' ).datepicker();


		$win.on('scroll', function() {
			var winT = $win.scrollTop();

			if ( winT > + 20 ) {
				$('.header').addClass('fixed')
			} else {
				$('.header').removeClass('fixed')
			};
		});

		// scrollChange
		function scrollChange() {
			var elScroll,
				iconScroll;

			function getScroll() {
				elScroll = $( '.shell-btn' ).offset().top;
				iconScroll = $( '.icon-wrapper' ).offset().top;
				console.log( elScroll, iconScroll );

				if ( elScroll >= ( iconScroll - 50 ) ) {
					$( '.list-buttons' ).addClass( 'list-buttons--change' );
				} else {
					$( '.list-buttons' ).removeClass( 'list-buttons--change' );
				}

				if( elScroll >= iconScroll ) {
					$( '.list-buttons' ).css({
						opacity: 0,
						display: 'none'
					});
				} else {
					$( '.list-buttons' ).css({
						opacity: 1,
						display: 'block'
					});
				}
			}

			$( window ).on( 'scroll', getScroll );
		}

		scrollChange();

		//close lightbox
		$('.close').click(function(e){
			e.preventDefault();
			$('.lightbox--module').fadeOut();
		});

		function validEmail( $email ) {

		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );

		}

		//-----> Procesamos formulario de news
		$("input.subscribe-btn").click( function( e ){

		    e.preventDefault();

		    var $data = $("#mail").val();
		    var $token = $("input[name=_token]").val() 

		    $("#subscribe-message").remove();

		    console.log( "Email: " + $data );

		    if( ! validEmail( $data ) || $data.length == 0 ){

		        $("#mail").css("border-color", "#ed1c1c");
		        return false;

		    }else{

		    	$("#mail").css("border-color", "#a5a5a5");

		    	$.ajax({ type: "POST",
                    url: '/contacto/newsletter',
                    data: {send_data: "sent", email: $data, _token: $token },
                    error: function(){
                        
                    },
                    success: function(response){ 
                                        
                    			console.log( response );

                    			var $resp = $.parseJSON( response );

                    			if( $resp.status ){

                    				$("#mail").val("");
                    				$(".subscribe-inner").append( '<div id="subscribe-message" style="padding: 15px;color: green;font-weight: bold;">' + $resp.message + '</div>' )

                    			}else{

                    				$(".subscribe-inner").append( '<div id="subscribe-message" style="padding: 15px;color: red;font-weight: bold;">' + $resp.message + '</div>' )

                    			}

                            }, 
                });

		    }



		} );

		//burger btn
		$('.nav-trigger').on('click', function (event) {
			event.preventDefault(); 
			$(this).toggleClass('active');    
			$('.nav').stop(true,true).slideToggle();
			$('.header').toggleClass('nav-mobile-open');
			$('html, body').toggleClass('mobile-fixed');
		});

		$('.btn-search').on('click', function (event) {
			$(this).toggleClass('active');
			event.preventDefault();
			$('.search .search-actions').slideToggle();
		});

		 
			if ($win.width() <= 1025) {
				$('.nav .has-dropdown > a').on('click', function (event) {
					event.preventDefault();
					$(this).parent().toggleClass('active');
				}); 
			}
		 

		//Custom Dropdowns
		$('.select').dropdown();

		//slider intro
		$('.slider-intro .slides').slick({
			dots: true,
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			swipeToSlide: true,
			infinite: false,
			touchMove: false,
			swipeToSlide: false,
			autoplay: true,
  			autoplaySpeed: 3000,
		});

		$('.slider-intro .slick-dots').wrap('<div class="slick-dots-wrapper"><div class="shell"></div></div>')

		//slider games
		$('.slider-games .slides').slick({
			dots: false,
			arrows: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			swipeToSlide: true,
			responsive: [
				{
					breakpoint: 1150,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1 
					}
				},
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1 
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
				  	}
				} 
			]
		});

		$('.slider-gallery .slides').slick({
			dots: false,
			arrows: true,
			centerMode:true,
			centerPadding: '0',
			slidesToShow: 3,
			slidesToScroll: 1,
			swipeToSlide: true,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1 
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
				  	}
				} 
			]
		});

		$('.slider-secondary .slides').slick({
			dots: true, 
			arrows: false,
			centerMode:true,
			centerPadding: '0',
			slidesToShow: 1,
			slidesToScroll: 1,
			swipeToSlide: true 
		});

		$('.slider-secondary .slick-dots').wrap('<div class="slick-dots-wrapper"><div class="shell"></div></div>');

		$('.slider-providers .slides').slick({
			dots: true, 
			arrows: false,
			infinite: true,
			touchMove: false,
			swipeToSlide: false,
			initialSlide: 1,
			swipe : true,
			centerMode:true,
			centerPadding: '0',
			slidesToShow: 3,
			slidesToScroll: 1,
			swipeToSlide: true 
		});

		$('.slider-games-available .slides').slick({
			dots: false, 
			arrows: true,
			infinite: true,
			touchMove: false,
			swipeToSlide: false,
			initialSlide: 1,
			swipe : false,
			centerMode:true,
			centerPadding: '0',
			slidesToShow: 1,
			slidesToScroll: 1,
			swipeToSlide: true 
		}); 
		
   
		// $('.slider-gallery .slide').each(function() {
		// 	var imageSrc = $(this).find('img').attr('src'); 
		// 	$(this).find('.slide-image').css('background-image','url(' + imageSrc + ')')
		// });

		//scroll to next section
		$('.btn-scroll').click(function (e) {
			e.preventDefault();

			var anchor = $('.anchor')

			$('body, html').animate({
				scrollTop: $(anchor).height()
			}, 900);
		});

		//scroll to next section
		$('.btn-top').click(function (e) {
			e.preventDefault();
			 $('body, html').animate({
				scrollTop: $('body, html').offset().top
			}, 900);
		});

		//subscribe
		$('.btn-form').on('click',function(e) {
			e.preventDefault();

			$(this).siblings('.subscribe-body-hidden').addClass('shown')
			$(this).addClass('hidden');
		})

		

		//footer-socials fix dropdown on mobile (add class)
		$('.socials-footer  > ul > li > a').on('click', function (event) {
			event.preventDefault();
			$(this).parent('li').toggleClass('active');
		});



	}); //jQuery end

	$(function() {
		var map; 
		function initialize() {
			
			// Create an array of styles.
			var styles = [
				{
					"featureType": "all",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"saturation": 0
						},
						{
							"color": "#000000"
						},
						{
							"lightness": 40
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"visibility": "off"
						},
						{
							"color": "#000000"
						},
						{
							"lightness": 0
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#000000"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#000000"
						},
						{
							"lightness": 17
						},
						{
							"weight": 0
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#d6d6d6"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#bcbcbc"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#aaaaaa"
						},
						{
							"lightness": 0
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#ebebeb"
						},
						{
							"lightness": 29
						},
						{
							"weight": 0
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ebebeb"
						},
						{
							"lightness": 0
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ebebeb"
						},
						{
							"lightness": 0
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#bcbcbc"
						},
						{
							"lightness": 0
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#dfdfdf"
						},
						{
							"lightness": 17
						}
					]
				}
			];

			var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

			var isDraggable = $(document).width() > 480 ? true : false;

			var map_element = $('#googlemap');
			var bounds = new google.maps.LatLngBounds();
			var myLatLng = new google.maps.LatLng(map_element.data('lat'),map_element.data('lng'));
			var mapOptions = {
				zoom: 17,
				center: myLatLng,
				disableDefaultUI: true,
				mapTypeControl: false,
				draggable: isDraggable,
				scrollwheel: true,
				zoomControl: false,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL
				},
				panControl:true
			};

			bounds.extend(myLatLng);

			map = new google.maps.Map(document.getElementById('googlemap'),mapOptions);

			var image = 'css/images/marker.png'; 
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				icon: image
			});
			 
			google.maps.event.addDomListener(window, "resize", function() {
				google.maps.event.trigger(map, "resize");
				map.setCenter( bounds.getCenter() );
			});
			
			map.mapTypes.set('map_style', styledMap);
			map.setMapTypeId('map_style');
		}

		if ($('.section-map').length > 0) {
			google.maps.event.addDomListener(window, 'load', initialize);
		}
	});
})(jQuery, window, document);

$(function() {
  // Generic selector to be used anywhere
  $(".stick-nav ul li a, .btn-scroll").click(function(e) {

    // Get the href dynamically
    var destination = $(this).attr('href');

    // Prevent href=“#” link from changing the URL hash (optional)
    e.preventDefault();

    // Animate scroll to destination
    $('html, body').animate({
      scrollTop: $(destination).offset().top
    }, 500);
  });
});


	
