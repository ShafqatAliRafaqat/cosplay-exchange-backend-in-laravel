(function($) { 

$('[data-toggle="offcanvas"]').on('click', function () {
    $('.navbar-collapse').toggleClass('show');
    });


  


        $("select").select2({
            placeholder: $('#select_place_holder').val(),
            allowClear: true,
            width: '100%'
        });

        $(".sb_variation").select2({
            placeholder: $('#select_place_holder').val(),
            allowClear: false,
            theme: "classic",
            width: '100%',
        });

        $(".search-select").select2({
            placeholder: $('#select_place_holder').val(),
            allowClear: false,
            theme: "classic",
            width: '100%',
        });


 


    /*==== Nav ====*/
    $('.navbar-collapse a').on('click',function(){
        $(".navbar-collapse").collapse('hide');
    });

/* ================ Nav ================ */
    $('.fa-caret-down').on("click", function(e) {
        e.preventDefault();
        $(this).next().slideToggle('');
    });
    

/* ================ Nice Select ================ */
    $(document).ready(function() {
  $('select').niceSelect();
});



  // // The slider being synced must be initialized first
  // $('#carousel').flexslider({
  //   animation: "slide",
  //   controlNav: false,
  //   animationLoop: false,
  //   slideshow: false,
  //   itemWidth: 210,
  //   itemMargin: 5,
  //   asNavFor: '#slider'
  // });
 
  // $('#slider').flexslider({
  //   animation: "slide",
  //   controlNav: false,
  //   animationLoop: false,
  //   slideshow: false,
  //   sync: "#carousel"
  // });


})(jQuery);