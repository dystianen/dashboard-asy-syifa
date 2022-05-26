<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="text-center">
        <h5 style="color: gray">List Your Task today!</h5>
    </div>
</section>

<section>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Task</th>
                            <th>Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($job as $j) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
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
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "responsive": true,
        });
    });
</script>
<?= $this->endSection() ?>