<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">Attedance</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dahsboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Attedance</li>
            </ol>
        </nav>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category</th>
                            <th>Reason</th>
                            <th>File</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($attedance as $e) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $e['category']; ?></td>
                                <td><?= $e['description']; ?></td>
                                <td><?= $e['file']; ?></td>
                                <td><?= date_format(date_create($e['created_at']), 'd M Y H:i') ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <a href="#" class="btn btn-link"><i class="bi bi-eye-fill"></i></a>
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
            "responsive": true,
            "paging": true,
            "ordering": true,
            "info": true,
            "buttons": [
                'excel',
            ]
        });
    });
</script>
<?= $this->endSection() ?>