<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>

        <nav aria-label="breadcrumb">
            <ol
                class="breadcrumb"
                style="background-color: none"
            >
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >Karyawan</li>
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

</div>
<?= $this->endSection() ?>