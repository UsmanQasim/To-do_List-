<?php
    if(!isset($_SESSION['email'])){
        header('Location: login/Login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#add-btn").click(function() {
                $("#add-task-modal").modal('show');
            });
        });
    </script>

    <!-- CSS LINKS HERE -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/styles.css">
</head>

<body>
    <!-- Modal -->
    <div id="add-task-modal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="add-new-task-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Add Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal m-3">
                        <div class="form-group text-center">
                            <input type="text" class="form-control" id="task-title" placeholder="Task Title">
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control" id="task-description" placeholder="Task Description">
                        </div>
                        <div class="form-group text-center">
                            <input type="date" class="form-control" id="task-date">
                        </div>
                        <div class="form-group text-center">
                            <input type="time" class="form-control" id="task-time">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-danger">Add Task</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="flex-container p-3">
        <!-- ALL THE CARDS HERE -->
        <div class="row d-flex justify-content-center" style="width: 80%;">
            <!-- LIST OF TASKS -->
            <div class="card mr-5 col-md-4" style="height:75vh;">
                <div class="card-body" style="overflow-y: scroll;">
                    <div class="card m-2 border border-danger">
                        <div class="card-body row">
                            <div class="ml-2" style="width: 80%;">
                                <h5 class="text-danger">Task 1</h5>
                                <label>Task Description</label><br>
                                <label>Last Date & Time</label>
                            </div>
                            <div style="width: 20%; align-items:center; justify-content:center; font-size:25px" class="row">
                                <label class="ml-2 mr-2"><i class="fa fa-check" aria-hidden="true"></i></label>
                                <label class="ml-2 mr-2"><i class="fa fa-times" aria-hidden="true"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="card m-2">
                        <div class="card-body row">
                            <div class="ml-2" style="width: 80%;">
                                <h5>Task 2</h5>
                                <label>Task Description</label><br>
                                <label>Last Date & Time</label>
                            </div>
                            <div style="width: 20%; align-items:center; justify-content:center; font-size:25px" class="row">
                                <label class="ml-2 mr-2"><i class="fa fa-check" aria-hidden="true"></i></label>
                                <label class="ml-2 mr-2"><i class="fa fa-times" aria-hidden="true"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white" style="border: none;">
                    <button class="btn btn-block btn-sm btn-danger" id="add-btn">ADD TASK</button>
                </div>
            </div>
            <!-- DETAIL OF THE CHOSEN TASK -->
            <div class="card ml-5 col-md-6" style=" height:75vh;">
                <div class="card-header text-center bg-white" style="border:none">
                    <h2>Task Name</h2>
                </div>
                <div class="card-body text-center">
                    <p>
                        Dori me Interimo adapare dori me Ameno ameno latire Latiremo Dori me
                        Ameno Omenare imperavi ameno Dimere dimere matiro Matiremo Ameno
                        BRIDGE Omenare imperavi emulari Ameno Omenare imperavi emulari CHORUS
                        Ameno Ameno dore Ameno dori me (x2)
                        Ameno dom Dori me reo Ameno dori me (x2) Dori me am
                    </p>
                    <p>Last Date & Time</p>
                </div>
                <div class="card-footer bg-white" style="border: none;">
                    <div class="row" style="justify-content: center;">
                        <button class="btn btn-danger btn-sm m-2">Delete</button>
                        <button class="btn btn-secondary btn-sm m-2">Mark As Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT SECTION -->
    <div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </div>
</body>

</html>