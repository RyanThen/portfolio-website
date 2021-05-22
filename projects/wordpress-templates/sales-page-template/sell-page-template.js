// Add classes to first tab so it displays on page load
$(".tab:first-of-type h2").addClass("active-tab");
$(".tab-content-wrap-1").addClass("d-block");

// Add and Remove Active Tab Styles
$(".tab h2").click(function () {
    $(".tab h2").removeClass("active-tab");
    $(this).addClass("active-tab");
});

var tabTitle1 = $('#tab-title-1');
var tabTitle2 = $('#tab-title-2');
var tabTitle3 = $('#tab-title-3');
var tabTitle4 = $('#tab-title-4');
var tabTitle5 = $('#tab-title-5');

var tabContentWrap = $('.tab-content-wrap');

$(".tab h2").click(function () {
    if(tabTitle1.hasClass('active-tab')) {
        tabContentWrap.removeClass('d-block');
        $('.tab-content-wrap-1').addClass('d-block');
    }
    if(tabTitle2.hasClass('active-tab')) {
        tabContentWrap.removeClass('d-block');
        $('.tab-content-wrap-2').addClass('d-block');
    }
    if(tabTitle3.hasClass('active-tab')) {
        tabContentWrap.removeClass('d-block');
        $('.tab-content-wrap-3').addClass('d-block');
    }
    if(tabTitle4.hasClass('active-tab')) {
        tabContentWrap.removeClass('d-block');
        $('.tab-content-wrap-4').addClass('d-block');
    }
    if(tabTitle5.hasClass('active-tab')) {
        tabContentWrap.removeClass('d-block');
        $('.tab-content-wrap-5').addClass('d-block');
    }
})

// --- Why Choose Section JS ---
var iconBlockWrapper = jQuery(".icon-block-wrap");
var iconContentMore = jQuery(".icon-block-content-more");

//ADD SLIDE DOWN CLICK EVENT INDIVIDUALLY
iconBlockWrapper.click(function() {
  //var $this = $(this);
  //$this.find("div").slideToggle('slow');

  //ALL ICON BLOCKS EXPAND AT SAME TIME
  iconContentMore.slideToggle('slow');
});

// OPEN SCHEDULE TAB IF COMING FROM OVERVIEW PAGE WIDGET
if(window.location.href.indexOf("schedule") > -1) {
  jQuery(".tab h2").removeClass("active-tab");
  jQuery(".tab:nth-of-type(2) h2").addClass("active-tab");
  tabContentWrap.removeClass('d-block');
  jQuery('.tab-content-wrap-2').addClass('d-block');
  jQuery(window).scrollTop(jQuery('#tab-title-2').offset().top);
}
