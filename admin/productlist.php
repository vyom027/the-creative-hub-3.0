<?php
require_once 'db_connection.php';
require_once 'admin-check.php';

// Fetch categories
$category_query = "SELECT * FROM category";
$all_category = $conn->query($category_query);

$category_id = 1; // Initialize category_id variable
$all_product = null;
$hide_section = false;

// Check if a category is selected from POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
      $category_id = intval($_POST['category']);
  }

  // Fetch products based on selected category
  if ($category_id) {
      $sql = "
        SELECT product.*, sub_category.sub_category_name 
        FROM product 
        INNER JOIN sub_category ON product.sub_category_id = sub_category.sub_category_id 
        WHERE product.category_id = $category_id
      ";

      $all_product = $conn->query($sql);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <link rel="stylesheet" href="../assets/css/product.css">

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
                  <li>
                    <a href="productlist.php" class="active">Product List</a>
                  </li>
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
          <div class="page-header">
            <div class="page-title">
              <h4>Product List</h4>
              <h6>Manage your products</h6>
            </div>
            <div class="page-btn">
              <a href="addproduct.php" class="btn btn-added"
                ><img
                  src="assets/img/icons/plus.svg"
                  alt="img"
                  class="me-1"
                />Add New Product</a
              >
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="table-top">
                
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Category</label>
                      <form method="post">
                      <select class="select" name="category" onchange="this.form.submit()">
                        <option value="1">Choose Category</option>
                        <?php while ($row = mysqli_fetch_assoc($all_category)): ?>
                          <option value="<?php echo $row['category_id']; ?>" <?php if (isset($category_id) && $category_id == $row['category_id']) echo 'selected'; ?>>
                            <?php echo $row['category_name']; ?>
                          </option>
                        <?php endwhile; ?>
                      </select>
                      </form>
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
                        title="print"
                        ><img src="assets/img/icons/printer.svg" alt="img"
                      /></a>
                    </li>
                  </ul>
                </div>
              </div>
              
              
              <div class="table-responsive">
                <table class="table datanew" id="subcategoryTable">
                  <thead>
                    <tr>
                      <th>
                        <label class="checkboxs">
                          <input type="checkbox" id="select-all" />
                          <span class="checkmarks"></span>
                        </label>
                      </th>
                      <th>Product Name</th>
                      <th>SubCategory</th>
                      <th>price</th>
                      <th>Created By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                    while($row = mysqli_fetch_assoc($all_product)){
                  ?>
                  <tbody>
                    <tr>
                      <td>
                        <label class="checkboxs">
                          <input type="checkbox" />
                          <span class="checkmarks"></span>
                        </label>
                      </td>
                      <td class="productimgname">
                        <a href="javascript:void(0);"><?php echo $row["name"]?></a>
                      </td>
                      <td><?php echo $row["sub_category_name"]?></td>
                      <td><?php echo $row["price"]?></td>
                      <td>Admin</td>
                      <td>
                        <a class="me-3" href="editproduct.php?product_id=<?php echo $row["product_id"] ?>">
                          <img src="assets/img/icons/edit.svg" alt="img" />
                        </a>
                        <a class="me-3" href="delete_product.php?product_id=<?php echo $row["product_id"] ?>">
                          <img src="assets/img/icons/delete.svg" alt="Delete Product" />
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5 pro-con" id="pro-con" <?php if (!$hide_section) echo 'style="display:none;"'; ?> style="margin-left:300px;">
        <!-- New Close Button -->
        <?php
        
      
            if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
                    $hide_section = true;

            // Query the database to get the product details
            $query = "SELECT * FROM product 
            WHERE product.product_id = " . $product_id;
  
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);
            } else {
                echo "Product not found!";
                exit;
            }
            }
        ?>

        <div class="row gy-4" <?php if (!$hide_section) echo 'style="display:none;"'; ?>>
            <!-- Main Image and Sub Images -->
            <div class="col-lg-6">
                <div class="main-image mb-4">
                    <img src="<?php echo $product["image_url"]?>" class="img-fluid w-100" id="main-img" alt="Main Product Image">
                </div>
                <div class="sub-images d-flex flex-wrap sub-images-wrapper">
                    <img src="<?php echo $product["sub_image1"]?>" class="img-thumbnail img1" onclick="Imgchange('img1')" id="img1" alt="Sub Image 1">
                    <img src="<?php echo $product["sub_image2"]?>" class="img-thumbnail img2" onclick="Imgchange('img2')" id="img2" alt="Sub Image 2">
                    <img src="<?php echo $product["sub_image3"]?>" class="img-thumbnail img3" onclick="Imgchange('img3')" id="img3" alt="Sub Image 3">
                    <img src="<?php echo $product["sub_image4"]?>" class="img-thumbnail img4" onclick="Imgchange('img4')" id="img4" alt="Sub Image 4">
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="product-details"><br><br>
                    <h1 class="name" id="name"><?php echo $product["name"]?></h1><br>
                    <h4 class="text-success" id="price"><?php echo $product["price"]?></h4>
                    <p class="mt-4" id="pro-details"><?php echo $product["description"]?></p>
                </div>
            </div>
        </div>
        <button class="close-btn" onclick="closeProduct()">&times;</button>

    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <script src="searchoff.js"></script>
    <script>
      function closeProduct() {
        document.getElementById("pro-con").style.display = "none";
      }

      function Imgchange(Id) {
        let Imgsrc = document.getElementById(Id).src;
        document.getElementById("main-img").src = Imgsrc;
        return false;
      }
    </script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
