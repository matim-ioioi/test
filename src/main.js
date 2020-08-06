$(document).ready(function () {
  $(".nav-link").click(function (e) {
    e.preventDefault();

    resetForms();

    //SET ACTIVE CLICKED LINK AND APPROPRIATE SECTION
    $(".nav-link").removeClass("active");
    $(".section-content").css("display", "none");
    $(this).addClass("active");
    $($(this).attr("href")).css("display", "block");
  });
  $(".nav-link:first").click();
});

function resetForms() {
  $("form").trigger("reset");
}
