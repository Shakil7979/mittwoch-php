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



$(document).ready(function() {

    function isMobile() {
        return $(window).width() <= 768;
    }

    // Prevent closing when clicking inside dropdown (mobile only)
    $(document).on('click.bs.dropdown.data-api', '.dropdown-menu', function(e) {
        if (isMobile()) {
            e.stopPropagation(); // stop Bootstrap from closing it
        }
    });

    // Handle manual close button
    $(document).on('click', '.close-menu', function(e) {
        e.stopPropagation();
        const $dropdown = $(this).closest('.dropdown');
        const $menu = $dropdown.find('.dropdown-menu');
        const $toggle = $dropdown.find('[data-bs-toggle="dropdown"]');

        $toggle.dropdown('hide');
        $menu.removeClass('show').css({
            "opacity": "0",
            "visibility": "hidden"
        });
    });

    // When dropdown shows — force it visible (mobile)
    $(document).on('show.bs.dropdown', function(e) {
        if (isMobile()) {
            const $menu = $(e.target).find('.dropdown-menu');
            $menu.addClass('show').css({
                "opacity": "1",
                "visibility": "visible"
            });
        }
    });

    // Prevent Bootstrap auto hide on body click (mobile)
    $(document).on('hide.bs.dropdown', function(e) {
        if (isMobile() && !$(e.clickEvent?.target).hasClass('close-menu')) {
            e.preventDefault(); // prevent auto hide unless close button
        }
    });
});
