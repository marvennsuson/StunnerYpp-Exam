<ul class="sidenav-inner py-1" id="sidenav">

    <!-- Dashboards -->
    <li class="sidenav-item">
        <a href="{{route('system.dashboard.index')}}" class="sidenav-link">
            <i class="sidenav-icon feather icon-home"></i>
            <div>Dashboard</div>
        </a>
    </li>

    <li class="sidenav-diveder mb-1"></li>
    <li class="sidenav-header small font-weight-semibold">CMS</li>

    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Song Management</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.song.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Song List</div>
                </a>
            </li> 
            <li class="sidenav-item">
                <a href="{{ route('system.song.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Songs</div>
                </a>
            </li>
        </ul>
    </li>


    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Song Category</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.category.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Category List</div>
                </a>
                
            </li>
            <li class="sidenav-item">
                <a href="{{ route('system.category.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Category</div>
                </a>
            </li>
        </ul>
    </li>

</ul>