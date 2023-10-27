<div class="dlabnav">
    <div class="dlabnav-scroll mm-active ps ps--active-y">
        <ul class="metismenu mm-show" id="menu">
            <li class="nav-label first">Main Menu</li>
            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">Dashboard 1</a></li>
                    <li><a href="index-2.html">Dashboard 2</a></li>
                    <li><a href="index-3.html">Dashboard 3</a></li>
                </ul>
            </li> --}}
            @if (auth()->user()->role->name == 'super admin' || auth()->user()->role->name == 'admin')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-headphones"></i>
                        <span class="nav-text">Enquiry</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('enquiry.index') }}">All Enquiry</a></li>
                        <li><a href="{{ route('enquiry.create') }}">Add Enquiry</a></li>
                    </ul>
                </li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-user"></i>
                        <span class="nav-text">Parent</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('parent.index') }}">All Parent</a></li>
                        <li><a href="{{ route('parent.create') }}">Add Parent</a></li>
                    </ul>
                </li>
            @endif
            @if (auth()->user()->role->name == 'parent' ||
                    auth()->user()->role->name == 'admin' ||
                    auth()->user()->role->name == 'super admin')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text">Student</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('student.index') }}">All Student</a></li>
                        <li><a href="{{ route('student.create') }}">Add Student</a></li>
                    </ul>
                </li>
            @endif
            @if (auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'super admin')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Attedance</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('attendance.index') }}">All Attendance</a></li>
                        <li><a href="{{ route('attendance.create') }}">Add Attendance</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Invoice</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('invoice.index') }}">All Invoice</a></li>
                        <li><a href="{{ route('invoice.create') }}">Add Invoice</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Purchase/Sale</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li><a href="{{ route('purchase.index') }}">Pruchase</a></li>
                        <li><a href="{{ route('sale.index') }}">Sale</a></li>
                        <li><a href="{{ route('supplier.index') }}">Supplier</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-university"></i>
                        <span class="nav-text">Branch</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('branch.index') }}">All Branch</a></li>
                        <li><a href="{{ route('branch.create') }}">Add Branch</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-university"></i>
                        <span class="nav-text">Balance Sheet</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('balanceSheet.index') }}">Balance Sheet</a></li>
                        {{-- <li><a href="{{ route('branch.create') }}"></a></li> --}}
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-university"></i>
                        <span class="nav-text">Student Deposit</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('refund.index') }}">Student Deposit</a></li>
                        {{-- <li><a href="{{ route('branch.create') }}"></a></li> --}}
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Key Stage</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('keyStage.index') }}">All Key Stage</a></li>
                        <li><a href="{{ route('keyStage.create') }}">Add Key Stage</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Year</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('year.index') }}">All Year</a></li>
                        <li><a href="{{ route('year.create') }}">Add Year</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Subject</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('subject.index') }}">All Subject</a></li>
                        <li><a href="{{ route('subject.create') }}">Add Subject</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Board</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('board.index') }}">All Board</a></li>
                        <li><a href="{{ route('board.create') }}">Add Board</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Paper</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('paper.index') }}">All Paper</a></li>
                        <li><a href="{{ route('paper.create') }}">Add Paper</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Science Type</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('scienceType.index') }}">All Science Type</a></li>
                        <li><a href="{{ route('scienceType.create') }}">Add Science Type</a></li>
                    </ul>
                </li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text">Academic Calender</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('academicCalender.index') }}">All Academic Calender</a></li>
                        <li><a href="{{ route('academicCalender.create') }}">Add Academic Calender</a></li>
                    </ul>
                </li>
            @endif

            {{-- <li><a class="ai-icon" href="{{ route('product.index') }}" aria-expanded="false">
                        <i class="la la-calendar"></i>
                        <span class="nav-text">Product</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="{{ route('supplier.index') }}" aria-expanded="false">
                        <i class="la la-calendar"></i>
                        <span class="nav-text">Supplier</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="{{ route('purchase.index') }}" aria-expanded="false">
                        <i class="la la-calendar"></i>
                        <span class="nav-text">Purchase</span>
                    </a>
                </li>
                <li><a class="ai-icon" href="{{ route('sale.index') }}" aria-expanded="false">
                        <i class="la la-calendar"></i>
                        <span class="nav-text">Sale</span>
                    </a>
                </li> --}}
            {{-- @endif --}}
            {{-- <li><a class="ai-icon" href="event-management.html" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Event Management</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professors</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-professors.html">All Professor</a></li>
                    <li><a href="add-professor.html">Add Professor</a></li>
                    <li><a href="edit-professor.html">Edit Professor</a></li>
                    <li><a href="professor-profile.html">Professor Profile</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-students.html">All Students</a></li>
                    <li><a href="add-student.html">Add Students</a></li>
                    <li><a href="edit-student.html">Edit Students</a></li>
                    <li><a href="about-student.html">About Students</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-courses.html">All Courses</a></li>
                    <li><a href="add-courses.html">Add Courses</a></li>
                    <li><a href="edit-courses.html">Edit Courses</a></li>
                    <li><a href="about-courses.html">About Courses</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Library</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-library.html">All Library</a></li>
                    <li><a href="add-library.html">Add Library</a></li>
                    <li><a href="edit-library.html">Edit Library</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Departments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-departments.html">All Departments</a></li>
                    <li><a href="add-departments.html">Add Departments</a></li>
                    <li><a href="edit-departments.html">Edit Departments</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Staff</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-staff.html">All Staff</a></li>
                    <li><a href="add-staff.html">Add Staff</a></li>
                    <li><a href="edit-staff.html">Edit Staff</a></li>
                    <li><a href="staff-profile.html">Staff Profile</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gift"></i>
                    <span class="nav-text">Holiday</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-holiday.html">All Holiday</a></li>
                    <li><a href="add-holiday.html">Add Holiday</a></li>
                    <li><a href="edit-holiday.html">Edit Holiday</a></li>
                    <li><a href="holiday-calendar.html">Holiday Calendar</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Fees</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="fees-collection.html">Fees Collection</a></li>
                    <li><a href="add-fees.html">Add Fees</a></li>
                    <li><a href="fees-receipt.html">Fees Receipt</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="app-profile.html">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Compose</a></li>
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="ecom-product-list.html">Product List</a></li>
                            <li><a href="ecom-product-detail.html">Product Details</a></li>
                            <li><a href="ecom-product-order.html">Order</a></li>
                            <li><a href="ecom-checkout.html">Checkout</a></li>
                            <li><a href="ecom-invoice.html">Invoice</a></li>
                            <li><a href="ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-signal"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="chart-flot.html">Flot</a></li>
                    <li><a href="chart-morris.html">Morris</a></li>
                    <li><a href="chart-chartjs.html">Chartjs</a></li>
                    <li><a href="chart-chartist.html">Chartist</a></li>
                    <li><a href="chart-sparkline.html">Sparkline</a></li>
                    <li><a href="chart-peity.html">Peity</a></li>
                </ul>
            </li>
            <li class="nav-label">Components</li>
            <li class="mega-menu mega-menu-xl"><a class="has-arrow ai-icon" href="javascript:void()"
                    aria-expanded="false">
                    <i class="la la-globe"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="ui-accordion.html">Accordion</a></li>
                    <li><a href="ui-alert.html">Alert</a></li>
                    <li><a href="ui-badge.html">Badge</a></li>
                    <li><a href="ui-button.html">Button</a></li>
                    <li><a href="ui-modal.html">Modal</a></li>
                    <li><a href="ui-button-group.html">Button Group</a></li>
                    <li><a href="ui-list-group.html">List Group</a></li>
                    <li><a href="ui-media-object.html">Media Object</a></li>
                    <li><a href="ui-card.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a></li>
                    <li><a href="ui-dropdown.html">Dropdown</a></li>
                    <li><a href="ui-popover.html">Popover</a></li>
                    <li><a href="ui-progressbar.html">Progressbar</a></li>
                    <li><a href="ui-tab.html">Tab</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-pagination.html">Pagination</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-plus-square-o"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="uc-select2.html">Select 2</a></li>
                    <li><a href="uc-nestable.html">Nestedable</a></li>
                    <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="uc-toastr.html">Toastr</a></li>
                    <li><a href="map-jqvmap.html">Jqv Map</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" aria-expanded="false">
                    <i class="la la-desktop"></i>
                    <span class="nav-text">Widget</span>
                </a></li>
            <li class="nav-label">Forms</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-file-text"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="form-element.html">Form Elements</a></li>
                    <li><a href="form-wizard.html">Wizard</a></li>
                    <li><a href="form-editor-summernote.html">Summernote</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                </ul>
            </li>
            <li class="nav-label">Table</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-table"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page-error-400.html">Error 400</a></li>
                            <li><a href="page-error-403.html">Error 403</a></li>
                            <li><a href="page-error-404.html">Error 404</a></li>
                            <li><a href="page-error-500.html">Error 500</a></li>
                            <li><a href="page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
