<main class="py-4">
    <div class="container py-5 mt-4">
        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card text-center border-dark mb-3 shadow bg-dark">
                    <div class="card-header text-white">
                        Please Login !!!
                    </div>
                    <div class="card-body shadow">
                        <form method="post" action="<?= base_url('users/processLogin') ?>">
                            <div class="form-group row text-white mb-3">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="" required
                                        autofocus>

                                </div>
                            </div>

                            <div class="form-group row text-white mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <a href="<?= base_url('users/forgotPassword') ?>" type="button"
                                        class="btn btn-success">Forgot?</a>
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>