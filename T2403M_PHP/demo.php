<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Shopping Cart Items -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Shopping Cart</h4>
                    </div>
                    <div class="card-body">
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
                                <tr>
                                    <td>
                                        <img src="black-hoodie.jpg" alt="Black Hoodie" class="img-fluid" style="width: 50px;">
                                        Black Hoodie
                                    </td>
                                    <td>€70.00</td>
                                    <td>1</td>
                                    <td>€70.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="sleeveless-shirt.jpg" alt="Sleeveless Shirt" class="img-fluid" style="width: 50px;">
                                        Sleeveless Shirt
                                    </td>
                                    <td>€135.00</td>
                                    <td>1</td>
                                    <td>€135.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cart Totals -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Cart Totals</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Subtotal</td>
                                <td>€205.00</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>
                                    <form method="POST">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping" value="free" id="freeShipping" checked>
                                            <label class="form-check-label" for="freeShipping">
                                                Free shipping
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping" value="flat" id="flatRate">
                                            <label class="form-check-label" for="flatRate">
                                                Flat rate: €10.00
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping" value="pickup" id="pickup">
                                            <label class="form-check-label" for="pickup">
                                                Pickup: €15.00
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Calculate shipping</button>
                                    </form>
                                </td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td>Total</td>
                                <td>
                                    <?php
                                        $subtotal = 205.00;
                                        $shipping = 0;
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                            if ($_POST['shipping'] === 'flat') {
                                                $shipping = 10.00;
                                            } elseif ($_POST['shipping'] === 'pickup') {
                                                $shipping = 15.00;
                                            }
                                        }
                                        $total = $subtotal + $shipping;
                                        echo '€' . number_format($total, 2);
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <a href="checkout.php" class="btn btn-dark btn-block">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
