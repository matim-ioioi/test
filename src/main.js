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

  //AJAX SUBMIT (ADDING A TASK)
  $("#addTaskForm").submit(function (e) {
    e.preventDefault(e);
    $.ajax({
      url: "php/addRow.php",
      type: "POST",
      data: {
        table: "tasks",
        taskName: $("#taskName").val(),
        taskPerformer: $("#taskPerformer").val(),
        taskStatus: $("#taskStatus").val(),
        taskDescription: $("#taskDescription").val(),
      },
      success: function (response) {
        resetForms();
        $(".modal").modal("hide");
        $("#tasksTable").empty();
        $("#tasksTable").html(response);
        $(".section-content").css("display", "none");
        $("#section-completed").css("display", "block");
      },
    });
  });
});

function resetForms() {
  $("form").trigger("reset");
}

function CancelAdding(resForm, showSec) {
  if (resForm && showSec) {
    $(".section-content").css("display", "none");
    $("#" + showSec).css("display", "block");
  } else {
    $(".active").click();
  }
  resetForms();
}
