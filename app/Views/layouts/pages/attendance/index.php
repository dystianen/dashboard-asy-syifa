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
                            <th>Employee</th>
                            <th>Category</th>
                            <th>Reason</th>
                            <th>File</th>
                            <th>Absent Sign In</th>
                            <th>Absent Sign Out</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($attendance as $e) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $e['fullname']; ?></td>
                                <?php if ($e['category']) : ?>
                                    <td><?= $e['category']; ?></td>
                                <?php else : ?>
                                    <td>-</td>
                                <?php endif; ?>

                                <?php if ($e['description']) : ?>
                                    <td><?= $e['description']; ?></td>
                                <?php else : ?>
                                    <td>-</td>
                                <?php endif; ?>

                                <?php if ($e['user_proof_file']) : ?>
                                    <td><?= substr($e['user_proof_file'], 0, 15) ?></td>
                                <?php else : ?>
                                    <td>-</td>
                                <?php endif; ?>

                                <td><?= date_format(date_create($e['created_at']), 'd M Y H:i:s') ?></td>
                                <td><?= date_format(date_create($e['updated_at']), 'd M Y H:i:s') ?></td>

                                <?php if ($e['category'] !== 'hadir') : ?>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                <a href="<?= base_url() . "/assets/media/berkas/" . $e['user_proof_file'] ?>" target="_blank" class="btn btn-link"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                <?php else : ?>
                                    <td>No action</td>
                                <?php endif; ?>
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
            ]
        });
    });
</script>
<?= $this->endSection() ?>