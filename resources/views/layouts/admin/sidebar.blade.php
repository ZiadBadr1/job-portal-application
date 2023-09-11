<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{Auth()->user()->name}}
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Jobs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('job.create')}}">Create Job</a>
                        <a class="nav-link" href="{{route('job.index')}}">Your Jobs</a>
                    </nav>
                </div>

                <a class="nav-link" href="{{route('applicant.index')}}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Applicants
                    <div class="sb-sidenav-collapse-arrow"><i class=""></i></div>
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{Auth()->user()->name}}</div>
        </div>
    </nav>
</div>
