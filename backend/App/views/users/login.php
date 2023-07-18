<?php require APPROOT.'/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?= URLROOT ?>/users/login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <sup>*</sup></label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                               value="<?= $data['email']; ?>"/>
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: <sup>*</sup></label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                               value="<?= $data['confirm_password']; ?>"/>
                        <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col d-grid">
                            <input type="submit" value="Login" class="btn btn-success" />
                        </div>
                        <div class="col d-grid">
                            <a href="<?= URLROOT ?>/users/register" class="btn btn-light">No account? Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h1><?= $data['title'] ?></h1>
<?php require APPROOT.'/views/inc/footer.php'; ?>