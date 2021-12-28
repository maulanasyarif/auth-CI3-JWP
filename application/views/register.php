<main class="py-4">
    <div class="container py-5 mt-4">
        <div class="d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card text-center border-dark mb-3 shadow bg-dark">
                    <div class="card-header text-white">
                        Please Regist !!!
                    </div>
                    <div class="card-body shadow">
                        <?= form_open_multipart('users/processRegis');?>
                        <div class="form-group row text-white mb-3">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="<?= set_value('name') ?>" required autofocus>

                                <?= form_error('name', '<div class="text-danger small" ml-3> '); ?>
                            </div>
                        </div>

                        <div class="form-group row text-white mb-3">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="<?= set_value('name') ?>" required autofocus>

                                <?= form_error('email', '<div class="text-danger small" ml-3> '); ?>
                            </div>
                        </div>

                        <div class="form-group row text-white mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?= form_error('password', '<div class="text-danger small" ml-3> '); ?>
                            </div>
                        </div>

                        <div class="form-group row text-white mb-3">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>

                            <div class="col-md-6">
                                <input name="foto" class="form-control form-control-sm" type="file">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Regis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</main>