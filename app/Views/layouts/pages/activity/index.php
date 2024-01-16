<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-3 text-gray-800">Kegiatan</h1>
    </div>

    <?php if (session()->getFlashData('success_activity')) : ?>
        <div class="alert success alert-success" role="alert">
            <?php echo session("success_activity") ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo base_url(); ?>/activity/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-4">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" id="title" class="form-control" placeholder="example: Hadroh">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="formFileMultiple" class="form-label">Upload Image</label>
                        <div style="display: flex; gap: 10px">
                            <input class="form-control" type="file" name="file" id="formFileMultiple">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>File Name</th>
                            <th>File Type</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($activity as $n) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $n["title"] ?></td>
                                <td><?= $n["file_name"] ?></td>
                                <td><?= $n["file_type"] ?></td>
                                <td><img src="<?= $n['file_path'] ?>" width="50" height="50" style="object-fit: contain;" /></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $n['activities_id'] ?>">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php foreach ($activity as $n) : ?>
        <div class="modal fade" id="deleteModal<?= $n['activities_id'] ?>" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3>Are you sure</h3>
                        Do you really delete this image?
                        </br>
                        <div class="pt-3">
                            <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">No</button>
                            <form class="d-inline" method="post" action="<?= base_url(); ?>/activity/delete/<?= $n['activities_id'] ?>">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger m-2">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
    $(".success").fadeTo(2000, 500).slideUp(500, function() {
        $(".success").slideUp(500);
    });
</script>
<?= $this->endSection() ?>