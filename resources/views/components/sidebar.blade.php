<aside id="sidebar">
    <div class="d-flex align-items-center">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="/dashboard">EyeQ</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="/dashboard" class="sidebar-link">
                <i class="lni lni-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/history" class="sidebar-link">
                <i class="lni lni-list"></i>
                <span>History</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/share" class="sidebar-link">
                <i class="lni lni-share"></i>
                <span>Share</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-compass"></i>
                <span>Our Service</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="/form_diagnosis" class="sidebar-link">Form Test</a>
                </li>
                <li class="sidebar-item">
                    <a href="/retina_diagnosis" class="sidebar-link">Retina Test</a>
                </li>
            </ul>
        </li>
        {{-- <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                <i class="lni lni-layout"></i>
                <span>Multi Level</span>
            </a>
            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                        Two Links
                    </a>
                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 1</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 2</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li> --}}

    </ul>
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>



