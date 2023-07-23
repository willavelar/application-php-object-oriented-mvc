<?php require APPROOT.'/views/inc/header.php'; ?>
    <a href="<?= URLROOT ?>/posts" class="btn btn-light"><i class="fa-solid fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <?php flash('post_error'); ?>
        <h2>Add Post</h2>
        <p>Create a post with this form</p>
        <form action="<?= URLROOT ?>/posts/add" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title: <sup>*</sup></label>
                <input type="text" id="title" name="title" class="form-control form-control-lg <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                       value="<?= $data['title']; ?>"/>
                <span class="invalid-feedback"><?= $data['title_err']; ?></span>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body: <sup>*</sup></label>
                <textarea id="body" name="body"
                          class="form-control form-control-lg <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" ><?= $data['body']; ?></textarea>
                <span class="invalid-feedback"><?= $data['body_err']; ?></span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>