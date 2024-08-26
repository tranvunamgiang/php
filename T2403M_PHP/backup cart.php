<?php
session_start();
$cart = isset($_SESSION["cart"])?$_SESSION["cart"] : [];
require_once("./functions/db.php");
require_once("./functions/cart.php");
$cartItems = getCartItem();
?>


<!DOCTYPE html>
<html lang="en">
<?php include_once("./html/head.php"); ?>
<body>
<?php include_once("./html/nav.php"); ?>
<main>
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <h2>Shopping cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($cartItems as $item) :?>
                    <tr>
                        <td>
                            <div class="card">
                                <img src="<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['NAME']; ?>" class="card-img-top">
                            </div>
                        <?php echo $item['NAME']; ?>
                        </td>
                        <td>$ <?php echo $item['price']; ?></td>
                        <td><?php echo $item['id']; ?></td>
                        <td>$<?php echo number_format($item['price'] * $item['id']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h2>Cart Totals</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>$<?php
                             $sub = 0;
                             foreach($cartItems as $item) {
                                $sub += $item['price'] * $item['id'];
                             }
                             echo number_format($sub,2);
                             ?></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free shipping</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>$<?php
                             $sub = 0;
                             foreach($cartItems as $item) {
                                $sub += $item['price'] * $item['id'];
                             }
                             echo number_format($sub,2);
                             ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="/checkout.php" class="btn btn-outline-danger">
                    Checkout
                </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</main>
</body>
</html>