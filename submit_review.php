<?php
require_once __DIR__ . '/config/database.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopId = $_POST['shop_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $createdAt = date('Y-m-d H:i:s'); // Current timestamp

    // Validate input
    if (!empty($shopId) && !empty($rating) && !empty($review)) {
        $query = "INSERT INTO reviews (shop_id, rating, review, created_at) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "iiss", $shopId, $rating, $review, $createdAt);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: shop_details.php?id=$shopId&success=1");
        } else {
            header("Location: shop_details.php?id=$shopId&error=1");
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: shop_details.php?id=$shopId&error=1");
    }
}
?>
