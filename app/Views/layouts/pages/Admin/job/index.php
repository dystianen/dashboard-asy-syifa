<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">Jobs</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Jobs
                </li>
            </ol>
        </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Job Type</th>
                            <th>Description</th>
                            <th>Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($job as $j) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $j['type_of_work'] ?></td>
                                <td><?= $j['description'] ?></td>
                                <td><?= $j['point'] ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="<?php echo base_url(); ?>/admin/job/edit/<?= $j['id'] ?>" class="btn btn-link"><i class="bi bi-pencil-square"></i></a>
                                        </div>
                                        <div class="col-2">
                                            <a class="btn btn-link"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $j['id'] ?>"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            // "dom": 'QBflrtip',
            "dom": `Q
                <'row mt-3'
                    <'col-sm-12 col-md-4'l>
                    <'col-sm-12 col-md-8'
                        <'row'
                            <'col-sm-12 col-md-9'f>
                            <'col-sm-12 col-md-3'B>
                        >
                    >
                >
                ` +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "responsive": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "buttons": [
                'excel',
                {
                    text: 'Create',
                    action: function(e, dt, node, config) {
                        window.location.href = '/admin/job/create'
                    }
                }
            ]
        });
    });
</script>
<?= $this->endSection() ?>