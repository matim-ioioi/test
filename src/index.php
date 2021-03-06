<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tasks&Performers</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- SECTION WITH NAVBAR -->
    <section class="section-navbar">
      <nav class="nav nav-tabs">
        <a href="#section-tasks" class="nav-link">Tasks</a>
        <a href="#section-performers" class="nav-link">Performers</a>
      </nav>
    </section>

    <!-- SECTION WITH TASKS TABLE -->
    <section class="section-content" id="section-tasks">
      <div class="table-wrapper scrollable" id="tasksTable">
        <?php include('php/loadTasksTable.php'); ?>
      </div>
      <div class="add-button">
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addTask">Add</button>
      </div>
    </section>

    <!-- MODAL WITH TASK ADDITION -->
    <div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title">Adding a task</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetForms()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addTaskForm">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                </div>
                <input type="text" class="form-control" id="taskName" name="taskName" placeholder="Name" required>
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Performer</div>
                </div>
                <div id="addPerformerOptions" class="d-flex flex-grow-1">
                  <select type="text" class="form-control" id="taskPerformer" name="taskPerformer">
                    <?php include('php/getPerformersOptions.php') ?>
                  </select>
                </div>
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Status</div>
                </div>
                <select class="form-control" id="taskStatus" name="taskStatus">
                  <?php include('php/getStatusesOptions.php') ?>
                </select>
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Description</div>
                </div>
                <textarea wrap="soft" class="form-control" id="taskDescription" name="taskDescription" style="resize: none; height: 15rem;" placeholder="Description" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" form="addTaskForm" value="Save" class="btn btn-sm btn-success" id="submitTask">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" onclick="resetForms()">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- SECTION WITH TASKS EDITING -->
    <section class="section-content" id="section-edit-tasks">
      <div class="w-25 pt-3">
        <form id="editTaskForm">
          <input type="text" class="form-control" id="editTaskID" name="editTaskID" hidden>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Name</div>
            </div>
            <input type="text" class="form-control" id="editTaskName" name="editTaskName" placeholder="Name" required>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Performer</div>
            </div>
            <div id="editPerformerOptions" class="d-flex flex-grow-1">
              <select type="text" class="form-control" id="editTaskPerformer" name="editTaskPerformer">
                <?php include('php/getPerformersOptions.php') ?>
              </select>
            </div>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Status</div>
            </div>
            <select type="text" class="form-control" id="editTaskStatus" name="editTaskStatus">
              <?php include('php/getStatusesOptions.php') ?>
            </select>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Description</div>
            </div>
            <textarea wrap="soft" class="form-control" id="editTaskDescription" name="editTaskDescription" style="resize: none; height: 15rem;" placeholder="Description" required></textarea>
          </div>
          <div class="d-flex justify-content-between">
            <input type="submit" form="editTaskForm" value="Save" class="btn btn-sm btn-success w-25" id="submitEditTask">
            <button type="button" class="btn btn-sm btn-danger w-25" onclick="CancelAdding('editTaskForm', 'section-tasks')">Close</button>
          </div>
        </form>
      </div>
    </section>

    <section class="section-content" id="section-performers">
      <div class="table-wrapper scrollable" id="performersTable">
          <?php include('php/loadPerformersTable.php') ?>
      </div>
      <div class="add-button">
        <button class="btn btn-sm btn-success" onclick="addPerformerSec()">Add</button>
      </div>
    </section>

    <section class="section-content" id="section-add-performers">
      <div class="w-25 pt-3">
        <form id="addPerformerForm">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Name</div>
            </div>
            <input type="text" class="form-control" id="performerName" name="performerName" placeholder="Name" required>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Position</div>
            </div>
            <input type="text" class="form-control" id="performerPosition" name="performerPosition" placeholder="Position" required>
          </div>
          <div class="d-flex justify-content-between">
            <input type="submit" form="addPerformerForm" value="Save" class="btn btn-sm btn-success w-25" id="submitPerformer">
            <button type="button" class="btn btn-sm btn-danger w-25" onclick="CancelAdding('addPerformerForm', 'section-performers')">Close</button>
          </div>
        </form>
      </div>
    </section>

    <section class="section-content" id="section-edit-performers">
      <div class="w-25 pt-3">
        <form id="editPerformerForm">
          <input type="text" class="form-control" id="editPerformerID" name="editPerformerID" hidden>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Name</div>
            </div>
            <input type="text" class="form-control" id="editPerformerName" name="editPerformerName" placeholder="Name" required>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Position</div>
            </div>
            <input type="text" class="form-control" id="editPerformerPosition" name="editPerformerPosition" placeholder="Position" required>
          </div>
          <div class="d-flex justify-content-between">
            <input type="submit" form="editPerformerForm" value="Save" class="btn btn-sm btn-success w-25" id="submitEditPerformer">
            <button type="button" class="btn btn-sm btn-danger w-25" onclick="CancelAdding('editPerformerForm', 'section-performers')">Close</button>
          </div>
        </form>
      </div>
    </section>

    <section class="section-content" id="section-completed">
      <div class="w-50 p-5">
        <h1>Operation is completed</h1>
        <button type="button" class="btn btn-sm btn-secondary w-25" onclick="CancelAdding()">Back</button>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <script src="main.js"></script>
  </body>
</html>