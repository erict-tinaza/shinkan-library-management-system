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
                            <button type="button" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#add_modal_books">
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
                            New Book Added
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
                            Subject removed.
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
                            Subject updated
                        </div>
                    </div>
                </div>
                <!-- End TOASt -->
                <!-- Modal Add -->
                <div class="modal fade" id="add_modal_books" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Author</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="frmauthors">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="author_id" class="form-control" id="floatingInputAuthorID" placeholder="name@example.com">
                                        <label for="floatingInputAuthorID">Author_ID</label>
                                        <div class="text-danger" id="error_authorID"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="author_name" class="form-control" id="floatingInputAuthorName" placeholder="name@example.com">
                                        <label for="floatingInputAuthorName">Author_Name</label>
                                        <div class="text-danger" id="error_authorName"></div>
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

                <!-- Modal UPDATE -->
                <div class="modal fade" id="edit_modal_books" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Book</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="frmbookedit">
                                <div class="modal-body">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" class="form-control" id="edit_title" placeholder="name@example.com">
                                        <label for="floatingInputTitle">Title</label>
                                        <div class="text-danger" id="error_title"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="author_id" class="form-control" id="edit_authorID" placeholder="name@example.com">
                                        <label for="floatingInputAuthorID">Author_ID</label>
                                        <div class="text-danger" id="error_authorID"></div>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <input type="text" name="isbn" class="form-control" id="edit_isbn" placeholder="name@example.com">
                                        <label for="floatingInputISBN">ISBN</label>
                                        <div class="text-danger" id="error_isbn"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="quantity" class="form-control" id="edit_qty" placeholder="name@example.com">
                                        <label for="floatingInputQTY">Quantity</label>
                                        <div class="text-danger" id="error_qty"></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="available_quantity" class="form-control" id="edit_availQTY" placeholder="name@example.com">
                                        <label for="floatingInputAvailQTY">Available Quantity</label>
                                        <div class="text-danger" id="error_availQTY"></div>
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
                <div class="modal fade" id="delete_modal_subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
</div>
</body>
<?= $this->include('layout/script.php') ?>
<script>
    $(document).ready(function() {
        $("#frmbooks").on("submit", function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "<?= site_url('books/add') ?>",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(data) {
                    if (data.error == 1) {
                        $('#frmbooks')[0].reset();
                        $("#liveToast").fadeIn();
                        $("#myBooksTable").DataTable().ajax.reload();
                        setTimeout(function() {
                            $("#liveToast").fadeOut();
                        }, 3000);
                    } else if (data.error == 0) {
                        $("#error_title").text(data.error_title);
                        $("#error_authorID").text(data.error_authorID);
                        $("#error_isbn").text(data.error_isbn);
                        $("#error_qty").text(data.error_qty);
                        $("#error_availQTY").text(data.error_availQTY);

                    }
                }
            });
        });

        initializeBooksTable();
    });

    function initializeBooksTable() {
        $('#myBooksTable').DataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0, 1, 2],
            }],

            "order": [],
            "serverSide": true,
            "searching": true,
            "lengthChange": true,
            "ajax": {
                url: "<?= base_url('books/view') ?>",
                type: 'POST'
            }
        });
    }
</script>

<script>
    $(document).on("click", ".edit", function() {
        let a = $(this).data('id');
        rowid(a);
    })

    let row;

    // function rowid(row) {
    //     $.ajax({
    //         url: "<?= site_url('books/view/row') ?>",
    //         type: "post",
    //         data: {
    //             id: row
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //             $("#edit_id").val(data.id);
    //             $("#edit_modal_books").modal("show")
    //             $("#edit_title").val(data.code);
    //             $("#edit_description").val(data.description);

    //         }
    //     })
    // }
    function rowid(row) {
    $.ajax({
        url: "<?= site_url('books/view/row') ?>",
        type: "post",
        data: { id: row },
        dataType: "json",
        success: function(data) {
            $("#edit_id").val(data.book_id);
            $("#edit_modal_books").modal("show");
            $("#edit_title").val(data.title);
            $("#edit_authorID").val(data.author_id);
            $("#edit_isbn").val(data.isbn);
            $("#edit_qty").val(data.quantity);
            $("#edit_availQTY").val(data.available_quantity);
        }
    });
}

</script>
<script>
    $(document).ready(function() {
        $("#frmbookedit").submit(function(e) {
            e.preventDefault()
            let a = $(this).serialize();
            update_data(a)
        })
    })

    let upd;

    // function update_data(upd) {
    //     $.ajax({
    //         url: "<?= site_url('books/update') ?>",
    //         type: "post",
    //         data: upd,
    //         dataType: "json",
    //         success: function(data) {
    //             if (data.status == 1) {
    //                 $("#update_toast").fadeIn();
    //                 $("#myBooksTable").DataTable().ajax.reload();
    //                 setTimeout(function() {
    //                     $("#update_toast").fadeOut();
    //                 }, 3000)
    //             } else {
    //                 alert("Something wrong")
    //             }
    //         }
    //     })
    // }
    function update_data(upd) {
    $.ajax({
        url: "<?= site_url('books/update') ?>",
        type: "post",
        data: upd,
        dataType: "json",
        success: function(data) {
            if (data.status == 1) {
                $("#update_toast").fadeIn();
                $("#myBooksTable").DataTable().ajax.reload();
                setTimeout(function() {
                    $("#update_toast").fadeOut();
                }, 3000);
            } else {
                alert("Something wrong");
            }
        }
    });
}
</script>
<script>
    $(document).on("click", ".delete", function() {
        $("#delete_modal_subject").modal("show")
        let id = $(this).data('id');
        let del = $(".confirm_delete").click(function() {
            deleteId(id)
        })
    });

    let rowD;

    function deleteId(rowD) {
    $.ajax({
        url: "<?= site_url('books/delete') ?>",
        type: "post",
        data: { id: rowD },
        dataType: "json",
        success: function(data) {
            if (data.status == 1) {
                $("#delete_toast").fadeIn();
                $("#myBooksTable").DataTable().ajax.reload();
                setTimeout(function() {
                    $("#delete_toast").fadeOut();
                }, 3000);
            } else {
                alert("Something wrong");
            }
        }
    });
}
</script>

</html>