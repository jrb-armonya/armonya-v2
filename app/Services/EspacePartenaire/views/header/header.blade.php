<!--header start-->
<header class="app-header">
        <div class="branding-wrap">
            <!--left nav toggler start-->
            <a class="nav-link mt-2 float-left js_left-nav-toggler pos-fixed" href="javaScript:;">
                <i class=" ti-align-right"></i>
            </a>
            <!--left nav toggler end-->
    
            <!--brand start-->
            <div class="navbar-brand pos-fixed">
                <a class="text-white" href="{{url('/')}}">
                    <img src="{{ asset('/common/logo.png') }}" srcset="{{ asset('/common/logo.png') }}" alt="logo">
                </a>
            </div>
            <!--brand end-->
        </div>
    
        <!--header rightside links-->
        <ul class="header-links hide-arrow navbar">
            <li  style="color: white;">
                <span>{{ Auth::user()->name }}</span>
            </li>
            {{-- <li class="nav-item search-bar">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#searchModal">
                    <i class="vl_search"></i>
                </button>
            </li> --}}
           
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="dashboard-4.html#" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="vl_bell"></i>
                    <div class="notification-alarm">
                        <span class="wave wave-warning"></span>
                        <span class="dot bg-warning"></span>
                    </div>
                </a>
    
                <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header weight500">Notifications</h6>
    
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item border-bottom" href="{{url('/espace-partenaire/profil')}}">
                                <span class="text-success"> 
                                <span class="weight500">
                                    <i class="vl_bell weight600 pr-2"></i>Bienvenue :)</span>
                                </span>
                        <span class="small float-right text-muted">03:14 AM</span>
    
                        <div class="dropdown-message f12">
                            Vous pouvez modifier votre mot de passe.
                        </div>
                    </a>
    
                    <a class="dropdown-item small" href="dashboard-4.html#">Voir toutes les notifications</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                    <div class="dropdown-item- px-3 py-2">
                        {{-- <img class="rounded-circle mr-2" src="assets/img/avatar/avatar2.jpg.png" width="35" alt=""/> --}}
                    <span class="text-muted">{{ Auth::user()->name }} <small class="badge badge-status" style="background-color: #{{Auth::user()->role->color}};" > {{ Auth::user()->role->name }}</small></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/espace-partenaire/profil')}}"><i class="fa fa-unlock-alt weight600 pr-2"></i> Sécurité</a>
                    <a class="dropdown-item" href=""><i class="fa fa-history weight600 pr-2"></i> Historique</a>
                    {{-- <a class="dropdown-item" href="dashboard-4.html#">My Profile</a>
                    <a class="dropdown-item" href="dashboard-4.html#">Account Settings</a>
                    <a class="dropdown-item" href="dashboard-4.html#">Inbox <span class="badge badge-primary">3</span></a>
                    <a class="dropdown-item" href="dashboard-4.html#">Message <span class="badge badge-success">5</span></a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            
            {{-- <li class="nav-item">
                <a href="javascript:;" class="nav-link right_side_toggle">
                    <i class="icon-options-vertical"> </i>
                </a>
            </li> --}}
        </ul>
        <!--/header rightside links-->
    </header>