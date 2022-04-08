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
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalCreate"
                    ><i class="fas fa-fw fa-plus"></i> Create</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                >
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat/Tanggal Lahir</th>
                            <th>Kewarganegaraan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dystian</td>
                            <td>Laki-Laki</td>
                            <td>Ngawi, 14 April 2003</td>
                            <td>Indonesia</td>
                            <td>S1</td>
                            <td>Ngawi</td>
                            <td>Programmer</td>
                        </tr>
                        <tr>
                            <td>Eka Trisnawati</td>
                            <td>Laki-Laki</td>
                            <td>Ngawi, 14 April 2003</td>
                            <td>Indonesia</td>
                            <td>S1</td>
                            <td>Ngawi</td>
                            <td>Programmer</td>
                        </tr>
                        <tr>
                            <td>Edinburgh</td>
                            <td>Laki-Laki</td>
                            <td>Ngawi, 14 April 2003</td>
                            <td>Indonesia</td>
                            <td>S1</td>
                            <td>Ngawi</td>
                            <td>Programmer</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div
        class="modal fade"
        id="modalCreate"
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
                    >Create Job</h5>
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
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input
                                class="form-control"
                                id="description"
                                placeholder="Create, Update Read & Delete"
                            >
                        </div>
                        <div class="form-group">
                            <label for="point">Point</label>
                            <input
                                class="form-control"
                                id="point"
                                placeholder="2000"
                            >
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