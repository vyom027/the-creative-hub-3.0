<?php
   require_once 'db_connection.php';

   $category = "SELECT * FROM category";
   $sub_category = "SELECT * FROM sub_category";
   $all_category = $conn->query($category);
   $all_sub_category = $conn->query($sub_category);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    // Handle file uploads
    $main_image = uploadImage('main_image');
    $sub_image1 = uploadImage('sub_image1');
    $sub_image2 = uploadImage('sub_image2');
    $sub_image3 = uploadImage('sub_image3');
    $sub_image4 = uploadImage('sub_image4');

    if($product_name != NULL && $category != NULL && $sub_category != NULL && $description !=NULL && $price != NULL && $main_image != NULL && $sub_image1 != NULL && $sub_image2 != NULL && $sub_image3 != NULL && $sub_image4 != NULL){
    // Insert data into the database
    $query = "INSERT INTO product (name, category_id,sub_category_id, description, price, image_url, sub_image1, sub_image2, sub_image3, sub_image4) 
              VALUES ('$product_name', '$category','$sub_category', '$description', '$price', '$main_image', '$sub_image1', '$sub_image2', '$sub_image3', '$sub_image4')";

    if (mysqli_query($conn, $query)) {
      header("Location: productlist.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
  }
  else{
    
  }
    // Close database connection
    mysqli_close($conn);
}

// Function to handle image upload
function uploadImage($imageField) {
    if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES[$imageField]['name']);
        
        if (move_uploaded_file($_FILES[$imageField]['tmp_name'],$uploadFile)) {
            return $uploadFile;
        } else {
            echo "Error uploading file: " . $_FILES[$imageField]['name'];
        }
    }
    return null;
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
        <?php
          require_once('adminprofile.php');
          require_once('adminheader.php');
        ?>
    <form method="POST"  enctype="multipart/form-data">
      <div class="page-wrapper">
        <div class="content">
          <div class="page-header">
            <div class="page-title">
              <h4>Product Add</h4>
              <h6>Create new product</h6>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" />
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="select" name="category">
                      <option value="0">Choose Category</option>
                      <?php
                        while($row = mysqli_fetch_assoc($all_category)){
                      ?>
                      <option value="<?php echo $row["category_id"]?>"><?php echo $row["category_name"]?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Sub-Category</label>
                    <select class="select" name="sub_category">
                      <option value="0">Choose Sub-Category</option>
                      <?php
                        while($row = mysqli_fetch_assoc($all_sub_category)){
                      ?>
                      <option value="<?php echo $row["sub_category_id"]?>"><?php echo $row["sub_category_name"]?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                  </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price"/>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <label> Product Main Image</label>
                    <div class="image-upload">
                      <input type="file" name="main_image"/>
                      <div class="image-uploads">
                        <img src="assets/img/icons/upload.svg" alt="img" />
                        <h4>Drag and drop a file to upload</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label> Product Sub-Image 1</label>
                    <div class="image-upload">
                      <input type="file" name="sub_image1"/>
                      <div class="image-uploads">
                        <img src="assets/img/icons/upload.svg" alt="img" />
                        <h4>Drag and drop a file to upload</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label> Product Sub-Image 2</label>
                    <div class="image-upload">
                      <input type="file" name="sub_image2"/>
                      <div class="image-uploads">
                        <img src="assets/img/icons/upload.svg" alt="img" />
                        <h4>Drag and drop a file to upload</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label> Product Sub-Image 3</label>
                    <div class="image-upload">
                      <input type="file" name="sub_image3"/>
                      <div class="image-uploads">
                        <img src="assets/img/icons/upload.svg" alt="img" />
                        <h4>Drag and drop a file to upload</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label> Product Sub-Image 4</label>
                    <div class="image-upload">
                      <input type="file"  name="sub_image4"/>
                      <div class="image-uploads">
                        <img src="assets/img/icons/upload.svg" alt="img" />
                        <h4>Drag and drop a file to upload</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <!-- <a href="javascript:void(0);" class="btn btn-submit me-2"
                    >Submit</a> -->
                  <input type="submit" class="btn btn-submit me-2">
                  <a href="productlist.php" class="btn btn-cancel">Cancel</a>
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

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
  </body>
</html>
