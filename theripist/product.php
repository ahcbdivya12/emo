<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM therapist WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?><?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="img/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
         <h3 style="font-size: 30px;"><?=$product['name']?></h3>
            <span class="name"><?=$product['desc']?></span>
            <span class="name"><?=$product['address']?></span>
    
        <span class="name">  <h2>Best Psychologists India</h2>

we are provides the best and top psychologists and counsellors in India.  We are committed to provide you the best therapy and counselling experience.</span>
      <form action="https://meet.google.com/jnh-gfsw-qmb" method="post">
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Call">
        </form>
       </div>
</div>

<?=template_footer()?>