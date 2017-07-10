<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="../../../../resources/assets/images/demo/users/face11.png" class="img-circle img-responsive" alt=""></a>
                    <h6>John Doe</h6>
                    <span class="text-size-small">BITM, Chittagong</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li><a href="Authentication/logout.php"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="courseCreate.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li>
                        <a href="#course" data-toggle="collapse"><i class="icon-stack2"></i>Courses</a>

                        <div class="navigation-wrapper collapse" id="course">
                            <ul class="navigation">
                                <li><a href="courseCreate.php"><i class="icon-user-plus"></i> <span>Course List</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#trainer" data-toggle="collapse"><i class="icon-stack2"></i>Trainers</a>

                        <div class="navigation-wrapper collapse" id="trainer">
                            <ul class="navigation">
                                <li><a href="trainerIndex.php"><i class="icon-user-plus"></i> <span>Trainers List</span></a></li>
                                <li><a href="trainerCreate.php"><i class="icon-coins"></i> <span>Add New Trainer</span></a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
