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

    pricingTableResizeCB();
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

  $(document).on('click', '.ebook-pagination .pagination-link', function(){
		var page_index = $(this).attr('page-index');
		$.ajax({
			url: wp_admin_url + '',
			type: 'post',
			data:{
				action: 'get_ebooks',
				offset: (page_index - 1) * 6,
				page: page_index,
				count: 6
			},
			success: function(response){
        $('.ebook-list-row').html(response);
        $('html, body').animate({
          scrollTop: $('.ebook-list-row').offset().top
        }, 500);
			}
		})
  })
  
  function pricingTableResizeCB(){
    console.log('pricingTableResizeCB');
    // equal same height of header 
    $('.pricing-membership-table-left .pricing-membership-table-row-header').outerHeight($('.pricing-membership-table-right .pricing-membership-table-row-header').outerHeight());

    // equal same height of payment row 
    $('.pricing-membership-table-left .pricing-membership-table-row-payment').outerHeight($('.pricing-membership-table-right .pricing-membership-table-row-payment').outerHeight());

    // equal same height of feature row 
    var feature_rows = $('.pricing-membership-table-left .pricing-membership-table-row-feature');
    for(var feature_index = 0; feature_index < feature_rows.length; feature_index++){
      var left_height = $('.pricing-membership-table-left .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight();
      var right_height = $('.pricing-membership-table-right .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight();

      if(left_height > right_height){
        $('.pricing-membership-table-right .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight($('.pricing-membership-table-left .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight());  
      }
      else{
        $('.pricing-membership-table-left .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight($('.pricing-membership-table-right .pricing-membership-table-row-feature[index="' + feature_index + '"]').outerHeight());
      }
    }
  }

  pricingTableResizeCB();
}); /* end of as page load scripts */