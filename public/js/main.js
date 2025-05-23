(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        } 
    });
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var input = button.parent().parent().find('input');
        var oldValue = parseFloat(input.val());

        var newVal;
        if (button.hasClass('btn-plus')) {
            newVal = oldValue + 1;
        } else {
            newVal = (oldValue > 0) ? oldValue - 1 : 0;
        }

        input.val(newVal);

        // Update the other input field
        document.getElementById('number_qaun').value = newVal;
    });
})(jQuery);



//Ajax for adding product to cart and wishlist

$(document).ready(function () {
  function showToast(message, type) {
    Swal.fire({
      text: message,
      icon: type,
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
    });
  }

  $("#addCart").on("click", function (e) {
    e.preventDefault();

    let form = $(this).closest('form');
    let productId = $(this).data("product-id");
    let quantity = form.find('input[name="quantity"]').val();

    $.ajax({
      url: form.attr('action'),
      type: 'GET',
      data: form.serialize() + '&product_id=' + productId + '&quantity=' + quantity,
      success: function (response) {
        showToast('Product added to cart successfully!', 'success');
        window.location.reload();
      },
      error: function (xhr) {
        // Parse the response JSON to get the error message
        let errorMessage = 'Error adding product to cart!';

        if (xhr.responseJSON && xhr.responseJSON.message) {
          errorMessage = xhr.responseJSON.message;
        }

        // Show the error message using your toast function
        showToast(errorMessage, 'error');
      }
    });
  });
  $(".product-btn").on("click", function (e) {
    e.preventDefault();

    let form = $(this).closest('form');
    let productId = $(this).data("product-id");
    let quantity = form.find('input[name="quantity"]').val();

    $.ajax({
      url: form.attr('action'),
      type: 'GET',
      data: form.serialize() + '&product_id=' + productId + '&quantity=' + quantity,
      success: function (response) {
        showToast('Product added to cart successfully!', 'success');
        window.location.reload();
      },
      error: function (xhr) {
        // Parse the response JSON to get the error message
        let errorMessage = 'Error adding product to cart!';

        if (xhr.responseJSON && xhr.responseJSON.message) {
          errorMessage = xhr.responseJSON.message;
        }

        // Show the error message using your toast function
        showToast(errorMessage, 'error');
      }
    });
  });

  //Wishlist 
  function showToast(message, type) {
    Swal.fire({
      text: message,
      icon: type,
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
    });
  }

  $(".addWishlistBtn").on("click", function (e) {
    e.preventDefault();

    let form = $(this).closest('form');
    let productId = $(this).data("product-id");

    $.ajax({
      url: form.attr('action'),
      type: 'GET',
      data: form.serialize() + '&product_id=' + productId,
      success: function (response) {
        showToast(response.message, 'success');
        window.location.reload();
      },
      error: function (xhr) {
        let errorMessage = xhr.responseJSON.message || 'Error adding product to wishlist!';
        showToast(errorMessage, 'error');
      }
    });
  });

  $(".remove-item-wishlist").on("click", function (e) {
    e.preventDefault();

    let productId = $(this).data("product-id");

    $.ajax({
      url: 'wishlist/removeWishlist',
      type: 'GET',
      data: {
        product_id: productId
      },
      success: function (response) {
        showToast(response.message, 'success');
        window.location.reload();
      },
      error: function (xhr) {
        let errorMessage = xhr.responseJSON.message || 'Error removing item from wishlist!';
        showToast(errorMessage, 'error');
      }
    });
  });


    $(".remove-item").on("click", function (e) {
    e.preventDefault();

    let productId = $(this).data("product-id");

    $.ajax({
      url: 'carts/cart/remove',
      type: 'GET',
      data: {
        product_id: productId
      },
      success: function (response) {
        showToast(response.message, 'success');
        window.location.reload();
      },
      error: function (xhr) {
        let errorMessage = xhr.responseJSON.message || 'Error removing item from cart!';
        showToast(errorMessage, 'error');
      }
    });
  });
        //update profile
        $('#profileUpdateForm').on('submit', function (e) {
            e.preventDefault();

            let $button = $(this).find('button[type="submit"]');
            let originalText = $button.html();

            // Show updating text
            $button.prop('disabled', true).html('Updating...');

            $.ajax({
                url: "/profile/update",
                type: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function (response) {
                    showToast('Profile updated successfully!', 'success');
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let message = 'Something went wrong.';
                    if (errors) {
                        message = Object.values(errors).map(err => err[0]).join('\n');
                    }
                    showToast(message, 'error');
                },
                complete: function () {
                    // Restore original button
                    $button.prop('disabled', false).html(originalText);
                }
            });
        });

// Update shipping address
$('#shippingAddressUpdateForm').on('submit', function (e) {
    e.preventDefault();

    let $button = $(this).find('button[type="submit"]');
    let originalText = $button.html();

    // Show updating text
    $button.prop('disabled', true).html('Updating...');

    $.ajax({
        url: "/shipping-address/update", 
        type: "POST",
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        success: function (response) {
            showToast('Shipping address updated successfully!', 'success');
        },
        error: function (xhr) {
            // Only show errors from the backend
            let message = 'Something went wrong.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                message = Object.values(xhr.responseJSON.errors).map(err => err[0]).join('\n');
            }
            showToast(message, 'error');
        },
        complete: function () {
            // Restore original button text and re-enable
            $button.prop('disabled', false).html(originalText);
        }
    });
});


});



    document.addEventListener('DOMContentLoaded', function () {
        const tabButtons = document.querySelectorAll('[data-tab]');
        const tabContents = document.querySelectorAll('[data-tab-content]');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                // Remove active from all buttons (optional highlight logic)
                tabButtons.forEach(btn => btn.classList.remove('bg-green-100'));

                // Add active style (optional highlight logic)
                button.classList.add('bg-green-100');

                // Hide all contents
                tabContents.forEach(content => {
                    content.classList.add('d-none');
                    content.classList.remove('active');
                });

                // Show selected content
                const activeTab = document.querySelector(`[data-tab-content="${tab}"]`);
                if (activeTab) {
                    activeTab.classList.remove('d-none');
                    activeTab.classList.add('active');
                }
            });
        });
    });


