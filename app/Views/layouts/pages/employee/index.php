<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee</h1>

        <nav aria-label="breadcrumb">
            <ol
                class="breadcrumb"
                style="background-color: none"
            >
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >Employee</li>
            </ol>
        </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form class="d-flex justify-content-between">
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    style="width: 25%"
                >

                <div>
                    <button
                        type="button"
                        data-toggle="modal"
                        data-target="#modalFilter"
                        class="btn btn-light"
                    ><i class="fas fa-fw fa-filter"></i> Filter</button>
                    <a
                        type="button"
                        class="btn btn-primary"
                        href="/admin/employee/add"
                    ><i class="fas fa-fw fa-plus"></i> Create</a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                >
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>NIK</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <tr>
                            <td>1</td>
                            <td>0018827399281</td>
                            <td>Sida</td>
                            <td>sida@gmail.com</td>
                            <td>08133672662</td>
                            <td>
                                <div class="row">
                                    <button class="btn btn-link"><i class="fas fa-fw fa-eye"></i></button>
                                    <button class="btn btn-link"><i class="fas fa-fw fa-edit"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Filter -->
    <div
        class="modal fade"
        id="modalFilter"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-backdrop="static"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="exampleModalLabel"
                    >Filter</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="jobType">Job Type</label>
                            <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">Programmer</option>
                                <option value="2">UI/UX</option>
                                <option value="3">Devops</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >Close</button>
                    <button
                        type="button"
                        class="btn btn-primary"
                    >Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>