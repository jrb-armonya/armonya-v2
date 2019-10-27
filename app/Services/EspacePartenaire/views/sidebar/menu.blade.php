<!--left sidebar start-->
<div class="left-nav-wrap">
    <div class="left-sidebar">
        <nav class="sidebar-menu">
            <ul id="nav-accordion">
                    <li class='sub-menu'>
                        <li class='sub-menu'>
                            <a href="/espace-partenaire">
                                <i class='ti-home'></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </li>
                    <li class='sub-menu'>
                        <li class='sub-menu'>
                            <a href="/espace-partenaire">
                                <i class='icon-credit-card'></i>
                                <span>Compte Rendu</span>
                                <span class="badge  ml-2 nbr-indicateur float-right" style="margin-right: 10px; border: 1px solid white;" color="white">0</span>
                            </a>
                        </li>
                    </li>
                    <li class='sub-menu'>
                        <li class='sub-menu'>
                            <a href="{{ url('/espace-partenaire/rendez-vous') }}">
                                <i class='fa fa-address-card-o'></i>
                                <span>Rendez-vous</span>
                            </a>
                        </li>
                    </li>
                    <li class='sub-menu'>
                        <li class='sub-menu'>
                            <a href="{{url('/espace-partenaire/factures')}}">
                                <i class='icon-credit-card'></i>
                                <span>Factures</span>
                            </a>
                        </li>
                    </li>
                    
                {{-- {{ Printer::print_menu() }} --}}

                <li class="nav-title">
                    <h5 class="text-uppercase">Configuration</h5>
                </li>
                <div class="status-sidebar">
                    <li>
                        <a href="{{url('/espace-partenaire/profil')}}">
                            <i class="fa fa-circle-o text-danger"></i>
                            <span>Sécurité</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/espace-partenaire/profil')}}">
                            <i class="fa fa-circle-o text-success"></i>
                            <span>Mode de paiement</span>
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
    </div>
</div>
<!--left sidebar end-->