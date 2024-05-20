<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diğer Kullanıcı Bilgileri</title>
</head>
<body>
    <h2>Diğer Kullanıcı Bilgileri</h2>
    <form action="" method="GET">
        <label for="other_user_id">Başka Bir Kullanıcı ID'si:</label>
        <input type="text" id="other_user_id" name="other_user_id" required>
        <button type="submit">Bilgileri Getir</button>
    </form>

    <?php
    // Kullanıcının daha önce bilgi girdiğini kontrol et
    include 'connection.php';
    

    // Eğer başka bir kullanıcının ID'si gönderilmişse
    if(isset($_GET['other_user_id'])) {
        // Başka bir kullanıcının ID'sini alın
        $other_user_id = $_GET['other_user_id'];

        // Seçilen kullanıcının bilgilerini veritabanından alın
        $query = mysqli_query($conn, "SELECT * FROM userinfo WHERE user_id = '$other_user_id'");
        if(mysqli_num_rows($query) > 0) {
            // Kullanıcının bilgilerini göster
            $row = mysqli_fetch_assoc($query);
            ?>
            <p>Kullanıcı adı : <span><?php echo $row['name']; ?></span></p>
            <p>Mail Adresi : <span><?php echo $row['email']; ?></span></p>
            <p>Üst Beden : <span><?php echo $row['upper_body_size']; ?></span></p>
            <p>Alt Beden : <span><?php echo $row['lower_body_size']; ?></span></p>
            <p>Ayak Bedeni : <span><?php echo $row['shoe_size']; ?></span></p>
            <p>Adres : <span><?php echo $row['adress']; ?></span></p>
        <?php } else {
            echo "Kullanıcının bilgileri bulunamadı.";
        }
    }
    ?>

</body>
</html>
