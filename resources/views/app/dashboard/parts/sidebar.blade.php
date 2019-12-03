<!--left sidebar start-->
<div class="left-nav-wrap">
    <div class="left-sidebar">
        <nav class="sidebar-menu">
            <ul id="nav-accordion">

                {{ Printer::print_menu() }}

                <li class="nav-title">
                    <h5 class="text-uppercase">Statuts</h5>
                </li>
                <div class="status-sidebar">
                    {{ Printer::print_status() }}

                </div>
            </ul>
        </nav>
    </div>
</div>
<!--left sidebar end-->