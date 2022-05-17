<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="container">

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
                >Add</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5 class="card-title mb-0 text-gray-900">Create Employee</h5>
        </div>

        <div class="card-body">
            <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input
                                name="nik"
                                class="form-control"
                                id="nik"
                                placeholder="example: 3521067738749"
                                value="<?= set_value('nik') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                name="email"
                                class="form-control"
                                id="email"
                                type="email"
                                placeholder="example: example@gmail.com"
                                value="<?= set_value('email') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="place_of_birth">Place of Birth</label>
                            <input
                                name="place_of_birth"
                                class="form-control"
                                id="place_of_birth"
                                placeholder="example: Malang"
                                value="<?= set_value('place_of_birth') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input
                                name="age"
                                class="form-control"
                                id="age"
                                placeholder="example: 20"
                                value="<?= set_value('age') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                name="phone_number"
                                class="form-control"
                                id="phone"
                                placeholder="example: 08146635529"
                                value="<?= set_value('phone_number') ?>"
                            >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input
                                name="fullname"
                                class="form-control"
                                id="fullname"
                                placeholder="example: brotherhood"
                                value="<?= set_value('fullname') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                name="password"
                                class="form-control"
                                id="password"
                                type="password"
                                value="<?= set_value('password') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input
                                name="date_of_birth "
                                class="form-control"
                                id="date_of_birth"
                                type="date"
                                value="<?= set_value('date_of_birth') ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="custom-select" value="<?= set_value('gender') ?>">
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea
                                name="address"
                                class="form-control"
                                id="address"
                                placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"
                                value="<?= set_value('address') ?>"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer text-right">
            <a
                type="button"
                class="btn btn-secondary"
                href="/admin/employee"
            >Cancel</a>
            <button
                type="submit"
                class="btn btn-primary"
            >Save</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>