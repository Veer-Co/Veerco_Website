$(function() {
	"use strict";


  // new PerfectScrollbar('.cart-list');

// Prevent closing from click inside dropdown

/*$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});*/



 // jquery ready start
 $(document).ready(function() {
  // jQuery code

  $("[data-trigger]").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var offcanvas_id =  $(this).attr('data-trigger');
    $(offcanvas_id).toggleClass("show");
    $('body').toggleClass("offcanvas-active");
    $(".screen-overlay").toggleClass("show");
  }); 

  // Close menu when pressing ESC
  $(document).on('keydown', function(event) {
    if(event.keyCode === 27) {
    $(".mobile-offcanvas").removeClass("show");
    $("body").removeClass("overlay-active");
    }
  });

  $(".btn-close, .screen-overlay").click(function(e){
    $(".screen-overlay").removeClass("show");
    $(".mobile-offcanvas").removeClass("show");
    $("body").removeClass("offcanvas-active");


  }); 


}); // jquery end




$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.submenu .show').removeClass("show");
  });


  return false;
});




	$(document).ready(function() {
		$(window).on("scroll", function() {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function() {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}),



	$(".btn-mobile-filter").on("click", function() {
		$(".filter-sidebar").removeClass("d-none")
	}),
  
    $(".btn-mobile-filter-close").on("click", function() {
		$(".filter-sidebar").addClass("d-none")
	}),


	
	$(".switcher-btn").on("click", function() {
		$(".switcher-wrapper").toggleClass("switcher-toggled")
	}),
  
  $(".close-switcher").on("click", function() {
		$(".switcher-wrapper").removeClass("switcher-toggled")
	}),


	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
      $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      $('body').attr('class', 'bg-theme bg-theme4');
    }
	
	function theme5() {
      $('body').attr('class', 'bg-theme bg-theme5');
    }
	
	function theme6() {
      $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
      $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
      $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
      $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
      $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
      $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
      $('body').attr('class', 'bg-theme bg-theme12');
    }

	function theme13() {
		$('body').attr('class', 'bg-theme bg-theme13');
	  }
	  
	  function theme14() {
		$('body').attr('class', 'bg-theme bg-theme14');
	  }
	  
	  function theme15() {
		$('body').attr('class', 'bg-theme bg-theme15');
	  }



});

function incrementValue(e, productid) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');  
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val());
  if (!isNaN(currentVal)) {
     parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
     var qtyval = currentVal + 1 ;
      data = {
        'prod_id': productid,
        'qty': qtyval,
      }
      $.ajax({
        method: "POST",
        url: "update-quantity",
        data: data,
        success: function(response){
          Lobibox.notify('success', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: response.status
          });
          window.location.reload();
        },
        error: function(reserr) {
          console.error(reserr);
        }    
      });
  } else {
      parent.find('input[name=' + fieldName + ']').val(1);
      var qtyval = 1 ;
      data = {
        'prod_id': productid,
        'qty': qtyval,
      }
      $.ajax({
        method: "POST",
        url: "update-quantity",
        data: data,
        success: function(response){
          Lobibox.notify('success', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: response.status
          });
          window.location.reload();
        },
        error: function(reserr) {
          console.error(reserr);
        }    
      });
  }
}

function decrementValue(e, productid) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val());
  if (!isNaN(currentVal) && currentVal > 1) {
      parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
      var qtyval = currentVal - 1 ;
      data = {
        'prod_id': productid,
        'qty': qtyval,
      }
      $.ajax({
        method: "POST",
        url: "update-quantity",
        data: data,
        success: function(response){
          Lobibox.notify('success', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: response.status
          });
          window.location.reload();
        },
        error: function(reserr) {
          console.error(reserr);
        }    
      });
  } else {
      parent.find('input[name=' + fieldName + ']').val(1);
      var qtyval = 1 ;
      data = {
        'prod_id': productid,
        'qty': qtyval,
      }
      $.ajax({
        method: "POST",
        url: "update-quantity",
        data: data,
        success: function(response){
          Lobibox.notify('success', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: response.status
          });
          window.location.reload();
        },
        error: function(reserr) {
          console.error(reserr);
        }    
      });
  }
}

$('.input-group').on('click', '.increment-btn', function(e) {  
  var productid = $(this).closest('.product-data').find('.prod_id').val();
  incrementValue(e, productid);
});

$('.input-group').on('click', '.decrement-btn', function(e) {
  var productid = $(this).closest('.product-data').find('.prod_id').val();
  decrementValue(e, productid);
});



$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // remove product function
  $('.remove-product').click(function(e){
    e.preventDefault();
    var productid = $(this).closest('.product-data').find('.prod_id').val();
    $.ajax({
      method: "POST",
      url: "delete-cart-item",
      data: {
        'prod_id': productid,
      },
      success: function(response){
        Lobibox.notify('success', {
          size: 'mini',
          showClass: 'fadeInDown',
          hideClass: 'fadeUpDown',
          pauseDelayOnHover: true,
          continueDelayOnInactiveTab: false,
          position: 'top right',
          msg: response.status
        });
        window.location.reload();
      }
    
    });
  });

// change quantity function
  // $('.changeQuantity').click(function (e) {
  //   e.preventDefault();
  //   var prod_id = $(this).closest('.product-data').find('.prod_id').val();
  //   var qty = $('.qty-input').val();  
  //   data = {
  //     'prod_id': prod_id,
  //     'qty': qty,
  //   }
  //   $.ajax({
  //     method: "POST",
  //     url: "update-quantity",
  //     data: data,
  //     success: function(response){
  //       Lobibox.notify('success', {
  //         size: 'mini',
  //         showClass: 'fadeInDown',
  //         hideClass: 'fadeUpDown',
  //         pauseDelayOnHover: true,
  //         continueDelayOnInactiveTab: false,
  //         position: 'top right',
  //         icon: 'bx bx-x-circle',
  //         msg: response.status
  //       });
  //       window.location.reload();
  //     },
  //     error: function(reserr) {
  //       console.error(reserr);
  //     }
    
  //   });
  // });

  $("#discount_coupon").on('submit',function(e) {
    e.preventDefault();
    var promocode = $('#promocode').val();
    // console.log(promocode);
    $.ajax({
      method: "POST",
      url: "promocode-match",
      data: {
        'promocode': promocode,
      },
      success: function(response){        
        // window.location.reload();
        console.log(response);
        if (response.status == 'error') {
          Lobibox.notify('error', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: response.message
          });
          $('#promomsg').text(response.message);
          $('#promomsg').css({ "color": "red" });
          $('#promocode').val("");
        } else{
          Lobibox.notify('success', {
            size: 'mini',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: 'Promocode Applied!'
          });
          var dicsount_price = response.discount_price;
          var grand_total_price = response.grand_total;
          $('#promomsg').text('Promocode Applied!');
          $('#promomsg').css({ "padding": "10px", "color": "#388e3c" });
          $('#discount_amount').text(parseFloat(dicsount_price).toFixed(2));
          $('#grand_total').text(parseFloat(grand_total_price).toFixed(2));
          $("#promocode").prop("readonly",true);
          $("#promocode").prop("disabled",true);
        }
      }
    
    });
  });
});

