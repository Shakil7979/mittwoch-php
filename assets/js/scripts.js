$(document).ready(function(){
	$(".second-section-carousel").owlCarousel({
		items: 3, 
		margin: 20,  
		  nav: true,  
		navText: [ 
			`<div class="custom-left-arrow">
				<img src="assets/images/left.png" alt="Prev">
			</div>`,
			`<div class="custom-right-arrow">
				<img src="assets/images/right.png" alt="Next">
			</div>`
		],
		dots: false,  
		responsive: {
			0: {
			items: 1  
			},
			600: {
			items: 1  
			},
			1024: {
			items: 3  
			}
		}
	});



	$(document).on('click', '.btn-celender-eye', function() {
		let $target = $(this).siblings(".single-bio-after");

		if ($target.css("visibility") === "visible") {
			// hide
			$target.css({
				"opacity": "0",
				"visibility": "hidden", 
				
			});
			$(this).find('i').css('color', '#000');
		} else {
			// show
			$target.css({
				"opacity": "1",
				"visibility": "visible"
			});
			$(this).find('i').css('color', '#fff');
		}
	});

	
	$(document).on('click', '.info-btn', function() {
		$('.info-modal-open').show()
	})
	
	$(document).on('click', '.close-info-modal', function() {
		$('.info-modal-open').hide()
	})

	



});


 