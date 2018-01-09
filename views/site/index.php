<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/models/usersModel.php";
require_once SITE_BASE . "/models/blogsModel.php";

$blog  = new BlogsModel();
$blogs = $blog->totalBlogs();

$user  = new UsersModel();
$users = $user->totalUsers();

// var_dump($users, $blogs);exit;
?>

<div id="page-wrapper" style="min-height: 311px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $users ?></div>
                                            <div>Authors</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=users&task=index">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $blogs ?></div>
                                            <div>Blogs</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=blogs&task=index">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    