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
      content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects"
    />
    
    <title>The Creative Hub</title>

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.jpg"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

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
                  
                  <li><a href="transferlist.php" class="active">User List</a></li>
                  <li><a href="adduser.php">Add User</a></li>
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

      <div class="page-wrapper">
        <div class="content">
          <div class="page-header">
            <div class="page-title">
              <h4>User List</h4>
              <h6>Manage your User</h6>
            </div>
            <div class="page-btn">
              <a href="adduser.php" class="btn btn-added"
                ><img
                  src="assets/img/icons/plus.svg"
                  alt="img"
                  class="me-2"
                />Add User</a
              >
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="table-top">
                <div class="search-set">
                  <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                      <img src="assets/img/icons/filter.svg" alt="img" />
                      <span
                        ><img src="assets/img/icons/closes.svg" alt="img"
                      /></span>
                    </a>
                  </div>
                  <div class="search-input">
                    <a class="btn btn-searchset">
                      <img src="assets/img/icons/search-white.svg" alt="img" />
                    </a>
                  </div>
                </div>
                <div class="wordset">
                  <ul>
                    <li>
                      <a
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="pdf"
                        ><img src="assets/img/icons/pdf.svg" alt="img"
                      /></a>
                    </li>
                    <li>
                      <a
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="excel"
                        ><img src="assets/img/icons/excel.svg" alt="img"
                      /></a>
                    </li>
                    <li>
                      <a
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="print"
                        ><img src="assets/img/icons/printer.svg" alt="img"
                      /></a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" placeholder="Enter User Name" />
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" placeholder="Enter Phone" />
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" placeholder="Enter Email" />
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                      <div class="form-group">
                        <select class="select">
                          <option>Disable</option>
                          <option>Enable</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                      <div class="form-group">
                        <a class="btn btn-filters ms-auto"
                          ><img
                            src="assets/img/icons/search-whites.svg"
                            alt="img"
                        /></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table datanew">
                  <thead>
                    <tr>
                      <th>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </th>
                      <th>Profile</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>User name</th>
                      <th>Phone</th>
                      <th>email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer1.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Thomas</td>
                      <td>Thomas</td>
                      <td>Thomas21</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="42362a2d2f233102273a232f322e276c212d2f"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input type="checkbox" id="user1" class="check" />
                          <label for="user1" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer2.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Benjamin</td>
                      <td>Franklin</td>
                      <td>504Benjamin</td>
                      <td>123-456-888</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="e685939592898b8394a6839e878b968a83c885898b"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user2"
                            class="check"
                            checked=""
                          />
                          <label for="user2" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer3.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>James</td>
                      <td>James</td>
                      <td>James 524</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="9ef4fff3fbeddefbe6fff3eef2fbb0fdf1f3"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user3"
                            class="check"
                            checked=""
                          />
                          <label for="user3" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer4.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Bruklin</td>
                      <td>Bruklin</td>
                      <td>Bruklin2022</td>
                      <td>123-456-888</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="781a0a0d13141116381d00191508141d561b1715"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user4"
                            class="check"
                            checked=""
                          />
                          <label for="user4" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer5.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Franklin</td>
                      <td>Jacob</td>
                      <td>BeverlyWIN25</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="aceec9dac9dec0d5ecc9d4cdc1dcc0c982cfc3c1"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input type="checkbox" id="user5" class="check" />
                          <label for="user5" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer6.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>B. Huber</td>
                      <td>Jacob</td>
                      <td>BeverlyWIN25</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="7b330e191e093b1e031a160b171e55181416"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input type="checkbox" id="user6" class="check" />
                          <label for="user6" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer7.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Alwin</td>
                      <td>Alwin</td>
                      <td>Alwin243</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="0764727473686a627547627f666a776b622964686a"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input type="checkbox" id="user7" class="check" />
                          <label for="user7" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer8.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Fred john</td>
                      <td>john</td>
                      <td>FredJ25</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="bad0d5d2d4fadfc2dbd7cad6df94d9d5d7"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input type="checkbox" id="user15" class="check" />
                          <label for="user15" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer1.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Rasmussen</td>
                      <td>Gothic</td>
                      <td>Cras56</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="3a685b49574f49495f547a5f425b574a565f14595557"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user9"
                            class="check"
                            checked=""
                          />
                          <label for="user9" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer2.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Grace</td>
                      <td>Halena</td>
                      <td>Grace2022</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="a0c3d5d3d4cfcdc5d2e0c5d8c1cdd0ccc58ec3cfcd"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user10"
                            class="check"
                            checked=""
                          />
                          <label for="user10" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer3.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Rasmussen</td>
                      <td>Gothic</td>
                      <td>Cras56</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="702211031d050303151e301508111d001c155e131f1d"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user19"
                            class="check"
                            checked=""
                          />
                          <label for="user19" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);" class="product-img">
                          <img
                            src="assets/img/customer/customer4.jpg"
                            alt="product"
                          />
                        </a>
                      </td>
                      <td>Grace</td>
                      <td>Halena</td>
                      <td>Grace2022</td>
                      <td>+12163547758</td>
                      <td>
                        <a
                          href="/cdn-cgi/l/email-protection"
                          class="__cf_email__"
                          data-cfemail="3e5d4b4d4a51535b4c7e5b465f534e525b105d5153"
                          >[email&#160;protected]</a
                        >
                      </td>
                      <td>
                        <div
                          class="status-toggle d-flex justify-content-between align-items-center"
                        >
                          <input
                            type="checkbox"
                            id="user18"
                            class="check"
                            checked=""
                          />
                          <label for="user18" class="checktoggle"
                            >checkbox</label
                          >
                        </div>
                      </td>
                      <td>
                        <a class="me-3" href="edituser.html">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3 confirm-text" href="javascript:void(0);">
                          <img src="assets/img/icons/delete.svg" alt="img" />
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="showpayment"
      tabindex="-1"
      aria-labelledby="showpayment"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Show Payments</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Reference</th>
                    <th>Amount</th>
                    <th>Paid By</th>
                    <th>Paid By</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bor-b1">
                    <td>2022-03-07</td>
                    <td>INV/SL0101</td>
                    <td>$ 1500.00</td>
                    <td>Cash</td>
                    <td>
                      <a class="me-2" href="javascript:void(0);">
                        <img src="assets/img/icons/printer.svg" alt="img" />
                      </a>
                      <a
                        class="me-2"
                        href="javascript:void(0);"
                        data-bs-target="#editpayment"
                        data-bs-toggle="modal"
                        data-bs-dismiss="modal"
                      >
                        <img src="assets/img/icons/edit.svg" alt="img" />
                      </a>
                      <a class="me-2 confirm-text" href="javascript:void(0);">
                        <img src="assets/img/icons/delete.svg" alt="img" />
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="createpayment"
      tabindex="-1"
      aria-labelledby="createpayment"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Payment</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Customer</label>
                  <div class="input-group">
                    <input
                      type="text"
                      value="2022-03-07"
                      class="datetimepicker"
                    />
                    <a class="scanner-set input-group-text">
                      <img src="assets/img/icons/datepicker.svg" alt="img" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Reference</label>
                  <input type="text" value="INV/SL0101" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Received Amount</label>
                  <input type="text" value="1500.00" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Paying Amount</label>
                  <input type="text" value="1500.00" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Payment type</label>
                  <select class="select">
                    <option>Cash</option>
                    <option>Online</option>
                    <option>Inprogress</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-submit">Submit</button>
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="editpayment"
      tabindex="-1"
      aria-labelledby="editpayment"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Payment</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Customer</label>
                  <div class="input-group">
                    <input
                      type="text"
                      value="2022-03-07"
                      class="datetimepicker"
                    />
                    <a class="scanner-set input-group-text">
                      <img src="assets/img/icons/datepicker.svg" alt="img" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Reference</label>
                  <input type="text" value="INV/SL0101" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Received Amount</label>
                  <input type="text" value="1500.00" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Paying Amount</label>
                  <input type="text" value="1500.00" />
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Payment type</label>
                  <select class="select">
                    <option>Cash</option>
                    <option>Online</option>
                    <option>Inprogress</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Note</label>
                  <textarea class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-submit">Submit</button>
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
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

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
