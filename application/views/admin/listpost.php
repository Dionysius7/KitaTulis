 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">List of Post</h1>
     <div class="text-left my-2">
         <a href="#addPostModal" class="btn btn-success btn-icon-split" data-toggle="modal">
             <span class="icon text-white-10">
                 <i class="fas fa-plus"></i>
             </span>
             <span class="text">Add Post</span>
         </a>
     </div>

     <?= $this->session->flashdata('message'); ?>

     <!-- Modal for ADDING POST-->
     <div class="modal fade" id="addPostModal" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header" style="padding:35px 30px; background-color:#18A472; color:#fff;">
                     <h4><span class="fas fa-plus mx-2"></span>Add Post</h4>
                     <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                 </div>
                 <div class="modal-body">
                     <form role="form" method="post" style="color:#000 !important" action="<?= base_url('admin/addpost/') ?>">
                         <div class="form-group">
                             Title
                             <input type="text" class="form-control" id="title" name="title" placeholder="Post Title..">
                         </div>
                         <div class="form-group">
                             Author
                             <input readonly type="text" class="form-control" id="author" name="author" placeholder="Author.." value="<?= $user['name'] ?>">
                         </div>
                         <div class="form-group">
                             Date Created
                             <input readonly type="text" class="form-control" id="date_created" name="date_created" placeholder="Author.." value="<?= date('d F Y', time()); ?>">
                         </div>
                         <div class="form-group">
                             Content
                             <textarea type="text" class="form-control" id="content" name="content" placeholder="Enter Content.." rows="5" cols="10"></textarea>
                         </div>
                         <button type="submit" class="btn btn-default btn-success btn-block">Submit Post</button>
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
             </div>

         </div>
     </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">List of Post</h6>

         </div>

         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Title</th>
                             <th>Author</th>
                             <th>Date Created</th>
                             <th>Content</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($listpost as $a) {

                            ?>
                             <tr>

                                 <td style="width:10%" class="text-center align-middle"><?= $a['title'] ?></td>
                                 <td style="width:10%" class="text-center align-middle"><?= $a['author'] ?></td>
                                 <td style="width:10%" class="text-center align-middle"><?= date('d F Y', $a['post_date']); ?></td>
                                 <td style="width:15%" class="text-center align-middle"><textarea readonly rows="3" cols="30"><?= $a['content'] ?></textarea></td>
                                 <td class="text-center text-center align-middle" style="width:20%">

                                     <a href="<?= '#editPostModal' . $a['id']; ?>" class="btn btn-primary btn-icon-split" data-toggle="modal">
                                         <span class="icon text-white-50">
                                             <i class="fas fa-pen"></i>
                                         </span>
                                         <span class="text">Edit Post</span>
                                     </a>

                                     <a href="<?= '#delPostModal' . $a['id']; ?>" class="btn btn-danger btn-icon-split" data-toggle="modal">
                                         <span class="icon text-white-50">
                                             <i class="fas fa-trash"></i>
                                         </span>
                                         <span class="text">Delete</span>
                                     </a>

                                 </td>


                                 <!--TOGGLE MODAL-->
                                 <!-- Modal for EDITING POST-->
                                 <div class="modal fade" id="<?= 'editPostModal' . $a['id']; ?>" role="dialog">
                                     <div class="modal-dialog">

                                         <!-- Modal content-->
                                         <div class="modal-content">
                                             <div class="modal-header" style="padding:35px 30px; background-color:#2E59D9; color:#fff;">
                                                 <h4><span class="fas fa-pen mx-2"></span>Edit Post</h4>
                                                 <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                                             </div>
                                             <div class="modal-body">
                                                 <form role="form" method="post" style="color:#000 !important" action="<?= base_url('admin/editpost/') . $a['id']; ?>">
                                                     <div class="form-group">
                                                         Title
                                                         <input type="text" class="form-control" id="title" name="title" placeholder="Post Title.." value="<?= $a['title'] ?>">
                                                     </div>
                                                     <div class="form-group">
                                                         Author
                                                         <input readonly type="text" class="form-control" id="author" name="author" placeholder="Author.." value="<?= $a['author'] ?>">
                                                     </div>
                                                     <div class="form-group">
                                                         Date Created
                                                         <input readonly type="text" class="form-control" id="post_date" name="post_date" placeholder="Author.." value="<?= date('d F Y', $a['post_date']); ?>">
                                                     </div>
                                                     <div class="form-group">
                                                         Content
                                                         <textarea type="text" class="form-control" id="content" name="content" placeholder="Enter Content.." rows="5" cols="10"><?= $a['content'] ?></textarea>
                                                     </div>
                                                     <button type="submit" class="btn btn-default btn-primary btn-block">Confirm Changes</button>
                                                 </form>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                             </div>
                                         </div>

                                     </div>
                                 </div>


                                 <!-- END OF TOGGLE-->

                                 <!--TOGGLE MODAL-->
                                 <!-- Modal for DELETE POST-->
                                 <div class="modal fade" id="<?= 'delPostModal' . $a['id']; ?>" role="dialog">
                                     <div class="modal-dialog">

                                         <!-- Modal content-->
                                         <div class="modal-content">
                                             <div class="modal-header" style="padding:35px 30px; background-color:#E74A3B; color:#fff;">
                                                 <h4><span class="fas fa-trash mx-2"></span>Delete Post</h4>
                                                 <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                                             </div>
                                             <div class="modal-body">
                                                 <form role="form" method="post" style="color:#000 !important" action="<?= base_url('admin/deletepost/') . $a['id']; ?>">
                                                     <div class="form-group">
                                                         Do you want to delete this post?
                                                     </div>
                                                     <button type="submit" class="btn btn-default btn-danger btn-block">Delete Post</button>
                                                 </form>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             </div>
                                         </div>

                                     </div>
                                 </div>


                                 <!-- END OF TOGGLE-->


                             <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->