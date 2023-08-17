<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img width="100" src="{{ asset('ixony.png') }}" alt="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>


            <li class="nav-item nav-category">Sidebar Content</li>

            {{-- Role & Permission --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#user" role="button" aria-expanded="false"
                    aria-controls="user">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Role & Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="user">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('role') }}" class="nav-link">Role Manage</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('permission') }}" class="nav-link">Permission Manage</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('add.role.permission') }}" class="nav-link">Manage Roles</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('role.permission') }}" class="nav-link">Permission Under Role</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('Role.Assign') }}" class="nav-link">Assign Role</a>
                        </li>
                    </ul>
                </div>
            </li>



            {{-- Product --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#product" role="button" aria-expanded="false"
                    aria-controls="product">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Product Manage</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="product">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('category') }}" class="nav-link">Category</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('product') }}" class="nav-link">Product</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('Product.Purchase.List') }}" class="nav-link">Purchase</a>
                        </li>


                    </ul>
                </div>
            </li>


            {{-- Return Product --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#return" role="button" aria-expanded="false"
                    aria-controls="return">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Manage Challan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="return">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('Product.Challan.List') }}" class="nav-link">Challan</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('Product.Challan.Return') }}" class="nav-link">Return Challan</a>
                        </li>

                    </ul>
                </div>
            </li>


            {{-- Monthly Reports --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#report" role="button" aria-expanded="false"
                    aria-controls="report">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Report Generate</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="report">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('Report') }}" class="nav-link">Report</a>
                        </li>



                    </ul>
                </div>
            </li>



            {{-- Employee Management --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#employee" role="button" aria-expanded="false"
                    aria-controls="employee">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Manage Employee</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="employee">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('Employee') }}" class="nav-link">Employee</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('Employee.Resigned') }}" class="nav-link">Employee Resigned List</a>
                        </li>

                    </ul>
                </div>
            </li>



            {{-- Employee Attendance --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#attendance" role="button" aria-expanded="false"
                    aria-controls="attendance">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Holiday & Attendance</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>


                <div class="collapse" id="attendance">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('Employee.Leave') }}" class="nav-link">Employee Leave Request</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('Employee.Holiday') }}" class="nav-link">Employee Holiday</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('Employee.Manage.Leave') }}" class="nav-link">Manage Leave</a>
                        </li>

                    </ul>
                </div>
            </li>






        </ul>
    </div>
</nav>
