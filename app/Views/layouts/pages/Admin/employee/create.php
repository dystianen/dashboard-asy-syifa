<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div class="container">

    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee</h1>

        <nav aria-label="breadcrumb">
            <ol
                class="breadcrumb"
                style="background-color: transparent"
            >
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
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
            <form>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input
                                class="form-control"
                                id="nik"
                                placeholder="example: 3521067738749"
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                class="form-control"
                                id="email"
                                type="email"
                                placeholder="example: example@gmail.com"
                            >
                        </div>
                        <div class="form-group">
                            <label for="place_of_birth">Place of Birth</label>
                            <input
                                class="form-control"
                                id="place_of_birth"
                                placeholder="example: Malang"
                            >
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input
                                class="form-control"
                                id="age"
                                placeholder="example: 20"
                            >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                class="form-control"
                                id="phone"
                                placeholder="example: 08146635529"
                            >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input
                                class="form-control"
                                id="fullname"
                                placeholder="example: brotherhood"
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                class="form-control"
                                id="password"
                                type="password"
                            >
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input
                                class="form-control"
                                id="date_of_birth"
                                type="date"
                            >
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="custom-select">
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input
                                class="form-control"
                                id="address"
                                placeholder="example: Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139"
                            />
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
                type="button"
                class="btn btn-primary"
            >Save</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>