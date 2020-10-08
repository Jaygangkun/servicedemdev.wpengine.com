jQuery(document).ready(function($) {
	
	// Sticky Nav
  var header = $(".navbar-light");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      header.addClass("navbar-scroll");
    } else {
      header.removeClass("navbar-scroll");
    }
  });
  
  // Mobile Body Padding
  $(window).resize(function() {
    var browserWidth = $(this).width();
    var navHeight    = $('.navbar.navbar-light').outerHeight();
    
    if ( browserWidth < 992 ) {
      $('body').css('padding-top', navHeight);
    } else {
      $('body').css('padding-top', 0);
    }
  });
  
  $(window).trigger('resize');
  
  $(document).on('click', '.news-block .pagination-link', function(){
		var page_index = $(this).attr('page-index');
		$.ajax({
			url: wp_admin_url + '',
			type: 'post',
			data:{
				action: 'get_posts',
				offset: (page_index - 1) * 6,
				count: 6
			},
			success: function(response){
				$('.news-section_list .row').html(response);
				$('.news-block .pagination-link').removeClass('active');
        $('.news-block .pagination-link--num[page-index="' + page_index+ '"]').addClass('active');
        
        var newsScroll = $('.news-section_list').offset().top - $('.navbar').outerHeight();
        $('html, body').animate({
          scrollTop: newsScroll,
        }, 650);
			}
		})
  })
  
  $(document).on('click', '.pricing-period-items li', function(){
    $('.pricing-list-block').removeClass('period--monthly');
    $('.pricing-list-block').removeClass('period--annually');

    var period = $(this).attr('data-period');
    $('.pricing-list-block').addClass('period--' + period);
  })

  $('#faq_questions_row').masonry({
    itemSelector: '.col-lg-6',
    columnWidth: '.col-lg-6'
  });

  new WOW().init();

  $(document).on('click', '.pricing-period-title', function(){
    $('.pricing-period-row').attr('active', $(this).attr('index'));
    $('.pricing-period-list-row').attr('active', $(this).attr('index'));
  })
}); /* end of as page load scripts */