<!-- begin #header -->
<div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Arca</b> Bolig</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end navbar-header -->
        
        <!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">
            {{-- Serch field --}}
            <li>
                <form class="navbar-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter keyword" />
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                    <i class="fa fa-bell"></i>
                    <span class="label">0</span>
                </a>
                <ul class="dropdown-menu media-list dropdown-menu-right">
                    <li class="dropdown-header">NOTIFICATIONS (0)</li>
                    <li class="text-center width-300 p-b-10">
                        No notification found
                    </li>
                </ul>
            </li>
            {{-- Settings dopdown --}}
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fas fa-cog"></i>
                        
                </a>
                <ul class="dropdown-menu media-list dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                        <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
                        <a href="javascript:;" class="dropdown-item">Calendar</a>
                        <a href="javascript:;" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>    
                    
                </ul>
                
            </li>
            {{-- companies Dropdown --}}
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="image image-icon bg-black text-grey-darker">
                        <i class="fa fa-user"></i>
                    </div>
                    {{-- Logged ind company in headder --}}
                    <span class="d-none d-md-inline">{{session('active_property')['comp_name'] ? session('active_property')['comp_name'] : 'Vælg ejendom' }}</span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                        
                    @if (strpos($_SERVER['REQUEST_URI'], "admin") !== false)
                        <a href="{{ route('user.dashboard') }}" class="dropdown-item">Temporary Home BTN</a>
                        @else
                        
                        <a href="{{ route('settings.index') }}" class="dropdown-item">Administrator Dashboard</a>
                        @endif 
                    

                         {{-- associatet companies --}}
                        @foreach (session()->get('comp_info') as $companyDetail)

                         
                            <a href="{{route('set-active-property',[$companyDetail->id, $companyDetail->property_name])}}" class="dropdown-item"> {{$companyDetail->property_name}} 
                                    
                                <br style="line-height:0px;" />{{$companyDetail->property_unique_id}} 
                                     
                            </a>
                        
                  
                        @endforeach 

                </div>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end #header -->