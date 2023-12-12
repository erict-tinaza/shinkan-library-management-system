<?= $this->include('layout/sidebar.php'); ?>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
    <!-- Header -->
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Manage Authors</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a> -->
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                           
                                        </span>
                                        <span>ADD</span>
                                    </a> -->
                            <!-- BUTTON RESPONSIBLE FOR TOGGLING THE ADD MODAL -->
                            <button type="button" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#add_modal_authors">
                                <i class="bi bi-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <!-- <li class="nav-item ">
                                <a href="#" class="nav-link active">All files</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Shared</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">File requests</a>
                            </li> -->
                </ul>
            </div>
        </div>
    </header>
    <!-- Main -->
    <main class=" bg-surface-secondary">
        <div class="container-fluid">
            <!-- Card stats -->
            <div class="container my-2">

                <div class="table-responsive">
                    <table id="myAuthorsTable" class="table table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">authorID</th>
                                <th class="text-light">authorName</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- Toast Notif -->
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header  bg-success">
                            <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
                            <strong class="me-auto text-white">Successfull</strong>
                            <small><i class="fa fa-users"></i></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            New Author Added
                        </div>
                    </div>
                </div>
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="delete_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header  bg-danger">
                            <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
                            <strong class="me-auto text-white">Delete</strong>
                            <small><i class="fa fa-users"></i></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Auhtor removed.
                        </div>
                    </div>
                </div>

                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="update_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header  bg-info">
                            <img src="<?= base_url('assets/img/bell.png') ?>" class="rounded me-2" height="20" width="20" alt="...">
                            <strong class="me-auto text-white">Updated</strong>
                            <small><i class="fa fa-users"></i></small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Author updated
                        </div>
                    </div>
                </div>
                <!-- End TOASt -->

                <!-- Modal Add -->
                <div class="modal fade" id="add_modal_authors" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Author</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="frmauthor">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="author_name" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Author Name</label>
                                        <div class="text-danger" id="error_author_name"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary create">Create</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Add -->

                <div class="modal fade" id="edit_modal_authors" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Author</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="frmauthoredit">
                                <div class="modal-body">
                                    <input type="text" name="edit_id" id="edit_id" aria-valuetext="">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="author_name" class="form-control" id="edit_author_name" placeholder="name@example.com">
                                        <label for="floatingInput">Author Name</label>
                                        <div class="text-danger" id="error_author_name"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary update" data-bs-dismiss="modal">Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- End Modal Update -->
                <!-- Delete Modal -->
                <div class="modal fade" id="delete_modal_authors" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Delete Subject</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="display-6">Are you sure you want to delete?</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger confirm_delete" data-bs-dismiss="modal">Yes</button>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Delete Modal -->
            </div>
    </main>
</div>

</body>
<?= $this->include('layout/script.php') ?>
<script>
    $(document).ready(function() {
        $("#frmauthor").on("submit", function(e) {
            e.preventDefault();
            let a = $(this).serialize();
            $.ajax({
                url: "<?= site_url('authors/add') ?>",
                type: "POST",
                data: a,
                dataType: "json",
                success: function(data) {
                    if (data.error == 1) {
                        $('#frmauthor')[0].reset();
                        $("#liveToast").fadeIn();
                        $("#myAuthorsTable").DataTable().ajax.reload();
                        setTimeout(function() {
                            $("#liveToast").fadeOut();
                        }, 3000)
                    } else if (data.error == 0) {
                        $("#error_author_name").text(data.error_author_name);
                    }
                }
            })

        })

        initializeTable();

    })

    function initializeTable() {
        $('#myAuthorsTable').DataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0, 1, 2],
            }],

            "order": [],
            "serverSide": true,
            "searching": true,
            "lengthChange": true,
            "ajax": {
                url: "<?= base_url('authors/view') ?>",
                type: 'POST'
            }
        });
    }
</script>




<script>
    $(document).on("click", ".edit", function() {
        let a = $(this).data('id');
        alert(a)
        rowid(a);
        // console.log(a)
    })

    function rowid(row) {
        $.ajax({
            url: "<?= site_url('authors/view/row') ?>",
            type: "post",
            data: {
                id: row
            },
            dataType: "json",
            success: function(data) {
                $("#edit_id").val(row);
                $("#edit_modal_authors").modal("show")
                $("#edit_author_name").val(data.author_name);

            }
        })
    }
</script>
<script>
    $(document).ready(function() {
        $("#frmauthoredit").submit(function(e) {
            e.preventDefault()
            let a = $(this).serialize();
            update_data(a)
            // alert("2: "+a)
        })
    })

    // let upd;

    function update_data(upd) {
       
        $.ajax({
            url: "<?= site_url('authors/update') ?>",
            type: "post",
            data: upd,
            dataType: "json",
            success: function(data) {
                alert("3: "+upd)
                if (data.status == 1) {
                    $("#update_toast").fadeIn();
                    $("#myAuthorsTable").DataTable().ajax.reload();
                    setTimeout(function() {
                        $("#update_toast").fadeOut();
                    }, 3000)
                } else {
                    alert("Something wrong")
                }
            }
        })
    }
</script>
<script>
    $(document).on("click", ".delete", function() {
        $("#delete_modal_authors").modal("show")
        let id = $(this).data('id');
        let del = $(".confirm_delete").click(function() {
            deleteId(id)
            console.log(id)
        })
    });

    // let rowD;

    function deleteId(rowD) {
        console.log('a' + rowD)
        $.ajax({
            url: "<?= base_url('authors/delete') ?>",
            type: "post",
            data: {
                id: rowD
            },
            dataType: "json",
            success: function(data) {
                if (data.status == 1) {
                    $("#delete_toast").fadeIn();
                    $("#myAuthorsTable").DataTable().ajax.reload();
                    setTimeout(function() {
                        $("#delete_toast").fadeOut();
                    }, 3000)
                } else {
                    alert("something wrong");
                }
            }
        })
    }
</script>

</html>