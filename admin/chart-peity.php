<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta
      name="keywords"
      content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive"
    />
    
    <title>The Creative Hub</title>

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.jpg"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div id="global-loader">
      <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
      <div class="header">
        <div class="header-left active">
          <a href="index.php" class="logo">
            <img src="assets/img/logo.png" alt="" />
          </a>

          <a id="toggle_btn" href="javascript:void(0);"> </a>
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>

        <ul class="nav user-menu">
          

          <li class="nav-item dropdown has-arrow flag-nav">
            <a
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              href="javascript:void(0);"
              role="button"
            >
              <img src="assets/img/flags/us1.png" alt="" height="20" />
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="assets/img/flags/us.png" alt="" height="16" /> English
              </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="assets/img/flags/fr.png" alt="" height="16" /> French
              </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="assets/img/flags/es.png" alt="" height="16" /> Spanish
              </a>
              <a href="javascript:void(0);" class="dropdown-item">
                <img src="assets/img/flags/de.png" alt="" height="16" /> German
              </a>
            </div>
          </li>

          

          <li class="nav-item dropdown has-arrow main-drop">
            <a
              href="javascript:void(0);"
              class="dropdown-toggle nav-link userset"
              data-bs-toggle="dropdown"
            >
              <span class="user-img"
                ><img src="assets/img/profiles/avator1.jpg" alt="" />
                <span class="status online"></span
              ></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
              <div class="profilename">
                <div class="profileset">
                  <span class="user-img"
                    ><img src="assets/img/profiles/avator1.jpg" alt="" />
                    <span class="status online"></span
                  ></span>
                  <div class="profilesets">
                    <h6>Vivek </h6>
                    <h5>Admin</h5>
                  </div>
                </div>
                <hr class="m-0" />
                <a class="dropdown-item" href="profile.php">
                  <i class="me-2" data-feather="user"></i> My Profile</a
                >
                <a class="dropdown-item" href="generalsettings.php"
                  ><i class="me-2" data-feather="settings"></i>Settings</a
                >
                <hr class="m-0" />
                <a class="dropdown-item logout pb-0" href="signin.html"
                  ><img
                    src="assets/img/icons/log-out.svg"
                    class="me-2"
                    alt="img"
                  />Logout</a
                >
              </div>
            </div>
          </li>
        </ul>

        <div class="dropdown mobile-user-menu">
          <a
            href="javascript:void(0);"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fa fa-ellipsis-v"></i
          ></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="generalsettings.php">Settings</a>
            <a class="dropdown-item" href="signin.html">Logout</a>
          </div>
        </div>
      </div>

      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li>
                <a href="index.php"
                  ><img src="assets/img/icons/dashboard.svg" alt="img" /><span>
                    Dashboard</span
                  >
                </a>
              </li>
              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/product.svg" alt="img" /><span>
                    Product</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="productlist.php">Product List</a></li>
                  <li><a href="addproduct.php">Add Product</a></li>
                  <li><a href="categorylist.php">Category List</a></li>
                  <li><a href="addcategory.php">Add Category</a></li>
                  <li><a href="brandlist.php">Sub-Category List</a></li>
                  <li><a href="addbrand.php">Add Sub-Category</a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/sales1.svg" alt="img" /><span>
                    Sales</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="saleslist.php">Sales List</a></li>
                </ul>
              </li>
              
              

              
              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/users1.svg" alt="img" /><span>
                    People</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="customerlist.php">Customer List</a></li>
                  <li><a href="addcustomer.php">Add Customer </a></li>
                  
                </ul>
              </li>

              <li class="submenu">
                <a href="javascript:void(0);"
                  ><i data-feather="alert-octagon"></i>
                  <span> Error Pages </span> <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="error-404.html">404 Error </a></li>
                  <li><a href="error-500.html">500 Error </a></li>
                </ul>
              </li>

              <li class="submenu">
                <a href="javascript:void(0);"
                  ><i data-feather="bar-chart-2"></i> <span> Charts </span>
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="chart-apex.php">Apex Charts</a></li>
                  <li><a href="chart-js.php">Chart Js</a></li>
                  <li><a href="chart-morris.php">Morris Charts</a></li>
                  <li><a href="chart-flot.php">Flot Charts</a></li>
                  <li>
                    <a href="chart-peity.php" class="active">Peity Charts</a>
                  </li>
                </ul>
              </li>

              <li class="submenu">
                <a href="javascript:void(0);"
                  ><i data-feather="layout"></i> <span> Table </span>
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="tables-basic.php">Basic Tables </a></li>
                  <li><a href="data-tables.php">Data Table </a></li>
                </ul>
              </li>

              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/time.svg" alt="img" /><span>
                    Report</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li>
                    <a href="purchaseorderreport.php">Purchase order report</a>
                  </li>
                  <li><a href="salesreport.php">Sales Report</a></li>
                  <li><a href="purchasereport.php">Purchase Report</a></li>
                  <li><a href="supplierreport.php">Supplier Report</a></li>
                  <li><a href="customerreport.php">Customer Report</a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/users1.svg" alt="img" /><span>
                    Admin Users</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="newadmin.php">New User </a></li>
                  <li><a href="adminlist.php">Users List</a></li>
                </ul>
              </li>
              <li class="submenu">
                <a href="javascript:void(0);"
                  ><img src="assets/img/icons/settings.svg" alt="img" /><span>
                    Settings</span
                  >
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li><a href="generalsettings.php">General Settings</a></li>
                  <li><a href="emailsettings.php">Email Settings</a></li>
                  <li><a href="paymentsettings.php">Payment Settings</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="page-wrapper cardhead">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">Peity Chart</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Peity Charts</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Donut Chart</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >1/5</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >226/360</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >0.52/1.561</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >1,4</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >226,134</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="donut"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >0.52,1.041</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Pie Chart</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >1/5</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >226/360</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >0.52/1.561</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >1,4</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >226,134</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <span
                          class="pie"
                          data-peity='{ "fill": ["#7638ff", "rgba(67, 87, 133, .09)"]}'
                          >0.52,1.041</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Line Charts</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span class="peity-line" data-width="100%"
                          >6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span class="peity-line" data-width="100%"
                          >6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span class="peity-line" data-width="100%"
                          >6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Bar Charts</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span
                          class="bar"
                          data-peity='{ "fill": ["#5b73e8", "#38cb89"]}'
                          >6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span
                          class="bar"
                          data-peity='{ "fill": ["#38cb89", "#3e80eb"]}'
                          >6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card-body">
                        <span
                          class="bar"
                          data-peity='{ "fill": ["#ef4b4b", "#ffab00"]}'
                          >6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data attributes</h3>
                </div>
                <div class="text-center">
                  <div class="row">
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#664dc9", "rgba(67, 87, 133, .09)"],    "innerRadius": 10, "radius": 40 }'
                            >1/7</span
                          >
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#5b73e8", "rgba(67, 87, 133, .09)"], "innerRadius": 14, "radius": 36 }'
                            >2/7</span
                          >
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#38cb89", "rgba(67, 87, 133, .09)"], "innerRadius": 16, "radius": 32 }'
                            >3/7</span
                          >
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#ef4b4b", "rgba(67, 87, 133, .09)"],  "innerRadius": 18, "radius": 28 }'
                            >4/7</span
                          >
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#ffab00", "rgba(67, 87, 133, .09)"],   "innerRadius": 20, "radius": 24 }'
                            >5/7</span
                          >
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                      <div class="card-body">
                        <p class="data-attributes">
                          <span
                            data-peity='{ "fill": ["#3e80eb", "rgba(67, 87, 133, .09)"], "innerRadius": 18, "radius": 20 }'
                            >6/7</span
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Setting Colours Dynamically</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="card-body">
                        <span class="bar-colours-1">5,3,9,6,5,9,7,3,5,2</span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="card-body">
                        <span class="bar-colours-2"
                          >5,3,2,-1,-3,-2,2,3,5,2</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="card-body">
                        <span class="bar-colours-3"
                          >0,-3,-6,-4,-5,-4,-7,-3,-5,-2</span
                        >
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="card-body">
                        <span class="pie-colours-2">5,3,9,6,5</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/plugins/peity/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
