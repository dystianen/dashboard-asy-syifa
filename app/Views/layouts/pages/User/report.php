<?= $this->extend('layouts/base_employee') ?>

<?= $this->section('content') ?>
<section>
    <div class="text-center">
        <span style="color: gray">Please report your Task today!</span>
    </div>
</section>

<section>
    <h5>List Task</h5>
    <form>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Create Employee
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Update Employee
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Read Employee
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
                Delete Employee
            </label>
        </div>
        <div class="mt-4">
            <a class="btn btn-secondary" href="/user/absent">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>
<?= $this->endSection() ?>