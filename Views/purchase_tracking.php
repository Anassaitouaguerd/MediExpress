<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Medi Express</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php include("partials/_sidebar.php"); ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include("partials/_navbar.php"); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Team</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-success m-0 fw-bold">Employee Info</p>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                            <div class="class d-flex">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn align-items-start sidebar-dark accordion bg-gradient-success p-2 text-light navbar-dark mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                                    ajouter nouvelle médicament
                                </button>
                                <form action="export_pdf" method="POST" target="_blank">
                                    <button type="submit" name="export_med" class="btn btn-outline-danger mx-4">
                                        <i class="fas fa-file-export  text-darck"></i> Export PDF
                                    </button>

                                </form>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">ajouter nouvelle médicament</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="add_medicament" method="POST">

                                                <div class="form-group">
                                                    <label for="jobName">medicament Name:</label>
                                                    <input type="text" class="form-control" id="medName" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jobDescription">medicament Description:</label>
                                                    <textarea class="form-control" id="medDescription" name="description"
                                                              required style="resize : none;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jobCompany">Price:</label>
                                                    <input type="number" class="form-control" id="medPrice" name="price"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jobLocation">Quantity:</label>
                                                    <input type="number" class="form-control" id="medQuantity" name="quantity_in_stock"
                                                           required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    <button type="submit" name="save_med" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table mt-4" id="dataTable">
                                <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($d_medicament as $rows) { ?>
                                    <tr>
                                        <td class="text-center"><?= $rows->name ?></td>
                                        <td class="text-center"><?= (strlen($rows->description) > 50) ? substr($rows->description, 0, 50) . '...' : $rows->description ?></td>

                                        <td class="text-center"><?= $rows->price ?></td>
                                        <td class="text-center"><?= $rows->quantity_in_stock ?></td>
                                        <td class="text-center">
                                            <!-- button delete medicament -->
                                            <a class="btn btn-success text-white btn-sm d-none d-sm-inline-block" role="button" href="#">
                                                <i class="fas fa-download fa-sm text-white-50"></i>
                                                &nbsp;Generate Report
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("partials/_footer.php"); ?>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>

</body>

</html>