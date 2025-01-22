<?php

include 'config.php';

if(isset($_GET['id'])){
  $product_id = $_GET['id'];

  $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');

  if(mysqli_num_rows($select_product) > 0){
    $fetch_product = mysqli_fetch_assoc($select_product);
    $pdf_path = 'uploaded_pdfs/'.$fetch_product['pdf'];  // Construct the PDF path
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View PDF</title>
</head>
<body>
  <iframe src="<?php echo $pdf_path; ?>" width="100%" height="600px"></iframe>
</body>
</html>

<?php
  }else{
    echo '<p>Error: Invalid product ID!</p>';
  }
}else{
  echo '<p>Error: Missing product ID!</p>';
}

?>
