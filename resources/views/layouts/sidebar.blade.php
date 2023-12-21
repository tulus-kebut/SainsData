<div class="sidebar">
    <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                CC
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                CupCake
            </a>
        </div>
        <ul class="nav">
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }} ">
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ request()->is('posyandu*') ? 'active' : '' }} ">
                <a href="{{ route('posyandu') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>Data Posyandu</p>
                </a>
            </li>
        </ul>
    </div>
</div>
