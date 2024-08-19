<?php
$menu = [
    "Cá kho", 
    "Phở gà ",
    "Cơm Tấm",
    "Bún Bò "
] ;
$sv= [
    "name" => "Nguyen Van A ",
    "age" => "18",
    "Tele" => "123456789"
];
$list_sv = [
    [
        "name" => "Do Viet Anh",
        "age" => "18",
        "Tele" => "2345678"
    ],
    [
        "name" => "Nguyen Minh Duc",
        "age" => "20",
        "Tele" => "0322677833"
    ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thực đơn ngày hôm nay</h1>
    
<ul>
    <?php foreach($menu as $item){ ?>
    <li><?php echo $item; ?></li>
    <?php } ?>
</ul>
<h2>Thông tin sinh viên:</h2>
<h3><?php echo $sv['name']; ?></h3>
<h3><?php echo $sv['age']; ?></h3>
<h3><?php echo $sv['Tele']; ?></h3>

<?php foreach($list_sv as $s):?>
    <div>
        <h3><?php echo $s['name'];?></h3>
        <h3><?php echo $s['age']; ?></h3>
        <h3><?php echo $s['Tele']; ?></h3>
</div>
<?php endforeach;?>
    
    
</body>
</html>
