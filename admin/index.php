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
  $result_user = mysqli_query($conn, $user);
  $row_user = mysqli_fetch_assoc($result_user);

  $orders =  "SELECT COUNT(*) as total FROM  confirm_orders";
  $result_order = mysqli_query($conn, $orders);
  $row_orders = mysqli_fetch_assoc($result_order);

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


  $recent_product = "SELECT * FROM product ORDER BY product_id DESC LIMIT 5";
  $result_recent_product = mysqli_query($conn, $recent_product);

$most_bought = "SELECT product.product_id, product.name, product.price, product.image_url, COUNT(confirm_orders.product_id) as total_bought
          FROM confirm_orders
          JOIN product ON product.product_id = confirm_orders.product_id
          GROUP BY confirm_orders.product_id
          ORDER BY total_bought DESC
          LIMIT 5";
$most_bought_result = mysqli_query($conn, $most_bought);

$most_expensive = "SELECT *
          FROM product
          ORDER BY product.price DESC
          LIMIT 5";  // Limiting to the top 5 most expensive products
$most_expensive_result = mysqli_query($conn, $most_expensive);



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
    <!-- <div id="global-loader">
      <div class="whirly-loader"></div>
    </div> -->

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
                ><img src="assets/img/profiles/avator1.png" alt="" />
                <span class="status online"></span
              ></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
              <div class="profilename">
                <div class="profileset">
                  <span class="user-img"
                    ><img src="assets/img/profiles/avator1.png" alt="" />
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
                  <li><a href="sub_category_list.php">Sub-Category List</a></li>
                  <li><a href="add_sub_category.php">Add Sub-Category</a></li>
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
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
              <div class="card flex-fill">
                  <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                      <h4 class="card-title mb-0">Recently Added Products</h4>
                      <div class="dropdown">
                          <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                              <i class="fa fa-ellipsis-v"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a href="productlist.php" class="dropdown-item">Product List</a></li>
                              <li><a href="addproduct.php" class="dropdown-item">Product Add</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive dataview">
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Products</th>
                                      <th>Price</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if (mysqli_num_rows($result_recent_product) > 0) {
                                      $sno = 1;
                                      while ($row = mysqli_fetch_assoc($result_recent_product)) {
                                          echo '<tr>';
                                          echo '<td>' . $sno . '</td>';
                                          echo '<td class="productimgname">';
                                          echo '<a href="productlist.php" class="product-img">';
                                          echo '<img src="' . $row['image_url'] . '" alt="product" />';
                                          echo '</a>';
                                          echo '<a href="productlist.php">' . $row['name'] . '</a>';
                                          echo '</td>';
                                          echo '<td>₹' . number_format($row['price'], 2) . '</td>';
                                          echo '</tr>';
                                          $sno++;
                                      }
                                  } else {
                                      echo '<tr><td colspan="3">No products found</td></tr>';
                                  }
                                  ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Most Bought Products</h4>
                <div class="dropdown">
                  <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                    <i class="fa fa-ellipsis-v"></i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a href="productlist.php" class="dropdown-item">Product List</a></li>
                    <li><a href="addproduct.php" class="dropdown-item">Product Add</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive dataview">
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>no</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Total Bought</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sno = 1;
                      while ($row = mysqli_fetch_assoc($most_bought_result)) {
                        echo '<tr>';
                        echo '<td>' . $sno++ . '</td>';
                        echo '<td class="productimgname">';
                        echo '<a href="productlist.php" class="product-img">';
                        echo '<img src="' . $row['image_url'] . '" alt="product" />';
                        echo '</a>';
                        echo '<a href="productlist.php">' . $row['name'] . '</a>';
                        echo '</td>';
                        echo '<td>₹' . $row['price'] . '</td>';
                        echo '<td>' . $row['total_bought'] . '</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-0">
            <div class="card-body">
              <h4 class="card-title">Most Expensive Products</h4>
              <div class="table-responsive dataview">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Product Name</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($most_expensive_result)) {
                      echo '<tr>';
                      echo '<td>' . $no++ . '</td>';
                      echo '<td class="productimgname">';
                      echo '<a class="product-img" href="productlist.php">';
                      echo '<img src="' . $row['image_url'] . '" alt="product"/>';
                      echo '</a>';
                      echo '<a href="productlist.php">' . $row['name'] . '</a>';
                      echo '</td>';
                      echo '<td>₹' . $row['price'] . '</td>';
                      echo '</tr>';
                    }
                    ?>
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
