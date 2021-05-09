<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 ml-3 text-gray-900">Hello, <?= $user['name'] ?> </h4>
    </div>


    <div class="row">

        <div class="col-lg-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 active_user">Active Writers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $active_user ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Post Count</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $post_count ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-info">
                    <h4 class="m-0 font-weight-bold text-light">What's new today ?</h4>
                </div>
                <form role="form" method="post" class="px-4 py-3 shadow" style="color:#000 !important; " action="<?= base_url('user/addpost/') ?>">
                    <div class="form-group">
                        Title
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title..">
                    </div>
                    <div class="form-group">
                        Author
                        <input readonly type="text" class="form-control" id="author" name="author" placeholder="Author.." value="<?= $user['name'] ?>">
                    </div>
                    <div class="form-group">
                        Date Created
                        <input readonly type="text" class="form-control" id="date_created" name="date_created" placeholder="Date Created" value="<?= date('d F Y', time()); ?>">
                    </div>
                    <div class="form-group">
                        Content
                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Write to Inspire ..." rows="3" cols="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default btn-info btn-block mb-3">Post !</button>
                </form>

            </div>

        </div>

    </div>




    <hr style="height:1px;border:none;color:#ccc;background-color:#ccc;width:70%;" />






    <?php foreach (array_reverse($listpost) as $b) {

    ?>
        <div class="row py-2">
            <div class="col-lg-6 offset-3">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h4 class="m-0 font-weight-bold text-light"><?= $b['title'] ?></h4>
                    </div>
                    <div class="card-body py-3">
                        <h6 class="m-0 font-weight-bold text-default"><?= date('d F Y', $b['post_date']); ?> </h6>
                    </div>
                    <div class="card-body py-2">
                        <?= $b['content'] ?>
                    </div>
                    <div class="card-body mb-1 ml-auto">
                        <h6 class="m-0 font-weight-bold text-primary">Posted by : <?= $b['author'] ?></h6>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>


</div>


</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->