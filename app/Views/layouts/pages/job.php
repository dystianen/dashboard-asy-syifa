<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">Job</h1>

        <nav aria-label="breadcrumb">
            <ol
                class="breadcrumb"
                style="background-color: none"
            >
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >Job</li>
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
                <button
                    class="btn btn-primary"
                    type="submit"
                >Filter</button>
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
                            <th>Job Type</th>
                            <th>Description</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Programer</td>
                            <td>Create, Update, Read & Delete</td>
                            <td>2000</td>
                        </tr>
                        <tr>
                            <td>Devops</td>
                            <td>Deploy Aplication</td>
                            <td>3000</td>
                        </tr>
                        <tr>
                            <td>UI/UX</td>
                            <td>Wireframe</td>
                            <td>2000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>