<?php
ob_start();
require_once 'db_connection.php';
// session_start();
require_once 'admin-check.php';


$data_to_display = []; // Initialize an array to hold data to display
$pending = 0; // Initialize the pending flag
$confirm = 0; // Initialize the confirm flag

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id'])) {
  $order_id = $_POST['order_id'];

  // Query to get the order details from pending_orders
  $query = "SELECT * FROM pending_orders WHERE order_id = '$order_id'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
      $order_data = mysqli_fetch_assoc($result);

      $insert_query = "INSERT INTO confirm_orders (user_id, product_id, price, order_date,main_image) 
                      VALUES ('" . $order_data['user_id'] . "', '" . $order_data['product_id'] . "', '" . $order_data['price'] . "', NOW(), '" . $order_data['main_image'] . "')";

      if (mysqli_query($conn, $insert_query)) {
          $delete_query = "DELETE FROM pending_orders WHERE order_id = '$order_id'";
          mysqli_query($conn, $delete_query);

          // Optionally, you can set a success message
          $success_message = "Order confirmed successfully!";
      } else {
          // Handle error while inserting into confirm_orders
          $error_message = "Error confirming order: " . mysqli_error($conn);
      }
  } else {
      // Handle case where order doesn't exist
      $error_message = "Order not found.";
  }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
    $selected_category = $_POST['category']; // Get the selected category
    
    if ($selected_category == '1') { // If 'Pending' is selected
      $query = $query = "SELECT po.*, p.name AS product_name, p.image_url, c.name AS customer_name 
      FROM pending_orders po 
      JOIN product p ON po.product_id = p.product_id 
      JOIN customer c ON po.user_id = c.user_id"; 
      $pending = 1;
    } elseif ($selected_category == '2') { // If 'Completed' is selected
      $query = "SELECT co.*, p.name AS product_name, p.image_url, c.name AS customer_name 
              FROM confirm_orders co 
              JOIN product p ON co.product_id = p.product_id 
              JOIN customer c ON co.user_id = c.user_id";;
        $confirm = 1;
    } else {
        $query = ""; // No valid category selected
    }

    // Execute the query if a valid category was selected
    if (!empty($query)) {
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($result_data = mysqli_fetch_assoc($result)) {
                $data_to_display[] = $result_data; // Store the data in the array
            }
        } else {
            $data_to_display = []; // No data found
        }
    }
    
}

// Close the database connection
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

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom-styles.css">
    
    <!-- JS Files -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
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
                  <li>
                    <a href="saleslist.php" class="active">Sales List</a>
                  </li>
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
                  <li><a href="transferlist.php">Users List</a></li>
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
              <h4>Sales List</h4>
              <h6>Manage your sales</h6>
            </div>
            
          </div>

          <div class="card">
            <div class="card-body">
              <div class="table-top">
                  
                  <div class="col-lg-3 col-sm-3 col-12">
                      <div class="form-group">
                          <label>Order  </label>
                          <form method="POST">
                          <select class="select"  name="category" onchange="this.form.submit()">
                              <option value="1">Choose Progress</option>
                              <option value="1" <?php echo isset($selected_category) && $selected_category == '1' ? 'selected' : ''; ?>>Pending</option>
                              <option value="2" <?php echo isset($selected_category) && $selected_category == '2' ? 'selected' : ''; ?>>Completed</option>
                          </select>
                      </div>
                  </div>
                </form>
                
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
                        href="javascript:void(0);" 
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Export to Excel"
                        onclick="exportToExcel()"
                      >
                        <img src="assets/img/icons/printer.svg" alt="img"/>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card" id="filter_inputs">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" placeholder="Enter Name" />
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <input type="text" placeholder="Enter Reference No" />
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                      <div class="form-group">
                        <select class="select">
                          <option>Completed</option>
                          <option>Paid</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
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
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Customer Name</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Payment</th>
                      <th>Total</th>
                      <th>Biller</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($data_to_display)): ?>
                        <?php foreach ($data_to_display as $order): ?>
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox" />
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    <img src="<?php echo htmlspecialchars($order['image_url']); ?>" alt="Product Image" style="width: 50px; height: auto;"/></td>  
                                    <td><?php echo htmlspecialchars($order['product_name']); ?>
                                </td>
                                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                <td><?php echo date('d M Y', strtotime($order['order_date'])); ?></td>
                                <?php if ($pending): ?>
                                  <td>
                                    <form method="POST">
                                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                        <button type="submit" class="badges bg-lightred" style="border: none; cursor: pointer;">
                                            Pending
                                        </button>
                                    </form>
                                  </td>
                                    <td><span class="badges bg-lightred">Due</span></td>
                                <?php elseif ($confirm): ?>
                                    <td><span class="badges bg-lightgreen">Completed</span></td>
                                    <td><span class="badges bg-lightgreen">Paid</span></td>
                                <?php endif; ?>
                                <td><?php echo htmlspecialchars($order['price']); ?></td>
                                <td>Admin</td>
                                <td class="wordset">
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf" style="margin-left:5px;">
                                        <img src="assets/img/icons/pdf.svg" alt="img" />
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print" style="margin-left:10px;">
                                        <img src="assets/img/icons/printer.svg" alt="img" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  
    </div>
<script>
  // Function to update the status based on the dropdown selection
  function updateStatus(selectElement) {
    const selectedStatus = selectElement.value;
    document.getElementById('statusField').value = selectedStatus; // Set status dynamically
  }

  // Function to trigger the form submission for Excel export
  function exportToExcel() {
    document.getElementById('exportForm').submit();  // Submit the form and trigger export
  }
</script>
    
  </body>
</html>
