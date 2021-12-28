<main class="py-4">
    <div class="container py-5 mt-4">
        <div class="d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card text-center border-dark mb-3 shadow bg-dark">
                    <div class="card-header text-white">
                        Forgot Password
                    </div>
                    <div class="card-body shadow">
                        <!-- <?= form_open_multipart('users/processRegis');?> -->
                        <div class="form-group row text-white mb-3">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Input Your Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="<?= set_values('email') ?>" required autofocus>
                                <?= form_error('email', '<small class="text-danger pl-3>','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>