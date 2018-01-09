<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=site&task=index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=users&task=index"><i class="fa fa-user fa-fw"></i> Authors<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=users&task=index">List</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=blogs&task=index"><i class="fa fa-edit fa-fw"></i> Blogs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=blogs&task=index">List</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITE_BASE_URL; ?>/index.php?option=blogs&task=create">Create</a>
                                </li>
                                
                            </ul>
                        </li>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
