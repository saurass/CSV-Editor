<?php
require_once "header.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>CSV Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>

<header>
    <div class="navbar-fixed">
        <nav class="cyan darken-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">CSV Editor</a>
            </div>
        </nav>
    </div>
</header>

<div class="row"></div>
<div class="row"></div>

<section class="container">
    <article class="row">
        <div class="col s12 container">
            <div class="card z-depth-3">
                <div class="card-content center">
                    <span class="card-title">Edit File</span>
                    <div class="mydatatable">
                        <table class="centered striped responsive-table" id="colorTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Color Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="dataFields">
                            <?php
                            foreach ($results as $result) {
                                if (trim($result[1]) != '') {
                                    ?>

                                    <tr>
                                        <td><?php echo $result[1] ?></td>
                                        <td><?php echo $result[2] ?></td>
                                        <td><?php echo $result[3] ?></td>
                                        <td>
                                            <button class="btn-flat cyan-text tooltipped" data-tooltip="Delete Entry"
                                                    data-delay="50" data-position="right"
                                                    onclick="deleteEntry(<?php echo $result[0] ?>,'D')"><i
                                                        class="material-icons del">delete</i>
                                            </button>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>

                        <div class="row"></div>
                        <div class="left">
                            <a href="download.php?link=test.csv" class="btn cyan darken-1">Download CSV File</a>
                        </div>
                        <div class="right">
                            <a href="#modal1" class="btn cyan darken-1 waves-effect waves-light modal-trigger"
                               onclick="addEntryField()">Add New Entry</a>
                        </div>
                        <div class="row"></div>

                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h5 class="center">Add new Entry</h5>
        <table>
            <tr id="addOnly">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
</div>

<script type="text/javascript" src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="assets/plugins/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
