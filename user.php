<?php 
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
        header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }
    if (isset($_POST['submit-btn'])) {
        $upper_body_size = mysqli_real_escape_string($conn, $_POST['upper_body_size']);
        $lower_body_size = mysqli_real_escape_string($conn, $_POST['lower_body_size']);
        $shoe_size = mysqli_real_escape_string($conn, $_POST['shoe_size']);
        $adress = mysqli_real_escape_string($conn, $_POST['adress']);

        // Kullanıcının daha önce bu beden bilgilerini gönderip göndermediğini kontrol etmek için SELECT sorgusu
        $select_query = mysqli_query($conn, "SELECT * FROM `userinfo` WHERE user_id = '$user_id'") or die('Query failed');
        if (mysqli_num_rows($select_query) > 0) {
            echo 'Bilgileriniz başarıyla kaydedildi değiştirmek isterseniz bizimle iletişime geçin';
        } else {
            // Kullanıcının daha önce beden bilgilerini göndermemişse, yeni bilgileri veritabanına ekleyin
            $insert_query = mysqli_query($conn, "INSERT INTO `userinfo`(`user_id`, `upper_body_size`, `lower_body_size`, `shoe_size`, `adress`) VALUES ('$user_id', '$upper_body_size', '$lower_body_size', '$shoe_size', '$adress')") or die('Query failed');
            if ($insert_query) {
                echo 'Beden bilgileriniz başarıyla kaydedildi değiştirmek isterseniz bizimle iletişime geçin.';
            } else {
                echo 'Bir hata oluştu, lütfen tekrar deneyin.';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------------------------bootstrap icon link------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>veggen - Beden Bilgileri Formu</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="line"></div>
    <!-----------------------about us------------------------>

    <div class="line4"></div>
    <div class="form-container">
        <h1 class="title">Bedenlerinizi Girin</h1>
        <form method="post">
            <div class="input-field">
                <label>Üst Bedeniniz</label>
                <select name="upper_body_size" class="form-control">
                    <option value="S">S</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="input-field">
                 <label>Alt Bedeniniz:</label>
                <select name="lower_body_size" class="form-control">
                    <option value="S">S</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="input-field">
                <label>Ayak Numaranız:</label><br>
                <input type="number" name="shoe_size" min="36" max="46" step="1" value="36" class="form-control">
            </div>
             <label>Adresinizi Giriniz:</label><br>
             <textarea name="adress" rows="10" cols="30"></textarea>
            <button type="submit" name="submit-btn" class="btn">Bilgileri Gönder</button>
        </form>
    </div>
    
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>
