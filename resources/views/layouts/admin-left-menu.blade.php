<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/css/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="javascript:void(0);">
                    <i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            $all_segment = Request::segments();
            ?>

            <li @if(in_array('home',$all_segment)) class="active" @endif>
                 <a href="{{url('/home')}}">
                    <i class="fa fa-user"></i> <span>Dashboard</span>
                </a>
            </li>
            <li  @if(in_array('cms',$all_segment)) class="active" @endif>
                  <a href="{{url('/cms')}}">
                    <i class="fa fa-file-text"></i> <span>CMS Pages</span>
                </a>
            </li>

            <li @if(in_array('global-setting',$all_segment)) class="active" @endif>
                <a href="{{url('/global-setting/')}}">
                    <i class="fa fa-file-text"></i> <span>Global Settings</span>
                </a>
            </li>
            <li @if(in_array('user', $all_segment)) class="active" @endif>
                <a href="{{url('/user/')}}">
                    <i class="fa fa-file-text"></i> <span>User Management</span>
                </a>
            </li>
            <li>
                <a href="{{url('/slider')}}">
                    <i class="fa fa-sliders"></i> <span>Slider Banner</span>
                </a>
            </li>
            <li  @if(in_array('contact-us',$all_segment)) class="active" @endif>
                  <a href="{{url('/contact-us')}}">
                    <i class="fa fa-phone"></i> <span>Contact Us</span>
                </a>
            </li>
            @if(env('IS_MULTILANGUAGE'))
            <li  @if(in_array('translations',$all_segment)) class="active" @endif>
                  <a href="{{url('translations')}}">
                    <i class="fa fa-language"></i> <span>Transaltion</span>
                </a>
            </li>
            @endif

            <!--            <li class="treeview">
                            <a href="javascript:void(0);">
                                <i class="fa fa-pie-chart"></i>
                                <span>Charts</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li>-->
            <!--            <li class="header">LABELS</li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>