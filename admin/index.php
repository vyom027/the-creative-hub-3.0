<?php
session_start();
include_once 'db_connection.php';
// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If not logged in, redirect to login page
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['log_out'])) { 
  session_unset(); 
  session_destroy(); 
  header("Location: ../login.php");
  exit();
}
  $user = "SELECT COUNT(*) as total FROM  user_data";
  $result = mysqli_query($conn, $user);
  $row_user = mysqli_fetch_assoc($result);

  $orders =  "SELECT COUNT(*) as total FROM  confirm_orders";
  $result = mysqli_query($conn, $orders);
  $row_orders = mysqli_fetch_assoc($result);

  $total_amount = 0;

  // Query to get the total amount from the pending_orders table for all users
  $total_query = "SELECT SUM(price) AS total FROM pending_orders";
  $total_result = mysqli_query($conn, $total_query);

  if ($total_result) {
      $total_row = mysqli_fetch_assoc($total_result);
      $total_amount = $total_row['total'] ? $total_row['total'] : 0; // Default to 0 if null
  } else {
      echo "Error fetching total amount: " . mysqli_error($conn);
  }

  $total_confirmed_amount = 0;

  // Query to get the total amount from the confirm_orders table for all users
  $total_confirmed_query = "SELECT SUM(price) AS total FROM confirm_orders";
  $total_confirmed_result = mysqli_query($conn, $total_confirmed_query);

  if ($total_confirmed_result) {
      $total_confirmed_row = mysqli_fetch_assoc($total_confirmed_result);
      $total_confirmed_amount = $total_confirmed_row['total'] ? $total_confirmed_row['total'] : 0; // Default to 0 if null
  } else {
      echo "Error fetching total confirmed amount: " . mysqli_error($conn);
  }



  mysqli_close($conn);

?>
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
              <li class="active">
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
          <div class="row">
            
            <div class="col-lg-6 col-sm-9 col-15">
              <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                  <span
                    ><img src="assets/img/icons/dash2.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  <h5>
                  ₹ <span class="counters" data-count="<?php echo $total_amount; ?>"
                      ><?php echo $total_amount; ?></span
                    >
                  </h5>
                  <h6>Total Sales Due</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-9 col-15">
              <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                  <span
                    ><img src="assets/img/icons/dash3.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  <h5>
                  ₹<span class="counters" data-count="<?php echo $total_confirmed_amount; ?>"
                      ><?php echo $total_confirmed_amount; ?></span
                    >
                  </h5>
                  <h6>Total Sale Amount</h6>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-sm-9 col-15 d-flex">
              <div class="dash-count">
                <div class="dash-counts">
                <h4><?php echo $row_user['total']; ?></h4>
                  <h5>Customers</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="user"></i>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6 col-sm-9 col-15 d-flex">
              <div class="dash-count das3">
                <div class="dash-counts">
                  <h4><?php echo $row_orders['total']; ?></h4>
                  <h5>Sales Invoice</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="file"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
              <div class="card flex-fill">
                <div
                  class="card-header pb-0 d-flex justify-content-between align-items-center"
                >
                  <h5 class="card-title mb-0">Purchase & Sales</h5>
                  <div class="graph-sets">
                    <ul>
                      <li>
                        <span>Sales</span>
                      </li>
                      <li>
                        <span>Purchase</span>
                      </li>
                    </ul>
                    <div class="dropdown">
                      <button
                        class="btn btn-white btn-sm dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        2022
                        <img
                          src="assets/img/icons/dropdown.svg"
                          alt="img"
                          class="ms-2"
                        />
                      </button>
                      <ul
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton"
                      >
                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            >2022</a
                          >
                        </li>
                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            >2021</a
                          >
                        </li>
                        <li>
                          <a href="javascript:void(0);" class="dropdown-item"
                            >2020</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="sales_charts"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
              <div class="card flex-fill">
                <div
                  class="card-header pb-0 d-flex justify-content-between align-items-center"
                >
                  <h4 class="card-title mb-0">Recently Added Products</h4>
                  <div class="dropdown">
                    <a
                      href="javascript:void(0);"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      class="dropset"
                    >
                      <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <ul
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <li>
                        <a href="productlist.php" class="dropdown-item"
                          >Product List</a
                        >
                      </li>
                      <li>
                        <a href="addproduct.php" class="dropdown-item"
                          >Product Add</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive dataview">
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>Sno</th>
                          <th>Products</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td class="productimgname">
                            <a href="productlist.php" class="product-img">
                              <img
                                src="assets/img/product/product22.jpg"
                                alt="product"
                              />
                            </a>
                            <a href="productlist.php">Apple Earpods</a>
                          </td>
                          <td>$891.2</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td class="productimgname">
                            <a href="productlist.php" class="product-img">
                              <img
                                src="assets/img/product/product23.jpg"
                                alt="product"
                              />
                            </a>
                            <a href="productlist.php">iPhone 11</a>
                          </td>
                          <td>$668.51</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td class="productimgname">
                            <a href="productlist.php" class="product-img">
                              <img
                                src="assets/img/product/product24.jpg"
                                alt="product"
                              />
                            </a>
                            <a href="productlist.php">samsung</a>
                          </td>
                          <td>$522.29</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td class="productimgname">
                            <a href="productlist.php" class="product-img">
                              <img
                                src="assets/img/product/product6.jpg"
                                alt="product"
                              />
                            </a>
                            <a href="productlist.php">Macbook Pro</a>
                          </td>
                          <td>$291.01</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-0">
            <div class="card-body">
              <h4 class="card-title">Expired Products</h4>
              <div class="table-responsive dataview">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>SNo</th>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Brand Name</th>
                      <th>Category Name</th>
                      <th>Expiry Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="javascript:void(0);">IT0001</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.php">
                          <img
                            src="assets/img/product/product2.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.php">Orange</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>12-12-2022</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="javascript:void(0);">IT0002</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.php">
                          <img
                            src="assets/img/product/product3.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.php">Pineapple</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>25-11-2022</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="javascript:void(0);">IT0003</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.php">
                          <img
                            src="assets/img/product/product4.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.php">Stawberry</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>19-11-2022</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="javascript:void(0);">IT0004</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.php">
                          <img
                            src="assets/img/product/product5.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.php">Avocat</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>20-11-2022</td>
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

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
