<?php 
    ob_start();
        session_start();

    include 'conect.php';

if(isset($_GET['cat'])){

    $c=$_GET['cat'];
}

$stmt=$con->prepare("SELECT value FROM setting where id=1  ");
    $stmt->execute();
    $row=$stmt->fetch();
if($row['value']==1){
    
header("Location:undermaintenance.php");
}else{                
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $stmt=$con->prepare("SELECT * FROM users where email=? AND status=1 ");
    $stmt->execute(array($email));
    if($stmt->rowCount() >0){
        session_unset();
        session_destroy();
        header('location:index.php');
        exit();    
    }
}
  
    

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
$stmt=$con->prepare("SELECT value FROM setting WHERE id=2  ");
$stmt->execute();
$row=$stmt->fetch();
?>
    <title>
        <?php 
      echo  $row['value'];
    ?>
    </title>
    <?php
$stmt=$con->prepare("SELECT value FROM setting WHERE id=3  ");
$stmt->execute();
$row=$stmt->fetch();
?>
    <meta name="description" content="<?php 
  
    $row['value'];


  ?>
  ">

    <link rel="icon" type="image/png" href="img/logo.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="css/cheatsheet.rtl.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="css/style.css">
</head>

<body id="Home">

    <div class="page-container">
        <div class="not-footer">

            <div class="page-header">

                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand logo" href="index.php">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav mb-2 mb-md-0">

                                <li class="nav-item active">
                                    <a class="nav-link" aria-current="page" href="index.php">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" aria-current="page" href="about.php">
                                        <i class="fas fa-question"></i>
                                        من نحن
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="license.php">
                                        <i class="fas fa-file-signature"></i>
                                        الشروط والأحكام
                                    </a>
                                </li>

                                <?php 
                                 if(!isset($_SESSION['username'])){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">
                                        <i class="fas fa-user"></i>
                                        تسجيل الدخول - تسجيل
                                    </a>
                                </li>
                                <?php 
                                
                                 }
                                else{
                                    ?>
                                <li class="btn-group nav-item">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-user"></i>
                                        <?php
                                    echo $_SESSION['username'];
                                    ?>
                                    </button>
                                    <ul class="dropdown-menu">

                                        <li><a class="dropdown-item" href="boughtproducts.php">
                                                <i class="fas fa-shopping-cart"></i>
                                                طلبات تم شراؤها
                                            </a></li>

                                        <li><a class="dropdown-item" href="wishlist.php">
                                                <i class="fas fa-heart"></i>
                                                المفضلة
                                            </a></li>

                                        <!-- <li>
                                            <a class="dropdown-item" href="waitingproducts.php">
                                                <i class="fas fa-cash-register"></i>
                                                طلبات بانظار الدفع
                                            </a>
                                        </li> -->
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="usersettings.php">
                                                <i class="fas fa-user-cog"></i>
                                                إعدادات المستخدم
                                            </a></li>

                                        <li><a class="dropdown-item" href="logout.php">
                                                <i class="fas fa-sign-out-alt"></i>
                                                تسجيل الخروج
                                            </a></li>

                                    </ul>
                                </li>
                                <?php
                                    
                                }
                                ?>
                            </ul>
                        </div>
                        <a href="checkout.php" class="cart iconRound">

                            <span class="badge bg-secondary rounded-pill"> <span class="badge"></span>
                            </span>
                            <i class="fas fa-shopping-cart"></i>
                        </a>

                    </div>

                </nav>


                <div class="banner">
                    <div class="layer">

                        <h1>
                            Lucky Helmet Store
                        </h1>

                        <h3>
                            سعر مقابل جوده عالية للمنتج

                        </h3>


                        <div class="mouseScroll">
                            <div class="botn"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="page-body">

                <div class="bd-example">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">

                            <a class="nav-link  <?php if($c==4){
                                   echo 'active';
                                   } ?>" id="nav-desktop-tab" href="?cat=4" role="tab" aria-controls="nav-desktop"
                                aria-selected="true">

                                <i class="fas fa-desktop"></i>

                            </a>
                            <a class="nav-link <?php if($c==1){
                                   echo 'active';
                                   } ?>" href="?cat=1" role="tab" aria-controls="nav-mobile" class=""
                                aria-selected="false">

                                <i class="fas fa-mobile-alt"></i>

                            </a>
                            <a class="nav-link <?php if($c==2){
                                   echo 'active';
                                   } ?>" href="?cat=2" role="tab" aria-controls="nav-playstation"
                                aria-selected="false">

                                <i class="fab fa-playstation"></i>

                            </a>
                            <a class="nav-link <?php if($c==3){
                                   echo 'active';
                                   } ?>" href="?cat=3" role="tab" aria-controls="nav-xbox" aria-selected="false">

                                <i class="fab fa-xbox"></i>

                            </a>

                        </div>

                        <div class="container">

                            <form class="d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control sreach_bar" placeholder="ابحث عن ما تريده" />
                                </div>
                            </form>
                            <div class="mb-3 price-filter">
                                <label for="customRange3" class="form-label">50 EGP</label>
                                <label for="customRange3" class="MAX form-label">1200 EGP</label>
                                <input type="range" class="form-range" min="50" max="1200" step="100" id="customRange3">
                                <span> <a class="btn all">All Product </a></span>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="tab-pane fade show active" id="nav-desktop" role="tabpanel"
                    aria-labelledby="nav-desktop-tab">
                    <div class="container">
                        <div class="row">
                            <div id="sreach_reusl" style="direction: rtl">
                            </div>
                        </div>
                    </div>

                </div>

                <section id="sr">

                    <div class="tab-content" id="nav-tabContent">


                        <div class="tab-pane fade show active" id="nav-desktop" role="tabpanel"
                            aria-labelledby="nav-desktop-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="section-container row">

                                        <?php 
                        $cat=$_GET['cat'];
                            if(isset($cat)){
                                $query = "SELECT * FROM categories WHERE main_Categories_id=".$cat."";

                            }else{
                                $query = "SELECT * FROM categories";

                            }

$statement = $con->prepare($query);
$statement->execute();
	$result1 = $statement->fetchAll();
    foreach($result1 as $rows){

                                ?>
                                        <div
                                            class="section-header d-flex justify-content-between align-items-center mb-4">
                                            <div class="section-title">
                                                <span>
                                                    <?php echo $rows['name']; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php   
        $Categories_id=$rows['id'];
        $query = "SELECT * FROM sub_categories WHERE Categories_id=?";

$statement = $con->prepare($query);
$statement->execute(array($Categories_id));
	$result2 = $statement->fetchAll();
    foreach($result2 as $sub){ ?>
                                        <div
                                            class="section-header partition-header d-flex justify-content-between align-items-center mb-4">
                                            <div class="section-title partition-title">
                                                <span>
                                                    <?php echo $sub['name']; ?>
                                                </span>
                                            </div>
                                        </div>


                                        <?php     
                              
                                 $sub_Categories_id=$sub['id'];
     $query = "SELECT * FROM items WHERE sub_Categories_id=? AND showw=0";

$statement = $con->prepare($query);

if($statement->execute(array($sub_Categories_id)));
{
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	echo	'      <div class="col-6 col-md-4 col-lg-3">
          <div class="card">    
                                <div class="image">

                                        
                                              <img src="Admin/upload/av/'.$row["image"].'" class="img-responsive" />     <a id="'.$row["id"].'" class="ssss">

                                <input type="hidden" name="quantityw" id="quantityw'.$row["id"] .'"value="1" />
              <input type="hidden" name="imagew" id="imagew'.$row["id"].'" value="'.$row["image"].'" />
            
            <input type="hidden" name="namew" id="namew'.$row["id"].'" value="'.$row["name"].'" />
            <input type="hidden" name="pricew" id="pricew'.$row["id"].'" value="'.$row["price"].'" />
            </a> 
             <div class="wish layer">

                                                      <i class="fas fa-heart ';
    foreach($_SESSION["whies"] as $keys => $values)
    {

                                                      if($values['wish_id']==$row["id"])


{

echo 'clicked';
}else{
    echo 'ssss';
} 
}
echo '"  ></i>
                                           

                                            </div>
                                </div>
                                              
           

            	 <div class="card-body">
     
                 <div class="cardcontainer">
                
  ';
  $product_discount=$row['discount'];
  if($product_discount>0){
      echo ' <span class="ribbon">'.$row['discount']. ' %  </span> ';
             

  }
  echo'
                        
                 <h5 class="card-title">'.$row["name"].'</h5>
                                                    <p class="card-text">'.$row["Describes"].'</p>
                                                
                                                    <div class="platforms">
                                                        <h5>
                                                            التصنيفات
                                                        </h5>
                                                        ';
if($row['desktop']==1){
echo '<i class="fas fa-desktop"></i>';
}

if($row['phone']==1){
echo '<i class="fas fa-mobile-alt"></i>';
}
if($row['play']==1){
echo '<i class="fab fa-playstation"></i>';
}

if($row['xbox']==1){
echo '<i class="fab fa-xbox"></i>';
}

                                                        
                                                        
                                                        
                                                  
                                                  echo '  
                                                      </div>
';
$id=$row["id"];
$stmt=$con->prepare("SELECT SUM(available) AS value_sum FROM 
accounts  WHERE  product_id=? AND available=1");
    $stmt->execute(array($id));
    $s=$stmt->fetch();
                 
$stmt=$con->prepare("SELECT AVG(value) FROM 
rating  WHERE product_id=?");
                           $stmt->bindValue('id', $row["id"] );
    $stmt->execute(array($row["id"] ));
    $avg=$stmt->fetchColumn();
 
?>
                                        <div class="ra">
                                        <span class="fa fa-star readrating <?php if($avg >4 && $avg <= 5)echo '
                                                checked' ?> "></span>
                                            <span class="fa fa-star  readrating <?php if($avg >3)echo' checked' ?>
                                                "></span>
                                            <span
                                                class="fa fa-star readrating <?php if($avg >2 )echo 'checked' ?>  "></span>
                                            <span
                                                class="fa fa-star readrating <?php if($avg >1 )echo 'checked' ?> "></span>
                                            <span
                                                class="fa fa-star  readrating <?php if($avg >0) echo 'checked' ?>"></span>
                                        </div>

                                        <?php 
if($s['value_sum'] >0)
{    
echo '
                <input type="hidden" name="quantity" id="quantity'.$row["id"] .'"value="1" />
                              <input type="hidden" name="image" id="image'.$row["id"].'" value="'.$row["image"].'" />

          	<input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
           
            </div>
                 <div class="btn-group card_footer" role="group" aria-label="Basic example">
                     <a href="#0" class="btn add_to_cart  " id="'.$row["id"].'">
                                                        <i class="fas fa-cart-plus"></i>                         
            	<input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;"  class="btn btn-success form-control add_to_cart" value="إضافة إلى العربة" />
                </a>
            <div class="price-t">'.$row["price"] .' EGP</div>
        
                                         
                                                ';
}else{
    echo '
    </div>
           <div class="btn-group card_footer" role="group"
                                                    aria-label="Basic example">
                                                    <div class="outofstock"></div>
                                                    <div class="price-t">200 EGP</div>
                                                </div> ';
}
                                                
                                                                              echo '</div>
                                        </div>
                                    </div>
                                </div> 

		';
	}
}
    
    }      }   ?>

                                    </div>
                                </div>
                                </div>
                        </div>
                </section>



                <div class="reviews">

                    <!-- Swiper -->
                    <div class="slider-container">
                        <div class="swiper-container container">
                            <div class="swiper-wrapper">
                                <?php 
    $query = "SELECT * FROM 
rating, users 	
WHERE
users.id=rating.user_id 
AND 
available_of_home=1";

$statement = $con->prepare($query);
$statement->execute();
$rows=$statement->fetchAll();

                                
                                foreach($rows as $row){
                                    $a=$row['value'];
                                ?>
                                <div class="swiper-slide ">
                                    <div class="review">
                                        <div class="quote">
                                            <p>
                                                <?php
                                    echo $row['comment'];
                                         ?>
                                            </p>

                                            <div class="user">

                                                <img src="img/12.png" alt="profile">
                                                <div class="text-right">
                                                    <span class="testimonials-item__author">
                                                        <?php
                                    echo $row['frist_name'];
                                         ?>
                                                    </span>
                                                    <ul class="rating">
                                                        <?php if($a ==1)                          
                                    {?>

                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <?php 
    }else if($a ==2){
                                    ?>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <?php 
    }else if($a==3){
                                    ?>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <?php 
    }else if($a==4){
                                    ?>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>

                                                        <?php
        
    }   else if($a==5){
                                    ?>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <li> <i class="fa fa-star star-on"></i></li>
                                                        <?php
                                                        }else{
                                                            
                                                        }
                                    ?>
                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                        <?php 
                                
                                }
                                ?>


                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row choose">
                                    <h1>
                                        مزايا المتجر
                                    </h1>

                                    <div class="col-lg-6">
                                        <div class="reason">
                                            <div class="iconRoundWrap">
                                                <div class="iconRound">
                                                    <i class="fas fa-shipping-fast"></i>
                                                </div>
                                            </div>
                                            <div class="itemField">
                                                <h3>
                                                    سرعة الشحن
                                                </h3>
                                                <div class="description">
                                                    <p>
                                                        المنتج يجيك فى صندوق الموقع بعد دفع مباشرةً، في نفس اللحظة
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="reason">
                                            <div class="iconRoundWrap">
                                                <div class="iconRound">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                            <div class="itemField">
                                                <h3>
                                                    سعر مقابل جوده عالية للمنتج
                                                </h3>
                                                <div class="description">
                                                    <p>
                                                        نتميز ب ارخص الاسعار و صدق الوصف و خصومات يومييه وطرق دفع متعددة
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="reason">
                                            <div class="iconRoundWrap">
                                                <div class="iconRound">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                            </div>
                                            <div class="itemField">
                                                <h3>
                                                    الدعم متواجد دائمًا
                                                </h3>
                                                <div class="description">
                                                    <p>
                                                        في حال حدوث اي مشاكل في الحسابات الرجاء التواصل مع دعم الفنى
                                                        نوفر لك
                                                        اكثر من
                                                        طريقة للتواصل :( تيلجرام - انستجرام - فيس بوك - ديسكورد - شات
                                                        مباشر
                                                        بالموقع
                                                        -
                                                        ميل المتجر )
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="reason">
                                            <div class="iconRoundWrap">
                                                <div class="iconRound">
                                                    <i class="fas fa-shield-alt"></i>
                                                </div>
                                            </div>
                                            <div class="itemField">
                                                <h3>
                                                    امان الحساب
                                                </h3>
                                                <div class="description">
                                                    <p>
                                                        يتم فحص جميع الحسابات التى توجد فى كل العروض كل ساعة حتى نضمن
                                                        لعملائنا سلامة
                                                        الحساب
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer my-5 text-muted text-center text-small">
            <div class="py-4">

                <ul class="list-inline">
                    <li class="list-inline-item"><a href="about.html">من نحن</a></li>
                    <li class="list-inline-item"><a href="license.html">شروط</a></li>
                    <li class="list-inline-item"><a href="dmca.html">DMCA</a></li>
                </ul>
                <ul class="social0media">

                    <li class="list-inline-item"><a href="https://www.facebook.com/LuckyHelmet0/" target="blank_">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>

                    <li class="list-inline-item"><a href="https://www.instagram.com/lucky_helmet_st/" target="blank_">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>

                    <li class="list-inline-item"><a href="https://discord.gg/hnRvd5qVxp" target="blank_">
                            <i class="fab fa-discord"></i> </a>
                    </li>

                    <li class="list-inline-item"><a href="https://t.me/luckyhelmet" target="blank_">
                            <i class="fab fa-telegram-plane"></i> </a>
                    </li>

                </ul>

            </div>
            <ul class="list-inline payments">
                <li class="list-inline-item">
                    <img src="img/footer/visa_footer.png" alt="visa">
                </li>
                <li class="list-inline-item">
                    <img src="img/footer/vodafonecash.png" alt="vodafonecash">
                </li>
                <li class="list-inline-item">
                    <img src="img/footer/fawry-pay-english-logo-1.png" alt="fawry-pay">
                </li>
                <p class="my-1 mt-3 lucky0helmet">&copy; lucky helmet 2021</p>
            </ul>
        </footer>


    </div>

    <!-- Jquery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Swiperjs -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- My own script -->
    <script src="js/script.js"></script>

    <!-- SwiperJsscript -->
    <script src="js/swiperscript.js"></script>

    <script src="js/cart.js"></script>

    <script>
        $(document).ready(function () {

            $(document).keyup('sreach_bar', function () {
                var name = $('.sreach_bar').val();
                var action = 'sreaach_bar';
                $.ajax({
                    url: "Sreach_bar.php",
                    method: "POST",
                    data: { name: name, action: action },
                    success: function (data) {
                        if (name == '') {
                            $("#sreach_reusl").css("display", "none");
                            $("#sr").css("display", 'block');
                        } else {
                            $("#sr").css("display", 'none');

                            $("#sreach_reusl").css("display", "block");

                            $("#sreach_reusl").html(data);
                        }

                    }
                });

            });

            $(document).on('change', function () {
                var names = $('#customRange3').val();
                var action = 'price_bar';

                $.ajax({
                    url: "Sreach_bar.php",
                    method: "POST",
                    data: { names: names, action: action },
                    success: function (data) {
                        $("#sr").css("display", 'none');

                        $("#sreach_reusl").css("display", "block");

                        $("#sreach_reusl").html(data);
                        $(".MAX").text(names);


                    }
                });

            });

            $(document).on('click', function () {

                $("#sreach_reusl").css("display", "none");
                $("#sr").css("display", 'block');

            });
            return false;

        });

    </script>
</body>

</html>
<?php 
}
?>