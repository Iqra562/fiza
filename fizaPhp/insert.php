<?php
include('query.php')
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class='container mt-5'>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="pName" id="">
            </div>

            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" class="form-control" name="pPrice" id="">
            </div>

            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" class="form-control" name="pImg" id="">
            </div>

            <div class="form-group">
                <label for="">Category ID</label>
                <select name="c_id" id="">
                    <option value="">select category</option>
                    <?php
                    $query = $pdo->query('select * from category');
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $data) {
                        ?>
                        <option value="<?php echo $data['ID'] ?>">
                            <?php echo $data['ID'] ?>
                        </option>

                        <?php
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark" name="insert" value="Add Product" id="">
        </form>

    </div>

</body>

</html>