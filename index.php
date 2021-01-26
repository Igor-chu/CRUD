<?php require_once 'process.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud');
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <form method="POST" action="process.php">
            <div class="row">
                <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?= $name; ?>">
                </div>
                <div class="mb-3 col">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter your location" value="<?= $location; ?>">
                </div>
                <div class="mb-1">
                    <?php
                    if ($update == true):?>
                        <button type="submit" class="btn btn-info float-end" name="update">Update</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary float-end" name="save">Save</button>
                    <?php endif ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php





?>










<!--//    if(!empty($_GET['phone_number']) && !empty($_GET['name']) && !empty($_GET['email'])){-->
<!--//        $phone_code = substr($_GET['phone_number'], 3, 2);-->
<!--//        if($phone_code != 0){-->
<!--//            $phone_number = trim(strip_tags($_GET['phone_number']));-->
<!--//            $name = trim(strip_tags($_GET['name']));-->
<!--//            $email = trim(strip_tags($_GET['email']));-->
<!--//            echo "Ваш номер телефона : {$phone_number}, ваше имя : {$name}, ваш адрес эл.почты : {$email}";-->
<!--//        } else {-->
<!--//            echo 'Неверный код телефона!';-->
<!--//        }-->
<!--//    } else {-->
<!--//        echo 'Заполните все поля!';-->
<!--//    }-->


<!--<form action="" method="get">-->
<!--    <label for="phone_number">Ваш номер телефона в международном формате :</label>-->
<!--    <input type="phone" name="phone_number" minlength="12" maxlength="12" placeholder="введите номер телефона">-->
<!--    <label for="name">Ваше имя :</label>-->
<!--    <input type="text" name="name" placeholder="введите имя" minlength="2" maxlength="30">-->
<!--    <label for="email">Ваш адрес эл. почты :</label>-->
<!--    <input type="email" name="email" placeholder="введите адрес эл. почты">-->
<!--    <input type="submit">-->
<!--</form>-->



<!--//$quantityRedBefore = 1;-->
<!--//$quantityGreenBefore = 1;-->
<!--//$time = $_POST['time'];-->
<!--//-->
<!--//for($i = 1; $i <= $time; $i ++){-->
<!--//    $quantityRedAfter = $quantityGreenBefore * 3;-->
<!--//    $quantityGreenAfter = $quantityRedBefore * 2 + $quantityGreenBefore * 2;-->
<!--//    $quantityRedBefore = $quantityRedAfter;-->
<!--//    $quantityGreenBefore = $quantityGreenAfter;-->
<!--//    $sum = $quantityRedBefore + $quantityGreenBefore;-->
<!--//}-->
<!--//echo 'Количество красных бактерий - ' . $quantityRedBefore . ', количество зеленых бактерий - ' . $quantityGreenBefore . '<br>';-->
<!--//echo 'Суммарно бактерий - ' . $sum;-->
