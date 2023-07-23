<?php require APPROOT.'/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_error'); ?>
                <h2>Create An Account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?= URLROOT ?>/users/register" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: <sup>*</sup></label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                         value="<?= $data['name']; ?>"/>
                        <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <sup>*</sup></label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                               value="<?= $data['email']; ?>"/>
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: <sup>*</sup></label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                               value="<?= $data['password']; ?>"/>
                        <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password: <sup>*</sup></label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                               value="<?= $data['name']; ?>"/>
                        <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                    </div>
                    
                    <div class="row">
                        <div class="col d-grid">
                            <input type="submit" value="Register" class="btn btn-success" />
                        </div>
                        <div class="col d-grid">
                            <a href="<?= URLROOT ?>/users/login" class="btn btn-light">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h1><?= $data['title'] ?></h1>
<?php require APPROOT.'/views/inc/footer.php'; ?>