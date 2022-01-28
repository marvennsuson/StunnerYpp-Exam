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
            <div>Question</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.question.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Question List</div>
                </a>
            </li>
            <li class="sidenav-item">
                <a href="{{ route('system.question.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Question</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Clinic</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.clinic.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Clinic List</div>
                </a>
            </li> 
            <li class="sidenav-item">
                <a href="{{ route('system.clinic.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Clinic</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Rate</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.rate.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Rate List</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Personnel</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.personel.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Personnel List</div>
                </a>
                
            </li>
            <li class="sidenav-item">
                <a href="{{ route('system.personel.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Personnel</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon pe-7s-news-paper"></i>
            <div>Services</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a href="{{ route('system.services.index') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Services List</div>
                </a>
                
            </li>
            <li class="sidenav-item">
                <a href="{{ route('system.services.create') }}" class="sidenav-link">
                    <i class="sidenav-icon pe-7s-news-paper"></i>
                    <div>Add Services</div>
                </a>
            </li>
        </ul>
    </li>
</ul>