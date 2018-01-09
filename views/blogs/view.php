<?php defined("__ACCESS__") or die ("Direct Access Not Allowed !"); ?>
<?php // var_dump($this->viewData);exit; ?>
<div id="page-wrapper" style="min-height: 311px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo ucwords($this->viewData["blog_name"]); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="table-responsive">
                    <?php echo $this->viewData["blog_content"]?>
                </div>
            </div> 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    