<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
    <div class="container-fluid">

        <div class="d-sm-flex flex-column mb-4">
            <h1 class="h3 mb-3 text-gray-800">Report</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/report">Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5 class="card-title mb-0 text-gray-900">Detail Report</h5>
            </div>

            <div class="card-body mt-2">
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" class="form-label">Employee <span style="color: red">*</span></label>
                            <input disabled name="description" class="form-control" id="description"
                                   value="<?= $report['fullname'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" class="form-label">Description <span style="color: red">*</span></label>
                            <textarea disabled name="description" class="form-control" rows="10"><?= $report['description'] ?></textarea>
                        </div>
                    </div>

                    <div class="pt-3">
                        <button onclick="history.back()" type="button" class="btn btn-secondary">Back</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>