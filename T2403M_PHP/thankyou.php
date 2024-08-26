<?php 
    session_start();
    require_once("./functions/cart.php");
    $items = getCartItems();
    $grand_total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<?php include("html/head.php");?>
<body>
<?php include("html/nav.php");?>
<main>
    <h2>Chúng tôi thực sự biết ơn bạn vì đã chọn chúng tôi làm nhà cung cấp dịch vụ và cho chúng tôi cơ hội phát triển. Không có thành tựu nào của chúng tôi có thể đạt được nếu không có bạn và sự hỗ trợ vững chắc của bạn.</h2>
    <p>Vui lòng kiểm tra lại email hoặc xem bảng dưới đây để biết thông tin đơn hàng</p>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Thông tin đơn hàng:</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $index=>$item):?>
                            <?php $grand_total +=   $item["price"] * $item["buy_qty"];?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td><img src="<?php echo $item["thumbnail"];?>" width="80"/></td>
                                <td><?php echo $item["NAME"];?></td>
                                <td><?php echo $item["buy_qty"];?></td>
                                <td><?php echo $item["price"];?></td>
                                <td><?php echo $item["price"] * $item["buy_qty"];?></td>
                            </tr>
                            
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h2>Summary :</h2>
                <h3>Grand total: <?php echo $grand_total;?>$</h3>
                <h3>Trạng thái : Thanh toán thành công  ✅</h3>
                <h3>Phương thức thanh toán : PayPal</h3>
                
            </div>
        </div>
    </div>
</main>
</body>
</html>