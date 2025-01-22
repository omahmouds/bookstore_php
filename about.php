<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/main.css">
      <!-- Swiper CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>


<section class="about">

<div class="flex">

   <div class="image">
         <img src="images/Ebook-pana.svg" alt="">
   </div>
   <div class="content">
      <h3>لماذا نحن؟</h3>
      <p>Per Medu هو موقع إلكتروني متخصص في توفير ملخصات شاملة لمجموعة متنوعة من الكتب في مختلف المجالات والمواضيع. يُقدم الموقع للقرّاء فرصة الوصول إلى ملخصات مفيدة وموثوقة تساعدهم على فهم مضامين الكتب بسرعة وسهولة.

بالإضافة إلى ذلك، يُقدم Per Medu خدمة شراء الكتب الكاملة لمن يفضلون الاطلاع على المزيد، مع توفير وسائل دفع آمنة وخيارات شحن متعددة لتلبية احتياجات جميع الزوار.

يهدف الموقع إلى توفير تجربة ممتعة ومفيدة للقرّاء، حيث يمكنهم اكتشاف واقتناء الكتب التي تهمهم بسهولة ويسر، مما يسهم في تعزيز ثقافة القراءة ونشر المعرفة بشكل واسع ومتاح للجميع.</p>

      <a href="contact.php" class="btn">تواصل معنا </a>
   </div>
</div>
</section>

<!--the end slider card-->














<?php include 'footer.php'; ?>

<script src="js/j"></script>
</body>
</html>