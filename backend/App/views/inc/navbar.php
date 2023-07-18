<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/users/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/users/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>