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

  //AJAX SUBMIT (EDITING A TASK)
  $("#editTaskForm").submit(function (e) {
    e.preventDefault(e);
    let id = $("#editTaskID").val();
    let name = $("#editTaskName").val();
    let performer = $("#editTaskPerformer").val();
    let status = $("#editTaskStatus").val();
    let description = $("#editTaskDescription").val();
    $.ajax({
      url: "php/editTask.php",
      type: "POST",
      data: {
        id: id,
        name: name,
        performer: performer,
        status: status,
        description: description,
      },
      success: function (response) {
        if (response) {
          resetForms();
          $("#tasksTable").empty();
          $("#tasksTable").html(response);
          $(".section-content").css("display", "none");
          $("#section-completed").css("display", "block");
        }
      },
    });
  });

  //AJAX SUBMIT (ADD A PERFORMER)
  $("#addPerformerForm").submit(function (e) {
    e.preventDefault(e);
    $.ajax({
      url: "php/addRow.php",
      type: "POST",
      data: {
        table: "performers",
        performerName: $("#performerName").val(),
        performerPosition: $("#performerPosition").val(),
      },
      success: function (response) {
        resetForms();
        $("#performersTable").empty();
        $("#performersTable").html(response);
        updOptions();
        $(".section-content").css("display", "none");
        $("#section-completed").css("display", "block");
      },
    });
  });

  //AJAX SUBMIT (EDITING A PERFORMER)
  $("#editPerformerForm").submit(function (e) {
    if ($("#editPerformerName").val() && $("#editPerformerPosition").val()) {
      e.preventDefault(e);
      let id = $("#editPerformerID").val();
      let name = $("#editPerformerName").val();
      let position = $("#editPerformerPosition").val();
      $.ajax({
        url: "php/editPerformer.php",
        type: "POST",
        data: {
          id: id,
          name: name,
          position: position,
        },
        success: function (response) {
          if (response) {
            resetForms();
            $("#performersTable").empty();
            $("#performersTable").html(response);
            updOptions();
            $(".section-content").css("display", "none");
            $("#section-completed").css("display", "block");
          }
        },
      });
    }
  });

  updOptions();
});

//ACTIVATION EDIT TASK SECTION
function editTask(id, table) {
  $.ajax({
    url: "php/getTableRow.php",
    type: "GET",
    data: {
      id: id,
      table: table,
    },
    success: function (response) {
      if (response) {
        resetForms();
        data = JSON.parse(response);
        $("#editTaskID").val(data.id);
        $("#editTaskName").val(data.name);
        $("#editTaskPerformer").val(data.performer);
        $("#editTaskStatus").val(data.status);
        $("#editTaskDescription").val(data.description);
        $(".section-content").css("display", "none");
        $("#section-edit-tasks").css("display", "block");
      }
    },
  });
}

//ACTIVATION EDIT PERFORMER SECTION
function editPerformer(id, table) {
  $.ajax({
    url: "php/getTableRow.php",
    type: "GET",
    data: {
      id: id,
      table: table,
    },
    success: function (response) {
      if (response) {
        resetForms();
        data = JSON.parse(response);
        $("#editPerformerID").val(data.id);
        $("#editPerformerName").val(data.name);
        $("#editPerformerPosition").val(data.position);
        $(".section-content").css("display", "none");
        $("#section-edit-performers").css("display", "block");
      }
    },
  });
}

//ACTIVATION ADD PERFORMER SECTION
function addPerformerSec() {
  $(".section-content").css("display", "none");
  $("#section-add-performers").css("display", "block");
}

//BUTTON FOR CANCEL ADDING TASK/PERFORMER
function CancelAdding(resForm, showSec) {
  if (resForm && showSec) {
    $(".section-content").css("display", "none");
    $("#" + showSec).css("display", "block");
  } else {
    $(".active").click();
  }
  resetForms();
}

//REMOVE TASK/PERFORMER
function removeRow(id, table) {
  $.ajax({
    url: "php/removeRow.php",
    type: "GET",
    data: {
      id: id,
      table: table,
    },
    success: function (response) {
      if (response) {
        resetForms();
        $("#editTaskPerformer")
          .find("[value=" + id + "]")
          .remove();
        $("#" + JSON.parse(response) + id).remove();
      }
    },
  });
}

//UPD OPTIONS AND LOADING UPDATED TABLES
function updOptions() {
  $("#editTaskPerformer").empty();
  $("#editTaskPerformer").load("php/getPerformersOptions.php");

  $("#taskPerformer").empty();
  $("#taskPerformer").load("php/getPerformersOptions.php");
}

function resetForms() {
  $("form").trigger("reset");
}
