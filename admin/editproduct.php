<?php
require_once 'db_connection.php';
require_once 'admin-check.php';

$pro_id = $_GET['product_id'];
$product = "SELECT * FROM product WHERE product_id = $pro_id";
$product_detail = $conn->query($product);
$product_data = mysqli_fetch_assoc($product_detail); 
$alert_message = null;
$category_query = "SELECT * FROM category";
$all_category = $conn->query($category_query);

$category_id = $product_data['category_id'];
$sub_category_id = $product_data['sub_category_id'];
$sub_category_query = "SELECT * FROM sub_category WHERE category_id = $category_id";
$all_sub_category = $conn->query($sub_category_query);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Handle file uploads (uploadImage will return null if no file is uploaded)
    $main_image = uploadImage('main_image');
    $sub_image1 = uploadImage('sub_image1');
    $sub_image2 = uploadImage('sub_image2');
    $sub_image3 = uploadImage('sub_image3');
    $sub_image4 = uploadImage('sub_image4');

    // Build the update query with only the provided images
    $updates = [];
    if (!empty($main_image)) {
        $updates[] = "image_url = '$main_image'";
    }
    if (!empty($sub_image1)) {
        $updates[] = "sub_image1 = '$sub_image1'";
    }
    if (!empty($sub_image2)) {
        $updates[] = "sub_image2 = '$sub_image2'";
    }
    if (!empty($sub_image3)) {
        $updates[] = "sub_image3 = '$sub_image3'";
    }
    if (!empty($sub_image4)) {
        $updates[] = "sub_image4 = '$sub_image4'";
    }

    // Base query for updating product details
    if ($product_name && $category && $sub_category && $description && $price && $main_image && $sub_image1 && $sub_image2 && $sub_image3 && $sub_image4) {
    $updateQuery = "UPDATE product 
                   SET 
                       name = '$product_name',
                       category_id = '$category',
                       sub_category_id = '$sub_category',
                       description = '$description',
                       price = '$price'";

    // Append any image-related updates if applicable
    if (!empty($updates)) {
        $updateQuery .= ', ' . implode(', ', $updates);
    }

    // Add WHERE condition to finalize query
    $updateQuery .= " WHERE product_id = '$pro_id'";

    // Execute the query
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: productlist.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    }else {
        $alert_message = 'Please fill in all required fields before submitting.';
    }
    
}

// Image upload function
function uploadImage($imageField) {
    if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES[$imageField]['name']);
        if (move_uploaded_file($_FILES[$imageField]['tmp_name'], $uploadFile)) {
            return $uploadFile;
        }
    }
    return null; // No image uploaded or upload failed
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
    <!-- <div id="global-loader">
      <div class="whirly-loader"></div>
    </div> -->

    <div class="main-wrapper">
        <?php
          require_once('adminprofile.php');
          require_once('adminheader.php');
        ?>
      <div class="page-wrapper">
        <div class="content">
          <div class="page-header">
            <div class="page-title">
              <h4>Update Product</h4>
              <h6>Update Product Details</h6>
            </div>
          </div>
          <?php if ($alert_message): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> <?php echo $alert_message; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif; ?>
          <form method="POST"  enctype="multipart/form-data">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" value="<?php echo $product_data['name']; ?>" />
                  </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Category</label>
                        <!-- Remove form element inside the form -->
                        <select class="select" name="category" onchange="this.form.submit()">
                            <option value="1">Choose Category</option>
                            <?php while ($row = mysqli_fetch_assoc($all_category)): ?>
                            <option value="<?php echo $row['category_id']; ?>" <?php if (isset($category_id) && $category_id == $row['category_id']) echo 'selected'; ?>>
                                <?php echo $row['category_name']; ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                
                  <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Sub-Category</label>
                      <select class="select" name="sub_category">
                        <option value="null">Choose Sub-Category</option>
                        <?php if ($all_sub_category): ?>
                          <?php while ($row = mysqli_fetch_assoc($all_sub_category)): ?>
                            <option value="<?php echo $row['sub_category_id']; ?>"><?php echo $row['sub_category_name']; ?></option>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" value=""><?php echo $product_data['description'];?></textarea>
                  </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" value="<?php echo $product_data['price']; ?>"/>
                  </div>
                </div>
                <div class="col-lg-9">
                <div class="form-group">
                    <label> Product Main Image</label>
                    <div class="image-upload">
                    <input type="file" name="main_image" id="main_image" onchange="previewImage(event, 'main_image_preview')" />
                    <div class="image-uploads">
                        <img id="main_image_preview" src="<?php echo $product_data['image_url']; ?>" alt="Main Image Preview" style="max-width: 100px;margin-top:-20px; max-height: 100px;" />
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                <div class="form-group">
                    <label> Product Sub-Image 1</label>
                    <div class="image-upload">
                    <input type="file" name="sub_image1" id="sub_image1" onchange="previewImage(event, 'sub_image1_preview')" />
                    <div class="image-uploads">
                        <img id="sub_image1_preview" src="<?php echo $product_data['sub_image1']; ?>" alt="Sub Image 1 Preview" style="max-width: 100px;margin-top:-20px; max-height: 100px;" />
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                <div class="form-group">
                    <label> Product Sub-Image 2</label>
                    <div class="image-upload">
                    <input type="file" name="sub_image2" id="sub_image2" onchange="previewImage(event, 'sub_image2_preview')" />
                    <div class="image-uploads">
                        <img id="sub_image2_preview" src="<?php echo $product_data['sub_image2']; ?>" alt="Sub Image 2 Preview" style="max-width: 100px;margin-top:-20px; max-height: 100px;" />
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                <div class="form-group">
                    <label> Product Sub-Image 3</label>
                    <div class="image-upload">
                    <input type="file" name="sub_image3" id="sub_image3" onchange="previewImage(event, 'sub_image3_preview')" />
                    <div class="image-uploads">
                        <img id="sub_image3_preview" src="<?php echo $product_data['sub_image3']; ?>" alt="Sub Image 3 Preview" style="max-width: 100px;margin-top:-20px; max-height: 100px;" />
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                <div class="form-group">
                    <label> Product Sub-Image 4</label>
                    <div class="image-upload">
                    <input type="file" name="sub_image4" id="sub_image4" onchange="previewImage(event, 'sub_image4_preview')" />
                    <div class="image-uploads">
                        <img id="sub_image4_preview" src="<?php echo $product_data['sub_image4']; ?>" alt="Sub Image 4 Preview" style="max-width: 100px;margin-top:-20px; max-height: 100px;" />
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
      
<script>
  function previewImage(event, previewId) {
    const imagePreview = document.getElementById(previewId);
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        // Set the image src to the file URL
        imagePreview.src = e.target.result;
      };
      reader.readAsDataURL(file);  // Convert the file to base64 string
    }
  }
</script>

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
