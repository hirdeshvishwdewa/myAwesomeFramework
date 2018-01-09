<?php
defined("__ACCESS__") or die ("Direct Access Not Allowed !");
?>

<div id="page-wrapper" style="min-height: 311px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create <?php echo ucwords($this->requestVars['option']); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form role="form" method="POST" action="<?php echo SITE_BASE_URL . "/index.php?option=blogs&task=update&id=" . $this->requestVars['id']; ?>">
                    <div class="form-group">
                        <label>Blog Title</label>
                        <input class="form-control" name="title" value="<?php echo $this->viewData['blog_name'] ?>">
                        <p class="help-block">Enter blog title.</p>
                    </div>
                    <div class="form-group">
                        <label>Blog Content</label>
                        <textarea class="form-control" rows="10" name="content"><?php echo $this->viewData['blog_content'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <a href="<?php echo SITE_BASE_URL . "/index.php?option=blogs&task=index"; ?>" class="btn btn-default">Cancel</a>
                </form>
            </div> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    