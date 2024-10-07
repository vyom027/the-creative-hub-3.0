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
      content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects"
    />
    
    <title>The Creative Hub</title>

    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.jpg"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" href="assets/css/animate.css" />

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

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
                    <h6><?php echo $_SESSION['admin_username'] ?></h6>
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
                <form method="POST">
                <button class="dropdown-item logout pb-0" name="log_out" href=""
                  ><img
                    src="assets/img/icons/log-out.svg"
                    class="me-2"
                    alt="img"
                  />Logout</button 
                ></form>
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
                  <li>
                    <a href="salesreport.php" class="active">Sales Report</a>
                  </li>
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
                  <li><a href="transferlist.php">Users List</a></li>
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
              <h4>Sales Report</h4>
              <h6>Manage your Sales Report</h6>
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
                    <a class="btn btn-searchset"
                      ><img src="assets/img/icons/search-white.svg" alt="img"
                    /></a>
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
                        <div class="input-groupicon">
                          <input
                            type="text"
                            placeholder="From Date"
                            class="datetimepicker"
                          />
                          <div class="addonset">
                            <img
                              src="assets/img/icons/calendars.svg"
                              alt="img"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                      <div class="form-group">
                        <div class="input-groupicon">
                          <input
                            type="text"
                            placeholder="To Date"
                            class="datetimepicker"
                          />
                          <div class="addonset">
                            <img
                              src="assets/img/icons/calendars.svg"
                              alt="img"
                            />
                          </div>
                        </div>
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
                          <input type="checkbox" id="select-all" />
                          <span class="checkmarks"></span>
                        </label>
                      </th>
                      <th>Product Name</th>
                      <th>SKU</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Sold amount</th>
                      <th>Sold qty</th>
                      <th>Instock qty</th>
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
                        <a class="product-img">
                          <img
                            src="assets/img/product/product1.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Macbook pro</a>
                      </td>
                      <td>PT001</td>
                      <td>Computer</td>
                      <td>N/D</td>
                      <td>1500.00</td>
                      <td>1</td>
                      <td>1356</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product2.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Orange</a>
                      </td>
                      <td>PT002</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>1</td>
                      <td>131</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product3.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Pineapple</a>
                      </td>
                      <td>PT003</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>3</td>
                      <td>72</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product4.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Strawberry</a>
                      </td>
                      <td>PT004</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>1</td>
                      <td>100</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product5.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Sunglasses</a>
                      </td>
                      <td>PT005</td>
                      <td>Accessories</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>1</td>
                      <td>100</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product6.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Unpaired gray</a>
                      </td>
                      <td>PT006</td>
                      <td>Shoes</td>
                      <td>Adidas</td>
                      <td>100.00</td>
                      <td>3</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product7.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Avocat</a>
                      </td>
                      <td>PT007</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>5.00</td>
                      <td>5</td>
                      <td>29</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product8.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Banana</a>
                      </td>
                      <td>PT008</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>1</td>
                      <td>24</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product9.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Earphones</a>
                      </td>
                      <td>PT009</td>
                      <td>Computers</td>
                      <td>N/D</td>
                      <td>15.00</td>
                      <td>2</td>
                      <td>11</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product8.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Banana</a>
                      </td>
                      <td>PT010</td>
                      <td>Health Care</td>
                      <td>N/D</td>
                      <td>5.00</td>
                      <td>5</td>
                      <td>16</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product6.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Unpaired gray</a>
                      </td>
                      <td>PT006</td>
                      <td>Shoes</td>
                      <td>Adidas</td>
                      <td>100.00</td>
                      <td>1</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product7.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Avocat</a>
                      </td>
                      <td>PT007</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>5.00</td>
                      <td>2</td>
                      <td>29</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product8.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Banana</a>
                      </td>
                      <td>PT008</td>
                      <td>Fruits</td>
                      <td>N/D</td>
                      <td>10.00</td>
                      <td>2</td>
                      <td>24</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product9.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Earphones</a>
                      </td>
                      <td>PT009</td>
                      <td>Computers</td>
                      <td>N/D</td>
                      <td>15.00</td>
                      <td>2</td>
                      <td>11</td>
                    </tr>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a class="product-img">
                          <img
                            src="assets/img/product/product8.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="javascript:void(0);">Banana</a>
                      </td>
                      <td>PT010</td>
                      <td>Health Care</td>
                      <td>N/D</td>
                      <td>5.00</td>
                      <td>4</td>
                      <td>16</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
