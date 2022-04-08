<?= $this->extend("layouts/components/base") ?>
<?= $this->section("content") ?>
<div class="container d-flex justify-content-center">
    <div class="card">
        <div class="card-header text-center">
            <span style="font-size: 20px">Sign In</span>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label
                        for="exampleInputEmail1"
                        class="form-label"
                    >Email address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                    >
                    <div
                        id="emailHelp"
                        class="form-text"
                        style="font-size: 15px"
                    >We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label
                        for="exampleInputPassword1"
                        class="form-label"
                    >Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                    >
                </div>
                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1"
                    >
                    <label
                        class="form-check-label"
                        for="exampleCheck1"
                    >Check me out</label>
                </div>
                <button
                    type="submit"
                    class="btn btn-primary"
                >Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>