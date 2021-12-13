$(document).ready(function(){

    new WOW().init();

    /*----Get Header Height ---*/
    function get_header_height() {
        var header_sticky=$("header.-fix").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

    /*----Languages---*/
    $('.languages .languages-item').click(function() {
        $(this).next().toggleClass('dropdown-languages');
        isClicked = true;
    });

    $('.languages ul li').click(function() {
        var $liIndex = $(this).index() + 1;
        $('.languages ul li').removeClass('active');
        $('.languages ul li:nth-child('+$liIndex+')').addClass('active');
        var $getLang = $(this).html();
        $('.languages .languages-item').html($getLang);

        $('.languages>ul').removeClass('dropdown-languages')
    });


    // Click id a
    var jump=function(e)
    {
        if (e){
           e.preventDefault();
           var target = $(this).attr("href");
        }else{
           var target = location.hash;
        }

        $('html,body').animate({scrollTop: $(target).offset().top},2000,function(){
           location.hash = target;
        });
    }

    // $('html, body').hide();

    $('body').addClass('modal-open')
    $(window).on('load', function() {

        $('a[href^="#"]').bind("click", jump);

        if (location.hash){
            setTimeout(function(){
                $('html, body').scrollTop(0).show();
                jump();

            }, 0);
        }else{
            $('html, body').show();
        }

    })

    $(document).on('click', 'a[href^="#"]', function (e) {

        $(this).closest('nav').find('li').removeClass('active')
        $(this).closest('li').addClass('active')

        //Close menu mb
        $('.menu-mb__btn').removeClass('active')
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('modal-open')
    });



    // Header Sticky
    var header_sticky=$("header.-fix")

    $(window).on('load', function() {
        $(this).scrollTop()>5 ? header_sticky.addClass("is-active"): ''
    })

    $(window).scroll(function(){
        $(this).scrollTop()>5?header_sticky.addClass("is-active"):header_sticky.removeClass("is-active")
    })


    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $('.nav__mobile--close').click(function(e){
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('menumb-open')
    });
    $('.menu-mb__btn').click(function(e){
        e.preventDefault()
        if($('body').hasClass('menumb-open')){
            $('.menu-mb__btn').removeClass('active')
            $('.nav__mobile').removeClass('active')
            $('body').removeClass('menumb-open')
        }else{
            $('.menu-mb__btn').addClass('active')
            $('body').addClass('menumb-open')
            $('.nav__mobile').addClass('active')
        }
    });

    //back to top
    var back_to_top=$(".back-to-top"),offset=220,duration=500;
    $(document).on("click",".back-to-top",function(o){
        return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1
    });

    //check home
    if($('body').hasClass( "category" )){
        $('.news__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            responsive: [
                {
                  breakpoint: 991,
                  settings: {
                    arrows: false,
                  }
                }
            ]
        });

        var offset = 12; // khái báo số lượng bài viết đã hiển thị
        $('.js-loadmore').click(function(event) {

            var thiz = $(this)
            thiz.addClass('active')
            event.preventDefault()
            var catid = thiz.data('catid')
            $.ajax({ // Hàm ajax
                url : dntheme_params['ajax_url'], // Nơi xử lý dữ liệu
                data : {
                    action: "loadmore", //Tên action, dữ liệu gởi lên cho server
                    catid: catid, //Tên action, dữ liệu gởi lên cho server
                    offset: offset, // gởi số lượng bài viết đã hiển thị cho server
                },
                beforeSend: function(){

                },
                success: function(response) {

                    if(response){
                        $('.js-loadcontent').append(response);
                        offset = offset + 12;
                    }else{
                        thiz.remove()
                    }

                    if(thiz.data('number') == 0){
                        thiz.remove()
                    }

                    thiz.removeClass('active')

                    thiz.attr("data-number",$('.js-loadmore-stt').val());
                    if(thiz.attr('data-number') == 0){
                        thiz.remove()
                    }
                    $('.js-loadmore-stt').remove()
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
           });
        });
    }

    if($('body').hasClass( "single" )){
        $('.related__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    slidesToShow: 1,
                  }
                }
            ]
        });
    }

});


