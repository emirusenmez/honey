<?php
// Veritabanı bağlantısını içe aktarın
include 'connection.php';

// URL'den kullanıcı kimliğini alın
$user_id = $_GET['user_id'];

// Kullanıcının bilgilerini almak için sorguyu hazırlayın
$query = "SELECT * FROM userinfo WHERE user_id = $user_id";

// Sorguyu çalıştırın
$result = mysqli_query($conn, $query);

// Kullanıcının bilgilerini döngü içinde alın
while ($row = mysqli_fetch_assoc($result)) {
    $upper_body_size = $row['upper_body_size'];
    $lower_body_size = $row['lower_body_size'];
    $shoe_size = $row['shoe_size'];
    $favorite_color = $row['favorite_color'];

    // HTML yapısını başlatın
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Kullanıcı Bilgileri</title>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h1>Kullanıcı Bilgileri</h1>";
    echo "<div class='user-info'>";
    echo "<p><strong>Üst Beden:</strong> <span id='upper-body-size'>$upper_body_size</span></p>";
    echo "<p><strong>Alt Beden:</strong> <span id='lower-body-size'>$lower_body_size</span></p>";
    echo "<p><strong>Ayak Numarası:</strong> <span id='shoe-size'>$shoe_size</span></p>";
    echo "<p><strong>Sevdiği Renk:</strong> <span id='favorite-color'>$favorite_color</span></p>";
    echo "</div>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}

// Veritabanı bağlantısını kapatın
mysqli_close($conn);
?>
