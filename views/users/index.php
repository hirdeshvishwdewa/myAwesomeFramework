<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/models/usersModel.php";

$user  = new UsersModel();
$users = $user->listUsers();
// var_dump($users);exit;
?>

<div id="page-wrapper" style="min-height: 311px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo ucwords($this->requestVars['option']); ?> List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($users as $id => $user) { ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $user['user_name']?></td>
                                        <td><?php echo $user['user_email']?></td>                                    
                                    </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    