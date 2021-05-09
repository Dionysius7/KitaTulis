 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">List of Users</h1>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">List of users</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date Created</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($listuser as $a) {

                            ?>
                             <tr>

                                 <td style="width:20%" class="text-center align-middle"><?= $a['name'] ?></td>
                                 <td style="width:10%" class="text-center align-middle"><?= $a['email'] ?></td>
                                 <td style="width:10%" class="text-center align-middle"><?= date('d F Y', $a['date_created']); ?></td>
                                 <td style="width:10%" class="text-center align-middle"><?php switch ($a['is_active']) {
                                                                                            case 0:
                                                                                                echo 'Not Active';
                                                                                                break;

                                                                                            case 1:
                                                                                                echo 'Active';
                                                                                                break;
                                                                                            case 2:
                                                                                                echo 'Blocked';
                                                                                                break;
                                                                                        }
                                                                                        ?></td>
                                 <td class="text-center text-center align-middle" style="width:30%">

                                     <a href="<?= base_url('admin/activateuser/') . $a['id']; ?>" class="btn btn-success btn-icon-split">
                                         <span class="icon text-white-50">
                                             <i class="fas fa-check"></i>
                                         </span>
                                         <span class="text">Activate</span>
                                     </a>

                                     <a href="<?= base_url('admin/blockuser/') . $a['id']; ?>" class="btn btn-warning btn-icon-split">
                                         <span class="icon text-white-50">
                                             <i class="fas fa-times"></i>
                                         </span>
                                         <span class="text">Block</span>
                                     </a>

                                     <a href="<?= '#delPostModal' . $a['id']; ?>" class="btn btn-danger btn-icon-split" data-toggle="modal">
                                         <span class="icon text-white-50">
                                             <i class="fas fa-trash"></i>
                                         </span>
                                         <span class="text">Delete</span>
                                     </a>

                                 </td>

                                 <!--TOGGLE MODAL-->
                                 <!-- Modal for DELETE POST-->
                                 <div class="modal fade" id="<?= 'delPostModal' . $a['id']; ?>" role="dialog">
                                     <div class="modal-dialog">

                                         <!-- Modal content-->
                                         <div class="modal-content">
                                             <div class="modal-header" style="padding:35px 30px; background-color:#E74A3B; color:#fff;">
                                                 <h4><span class="fas fa-trash mx-2"></span>Delete User</h4>
                                                 <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                                             </div>
                                             <div class="modal-body">
                                                 <form role="form" method="post" style="color:#000 !important" action="<?= base_url('admin/deleteuser/') . $a['id']; ?>">
                                                     <div class="form-group">
                                                         Do you want to delete this USER?
                                                     </div>
                                                     <button type="submit" class="btn btn-default btn-danger btn-block">Delete User</button>
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