﻿<!DOCTYPE html>
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
                  
                  
                  <li><a href="storelist.html">Store List</a></li>
                  <li><a href="addstore.html">Add Store</a></li>
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
                  <li><a href="chart-peity.php">Peity Charts</a></li>
                </ul>
              </li>

              <li class="submenu">
                <a href="javascript:void(0);"
                  ><i data-feather="layout"></i> <span> Table </span>
                  <span class="menu-arrow"></span
                ></a>
                <ul>
                  <li>
                    <a href="tables-basic.php" class="active">Basic Tables </a>
                  </li>
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
              <div class="col">
                <h3 class="page-title">Basic Tables</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Basic Tables</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Basic Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="83e9ecebedc3e6fbe2eef3efe6ade0ecee"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>Mary</td>
                          <td>Moe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="2f424e5d566f4a574e425f434a014c4042"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>Dooley</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="f19b849d88b19489909c819d94df929e9c"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Striped Rows</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="5a303532341a3f223b372a363f74393537"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>Mary</td>
                          <td>Moe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="a3cec2d1dae3c6dbc2ced3cfc68dc0ccce"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>Dooley</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="8be1fee7f2cbeef3eae6fbe7eea5e8e4e6"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Bordered Table</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="cfa5a0a7a18faab7aea2bfa3aae1aca0a2"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>Mary</td>
                          <td>Moe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="137e72616a53766b727e637f763d707c7e"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>Dooley</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="0a607f66734a6f726b677a666f24696567"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Hover Rows</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>John</td>
                          <td>Doe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="d6bcb9beb896b3aeb7bba6bab3f8b5b9bb"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>Mary</td>
                          <td>Moe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="fa979b8883ba9f829b978a969fd4999597"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>July</td>
                          <td>Dooley</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="58322d3421183d20393528343d763b3735"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Contextual Classes</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Default</td>
                          <td>Defaultson</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="7410111234071b191119151d185a171b19"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-primary">
                          <td>Primary</td>
                          <td>Doe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="442e2b2c2a04213c25293428216a272b29"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-secondary">
                          <td>Secondary</td>
                          <td>Moe</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="2b464a59526b4e534a465b474e05484446"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-success">
                          <td>Success</td>
                          <td>Dooley</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="cda7b8a1b48da8b5aca0bda1a8e3aea2a0"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-danger">
                          <td>Danger</td>
                          <td>Refs</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="9cfef3dcf9e4fdf1ecf0f9b2fff3f1"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-warning">
                          <td>Warning</td>
                          <td>Activeson</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="bbdad8cffbdec3dad6cbd7de95d8d4d6"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-info">
                          <td>Info</td>
                          <td>Activeson</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="2f4e4c5b6f4a574e425f434a014c4042"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-light">
                          <td>Light</td>
                          <td>Activeson</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="f1909285b19489909c819d94df929e9c"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                        <tr class="table-dark">
                          <td>Dark</td>
                          <td>Activeson</td>
                          <td>
                            <a
                              href="/cdn-cgi/l/email-protection"
                              class="__cf_email__"
                              data-cfemail="8cedeff8cce9f4ede1fce0e9a2efe3e1"
                              >[email&#160;protected]</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Responsive Tables</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Age</th>
                          <th>City</th>
                          <th>Country</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Anna</td>
                          <td>Pitt</td>
                          <td>35</td>
                          <td>New York</td>
                          <td>USA</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      data-cfasync="false"
      src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
