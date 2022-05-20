<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="container-fluid">

        <div class="d-sm-flex flex-column mb-4">
            <h1 class="h3 mb-3 text-gray-800">Employee</h1>

            <nav aria-label="breadcrumb">
                <ol
                        class="breadcrumb"
                >
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/employee">Employee</a></li>
                    <li
                            class="breadcrumb-item active"
                            aria-current="page"
                    >Edit
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="card-title mb-0 text-gray-900">Edit Employee</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo base_url(); ?>/admin/employee/update/<?= $user['id'] ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK <span style="color: red">*</span></label>
                                <input
                                        name="nik"
                                        class="form-control <?= ($validation->hasError('nik') ? 'is-invalid' : '') ?>"
                                        id="nik"
                                        placeholder="example: 3521067738749"
                                        value="<?= $user['nik'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span style="color: red">*</span></label>
                                <input
                                        name="email"
                                        class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>"
                                        id="email"
                                        type="email"
                                        placeholder="example: example@gmail.com"
                                        value="<?= $user['email'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="place_of_birth">Place of Birth <span style="color: red">*</span></label>
                                <input
                                        name="place_of_birth"
                                        class="form-control <?= ($validation->hasError('place_of_birth') ? 'is-invalid' : '') ?>"
                                        id="place_of_birth"
                                        placeholder="example: Malang"
                                        value="<?= $user['place_of_birth'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('place_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age">Age <span style="color: red">*</span></label>
                                <input
                                        name="age"
                                        class="form-control <?= ($validation->hasError('age') ? 'is-invalid' : '') ?>"
                                        id="age"
                                        placeholder="example: 20"
                                        value="<?= $user['age'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('age') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span style="color: red">*</span></label>
                                <textarea
                                        name="address"
                                        class="form-control <?= ($validation->hasError('address') ? 'is-invalid' : '') ?>"
                                        id="address"
                                        placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"
                                ><?= $user['address'] ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('address') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="fullname">Fullname <span style="color: red">*</span></label>
                                <input
                                        name="fullname"
                                        class="form-control <?= ($validation->hasError('fullname') ? 'is-invalid' : '') ?>"
                                        id="fullname"
                                        placeholder="example: brotherhood"
                                        value="<?= $user['fullname'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth <span style="color: red">*</span></label>
                                <input
                                        name="date_of_birth"
                                        class="form-control <?= ($validation->hasError('date_of_birth') ? 'is-invalid' : '') ?>"
                                        id="date_of_birth"
                                        type="date"
                                        value="<?= $user['date_of_birth'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('date_of_birth') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gender <span style="color: red">*</span></label>
                                <select name="gender"
                                        class="form-select <?= ($validation->hasError('gender') ? 'is-invalid' : '') ?>"
                                        id="basicSelect" value="<?= $user['gender'] ?>">
                                    <option value="">--please select--</option>
                                    <option value="Male" <?php if($user['gender'] == 'Male'){echo 'selected';}?>>Male</option>
                                    <option value="Female" <?php if($user['gender'] == 'Female'){echo 'selected';}?>>Female</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gender') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <span style="color: red">*</span></label>
                                <input
                                        name="phone_number"
                                        class="form-control <?= ($validation->hasError('phone_number') ? 'is-invalid' : '') ?>"
                                        id="phone"
                                        placeholder="example: 08146635529"
                                        value="<?= $user['phone_number'] ?>"
                                >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone_number') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end pt-3">
                        <a
                                type="button"
                                class="btn btn-secondary"
                                href="/admin/employee"
                        >Cancel</a>
                        <button
                                type="submit"
                                class="btn btn-primary"
                        >Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>