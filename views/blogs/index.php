<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");

require_once SITE_BASE . "/models/blogsModel.php";

$blog  = new BlogsModel();
$blogs = $blog->listBlogs();
// var_dump($blogs);exit;
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
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    if(!empty($blogs)) 
                                        foreach ($blogs as $id => $blog) { ?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $blog['blog_name']?></td>
                                            <td>
                                                <a href="<?php echo SITE_BASE_URL ?>/index.php?option=blogs&task=view&id=<?php echo $id; ?>"><i class="fa fa-eye fa-fw"></i></a>
                                                <a href="<?php echo SITE_BASE_URL ?>/index.php?option=blogs&task=edit&id=<?php echo $id; ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href="<?php echo SITE_BASE_URL ?>/index.php?option=blogs&task=remove&id=<?php echo $id; ?>"><i class="fa fa-remove fa-fw"></i></a>
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    else
                                        echo "<tr><td colspan='3' style='text-align:center;'>No Data Found</td></tr>";
                                ?>
                        </tbody>
                    </table>
                </div>
            </div> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    