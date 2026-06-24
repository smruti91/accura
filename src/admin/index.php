<?php
session_start();
include_once('../config.php');
if (
    !isset($_SESSION['authenticated']) ||
    $_SESSION['authenticated'] !== true
) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pageTitle = isset($pageTitle) ? $pageTitle : "Accura Gold Admin Panel";
    include_once __DIR__ . '/includes/header.php';
    ?>
</head>

<body>

    <!-- Sidebar -->
    <?php include_once __DIR__ . '/includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Navbar -->
        <?php include_once __DIR__ . '/includes/navbar.php'; ?>

        <div class="container-fluid p-4">

            <!-- Stats -->
            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card card-orange">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3>150</h3>
                                <p class="mb-0">Total Reports</p>
                            </div>
                            <i class="fas fa-file card-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card card-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3>58</h3>
                                <p class="mb-0">Uploaded Files</p>
                            </div>
                            <i class="fas fa-cloud-upload-alt card-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card card-orange">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3>35</h3>
                                <p class="mb-0">Users</p>
                            </div>
                            <i class="fas fa-users card-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card dashboard-card card-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3>10</h3>
                                <p class="mb-0">Pending Files</p>
                            </div>
                            <i class="fas fa-clock card-icon"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Recent Uploads -->
            <div class="row mt-4">

                <div class="col-lg-12">
                    <button class="btn btn-warning text-dark mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        <i class="fa fa-upload"></i> Upload Report
                    </button>

                    <div class="modal fade" id="uploadModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <form id="uploadForm" enctype="multipart/form-data">

                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title">Upload Report</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label>File Name</label>
                                                <input type="text"
                                                    name="file_name"
                                                    class="form-control"
                                                    required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Date</label>
                                                <input type="date"
                                                    name="report_date"
                                                    class="form-control"
                                                    required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Description</label>
                                                <textarea name="description"
                                                    class="form-control"
                                                    rows="3"></textarea>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Upload File</label>
                                                <input type="file"
                                                    name="upload_file"
                                                    class="form-control"
                                                    accept=".pdf,.xls,.xlsx"
                                                    required>

                                                <small class="text-muted">
                                                    Allowed: PDF, XLS, XLSX
                                                </small>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit"
                                            class="btn btn-warning" id="uploadBtn">
                                            Upload
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>


                    <div class="card border-0 shadow-sm custom-table">

                        <div class="card-header bg-dark text-white">
                            Recent Uploads
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="reportTable" class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                             <th>Report No</th>
                                            <th>File Name</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>File</th>
                                            <th width="150">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $result = $db->query(" SELECT * FROM uploaded_files ORDER BY id DESC ");
                                        while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= htmlspecialchars($row['file_name']); ?></td>
                                                <td><?= date('d-m-Y', strtotime($row['report_date'])); ?></td>
                                                <td><?= htmlspecialchars($row['description']); ?></td>
                                                <td> <a href="uploads/<?= $row['uploaded_file']; ?>" target="_blank" class="btn btn-sm btn-info"> View File </a> </td>
                                                <td> <a href="edit-file.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a> <a href="delete-file.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this file?')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a> </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
                        <div id="toastMsg" class="toast align-items-center text-white bg-success border-0">
                            <div class="d-flex">
                                <div class="toast-body" id="toastBody">
                                    Success
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
          $.fn.dataTable.ext.errMode = 'throw';
          var table = $('#reportTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "fetch-files.php",
                    type: "POST"
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "report_no"
                    },
                    {
                        data: "file_name"
                    },
                    {
                        data: "report_date"
                    },
                    {
                        data: "description"
                    },
                    {
                        data: "file"
                    },
                    {
                        data: "action"
                    }
                ]
            });

        });
    
        document.getElementById("uploadForm").addEventListener("submit", function(e) {
            e.preventDefault();

             let formData = new FormData(this);
             let uploadBtn = document.getElementById("uploadBtn");

            // Disable button
            uploadBtn.disabled = true;
            uploadBtn.innerHTML = "Uploading... <span class='spinner-border spinner-border-sm'></span>";
            fetch("upload-file.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    console.log("Response:", data);

                    if (data.status === "success") {

                        showToast(data.message, "success");

                        this.reset();

                        try {

                            // Bootstrap 5 modal close
                            const modalElement = document.getElementById('uploadModal');
                            const modal = bootstrap.Modal.getInstance(modalElement);

                            if (modal) {
                                modal.hide();
                            }
                            location.reload(); // Reload the page to reflect changes
                            // DataTable reload
                            console.log(table);
                            if (typeof table !== 'undefined') {
                                //table.ajax.reload(null, false);

                            }

                        } catch (err) {
                            console.error("After success error:", err);
                        }

                    } else {

                        showToast(data.message, "error");

                    }
                })
                .catch(err => {
                    showToast("Something went wrong", "error");
                })
                .finally(() => {

                    // ALWAYS re-enable button
                    uploadBtn.disabled = false;
                    uploadBtn.innerHTML = "Upload";

                });
        });

        function showToast(message, type) {

            let toast = document.getElementById("toastMsg");
            let body = document.getElementById("toastBody");

            body.innerText = message;

            toast.classList.remove("bg-success", "bg-danger");

            if (type === "success") {
                toast.classList.add("bg-success");
            } else {
                toast.classList.add("bg-danger");
            }

            new bootstrap.Toast(toast).show();
        }
    </script>
</body>

</html>