function mobileCheck() {
  var winWidth = $(window).width();
  if (winWidth <= 768) {
    $("#sidebar").after($("#body .pagination:first"));
  } else {
    $(".products-wrap").before($("#body .pagination:first"));
  }
}

$(document).ready(function () {
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function () {
    modal.style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  $("input[type=checkbox]").crfi();
  $("select").crfs();
  $("#slider ul").bxSlider({
    controls: false,
    auto: true,
    mode: "fade",
    preventDefaultSwipeX: false,
  });
  $(".last-products .products").bxSlider({
    pager: false,
    minSlides: 1,
    maxSlides: 5,
    slideWidth: 235,
    slideMargin: 0,
  });
  $(".tabs .nav a").click(function () {
    var container = $(this).parentsUntil(".tabs").parent();
    if (!$(this).parent().hasClass("active")) {
      container.find(".nav .active").removeClass("active");
      $(this).parent().addClass("active");
      container.find(".tab-content").hide();
      $($(this).attr("href")).show();
    }
    return false;
  });
  $("#price-range").slider({
    range: true,
    min: 0,
    max: 5000,
    values: [500, 3500],
    slide: function (event, ui) {
      $(".ui-slider-handle:first").html("<span>$" + ui.values[0] + "</span>");
      $(".ui-slider-handle:last").html("<span>$" + ui.values[1] + "</span>");
    },
  });
  $(".ui-slider-handle:first").html(
    "<span>$" + $("#price-range").slider("values", 0) + "</span>"
  );
  $(".ui-slider-handle:last").html(
    "<span>$" + $("#price-range").slider("values", 1) + "</span>"
  );
  $("#menu .trigger").click(function () {
    $(this).toggleClass("active").next().toggleClass("active");
  });

  $("label").click(function () {
    var checkboxval = $("#collection").val();

    alert(checkboxval);
  });

  mobileCheck();
  $(window).resize(function () {
    mobileCheck();
  });
});
