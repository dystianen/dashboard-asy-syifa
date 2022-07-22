<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="container-fluid">

        <div class="d-sm-flex flex-column mb-4">
            <h1 class="h3 mb-3 text-gray-800">Employee</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/employee">Employee</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="card-title mb-0 text-gray-900">Edit Employee</h5>
            </div>

            <div class="card-body mt-2">
                <form action="<?php echo base_url(); ?>/admin/employee/update/<?= $user['userId'] ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik" class="form-label">NIK <span style="color: red">*</span></label>
                                <input name="nik"
                                       class="form-control <?= ($validation->hasError('nik') ? 'is-invalid' : '') ?>"
                                       id="nik" placeholder="example: 3521067738749" value="<?= $user['nik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                                <input name="email"
                                       class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>"
                                       id="email" type="email" placeholder="example: example@gmail.com"
                                       value="<?= $user['email'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="place_of_birth" class="form-label">Place of Birth <span
                                            style="color: red">*</span></label>
                                <input name="place_of_birth"
                                       class="form-control <?= ($validation->hasError('place_of_birth') ? 'is-invalid' : '') ?>"
                                       id="place_of_birth" placeholder="example: Malang"
                                       value="<?= $user['place_of_birth'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('place_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age" class="form-label">Age <span style="color: red">*</span></label>
                                <input name="age"
                                       class="form-control <?= ($validation->hasError('age') ? 'is-invalid' : '') ?>"
                                       id="age" placeholder="example: 20" value="<?= $user['age'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('age') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number <span
                                            style="color: red">*</span></label>
                                <input name="phone_number"
                                       class="form-control <?= ($validation->hasError('phone_number') ? 'is-invalid' : '') ?>"
                                       id="phone" placeholder="example: 08146635529"
                                       value="<?= $user['phone_number'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone_number') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="fullname" class="form-label">Fullname <span
                                            style="color: red">*</span></label>
                                <input name="fullname"
                                       class="form-control <?= ($validation->hasError('fullname') ? 'is-invalid' : '') ?>"
                                       id="fullname" placeholder="example: brotherhood"
                                       value="<?= $user['fullname'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">Date of Birth <span
                                            style="color: red">*</span></label>
                                <input name="date_of_birth"
                                       class="form-control <?= ($validation->hasError('date_of_birth') ? 'is-invalid' : '') ?>"
                                       id="date_of_birth" type="date" value="<?= $user['date_of_birth'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('date_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="form-label">Position <span
                                            style="color: red">*</span></label>
                                <input name="position"
                                       class="form-control <?= ($validation->hasError('position') ? 'is-invalid' : '') ?>"
                                       id="position" value="<?= $user['position'] ?>" placeholder="example: Programmer">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('position') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender <span style="color: red">*</span></label>
                                <select name="gender"
                                        class="form-select <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>"
                                        id="basicSelect" value="<?= $user['gender'] ?>">
                                    <option value="">--please select--</option>
                                    <option value="Male" <?php if ($user['gender'] == 'Male') {
                                        echo 'selected';
                                    } ?>>Male
                                    </option>
                                    <option value="Female" <?php if ($user['gender'] == 'Female') {
                                        echo 'selected';
                                    } ?>>Female
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gender') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Address <span
                                            style="color: red">*</span></label>
                                <textarea name="address"
                                          class="form-control <?= ($validation->hasError('address') ? 'is-invalid' : '') ?>"
                                          id="address"
                                          placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"><?= $user['address'] ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('address') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales -->
                    <div class="card shadow mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Job Type</th>
                                        <th>Description</th>
                                        <th>Point</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($job as $j) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $j['type_of_work'] ?></td>
                                            <td><?= $j['description'] ?></td>
                                            <td><?= $j['point'] ?></td>
                                            <td><?= date_format(date_create($j['created_at']), 'd M Y H:i') ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>/admin/job/edit/<?= $j['jobId'] ?>"
                                                   class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a class="btn btn-warning btn-sm"><i class="bi bi-eye-fill"></i></a>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal<?= $j['jobId'] ?>"><i
                                                            class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="float-end pt-3">
                        <a type="button" class="btn btn-secondary" href="/admin/employee">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script type="text/javascript">
        $(document).ready(function () {
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
                "buttons": [{
                    text: 'Create',
                    action: function (e, dt, node, config) {
                        window.location.href = '/admin/job/form/<?= $user['userId'] ?>'
                    }
                }]
            });
        });
    </script>
<?= $this->endSection() ?>