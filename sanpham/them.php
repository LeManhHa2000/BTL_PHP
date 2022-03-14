<?php 
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        $img = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];

        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $sql = "INSERT INTO products (prd_name, img, price, quantity, description, brand_id )
        VALUES ('$prd_name', '$img', $price, $quantity, '$description', $brand_id )";

        $query = mysqli_query($connect, $sql);
        move_uploaded_file($img_tmp, 'img/'.$img);
        header('location: index.php?page_layout=danhsach');
    }
?>

<div class="contariner-fluid">
    <div class="card">
        <h1 class="card-header">
            Thêm sản phẩm
        </h1>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Tên sản phẩm</label>
                  <input type="text" name="prd_name" class="form-control" require>
                </div>

                <div class="form-group">
                  <label for="">Ảnh sản phẩm</label> <br>
                  <input type="file" name="img">
                </div>

                <div class="form-group">
                  <label for="">Giá sản phẩm</label>
                  <input type="number" name="price" class="form-control" require>
                </div>

                <div class="form-group">
                  <label for="">Số lượng sản phẩm</label>
                  <input type="number" name="quantity" class="form-control" require>
                </div>

                <div class="form-group">
                  <label for="">Mô tả sản phẩm</label>
                  <input type="text" name="description" class="form-control" require>
                </div>

                <div class="form-group">
                  <label for="">Thương hiệu</label>
                  <select class="form-control" name="brand_id">
                      <?php 
                            while($row_brand = mysqli_fetch_assoc($query_brand)){ ?>
                                <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                           <?php } ?>
                      
                  </select>
                </div>

                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>