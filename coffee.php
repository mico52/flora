<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORA Gourmet coffee</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/en-tw.css">
    <link rel="stylesheet" href="css/coffee.css">
    <link rel="stylesheet" href="css/media.css">
    <?php
      require_once("connection.php");
    ?>
  </head>
  <body>
    <header>
      <div class="slide">
        <ul class="fade">
          <?php 
            $carousel = $connect -> query("SELECT phase FROM carousel");
            foreach($carousel as $row){
          ?>
          <li class="mySlides"><?php echo $row['phase']?></li>
          <?php 
            }
          ?>
        </ul>
      </div>
    </header>
    <div class="spot">
      <div class="regionArea">
        <div class="dropdown" data-dropdown>
          <button class="color region" data-dropdown-button id="regionShow"></button>
            <div class="dropdownMenu">
              <div class="regionSelect">SELECTION</div>
              <ul>
                  <?php
                  $result = $connect -> query("SELECT country, dollar FROM region");
                  while($rows = $result -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                  <div class="regionBtn">
                      <li><img src="images/<?php echo $rows['country']; ?>.png"></li>
                      <li id="country" value = "<?php echo $rows['country']; ?>"><?php echo $rows['country']; ?></li>
                      <li id = "dollar" value = "<?php echo $rows['dollar']; ?>"><?php echo $rows['dollar']; ?></li>
                  </div>
                  <?php } ?>
                </ul>
            </div>
        </div>
      </div>
      <div class="navbar">
        <a href="en-tw.php"><div class="logo">Flora</div></a>
        <div class="infoIcon">
          <div class="icon">
            <div id="search" onclick="toggleSearch()">
              <img src="images/search.png" alt="" class="search">
              <div class="textSearch">Search</div>
            </div>
            <a href="account.php">
              <div id="user">
                <img src="images/person.png" alt="" class="user">
                <div class="textUser">Account</div>
              </div>
            </a>
            <div id="like">
              <img src="images/heart.png" alt="" class="like">
              <div class="textLike">Wishlist</div>
            </div>
            <a href="cart.php" class="cart">
              <div id="bag">
                <img src="images/shopping-bag.png" alt="" class="bag">
                <div class="textBag">Cart</div>
              </div>
              <span class="cartNum" id="cartItem"></span>
            </a>
          </div>
        </div> 
      </div>
      <div class="menu">
        <ul class="mfloat">
            <li>
              <a href="#">Christmas</a>  
            </li>
            <li class="menuLink" id="line">
              <a href="#">GOURMET</a>
            </li>
              <div class="dropMenu">
                <div class="dropSection">
                  <div class="square">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <ul class="dropText">
                    <li>
                      <a href="#" class="clickG">
                        <span>Teas</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg one"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clickG">
                        <span>Coffee</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg two"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clickG">
                        <span>Chocolates</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg three"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clickG">
                        <span>Biscuits</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg four"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clickG">
                        <span>Fruit Delicacies</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg five"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clickG">
                        <span>Wines</span>
                        <div class="photoLink">
                          <div class="Gphoto">
                            <div class="Gimg six"></div>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            <li>
              <a href="#">Gift Collection</a>
            </li>
            <li>
              <a href="#">Gift Card</a>
            </li>
            <li>
              <a href="#">News & Events</a>  
            </li>
            <li>
              <a href="#">Contacts</a>  
            </li>
        </ul>
      </div></div>
      <div class="searchBg" id="searchBg">
        <div class="searchArea" id="searchArea">
          <div class="searchBlock">
            <img src="images/close.png" alt="" class="close" id="close" onclick="toggleSearch()">
            <input type="text" class="searchInput" placeholder="What are you looking for?">
            <input type="submit" value="SEND" class="searchSend">
          </div>
        </div> 
      </div>
    
      <div class="menuT"><div class="menuTitle">Home&ensp;>&ensp;Coffee</div></div>
      <section class="content">
        <div class="contentWrap">
          <div class="cardContent">
            <?php
            $stat = $connect -> query("SELECT * FROM products");
            while($row = $stat -> fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="card">
              <div class="proImage"><img src="<?= $row['image'] ?>" class="proinimage"></div>
              <div class="cardName">
                <h4><?= $row['product_name'] ?></h4>
                <h6>NT $ <?= $row['price'] ?></h6>
              </div>
              <!-- <input type="hidden" id="id" value="<?= $row['id'] ?>"> -->
              <input type="hidden" id="product_name" value="<?= $row['product_name'] ?>">
              <input type="hidden" id="price" value="<?= $row['price'] ?>">
              <input type="hidden" id="image" value="<?= $row['image'] ?>">
              <input type="hidden" id="code" value="<?= $row['code'] ?>">
              <button class="cardBtn" id="cardBtn">+ Add to cart</button>
            </div>
            <?php } ?>
          </div>
        </div>
    </section>

    <section class="bottom">
      <div class="bottomWrap">
        <h5>flora</h5>
        <div class="bottomInfo">
          <div>
            <h6>shop</h6>
            <p><a href="#">Gourmet</a></p>
            <p><a href="#">Gift Collection</a></p>
            <p><a href="#">Gift Card</a></p>
          </div>
          <div>
            <h6>account</h6>
            <p><a href="#">My account</a></p>
            <p><a href="#">My orders</a></p>
            <p><a href="#">Privacy policy</a></p>
          </div>
          <div>
            <h6>information</h6>
            <p><a href="#">News & Events</a></p>
            <p><a href="#">Contacts</a></p>
            <p><a href="#">Subscribe</a></p>
          </div>
          <div>
            <h6>open</h6>
            <p>MONDAY ~ SATURDAY :</p>
            <p>10AM ~ 9PM</p>
            <p>SUNDAY :</p>
            <p>11AM ~ 8PM</p>
            <div class="social">
              <span><a href="#"><i class="fa-brands fa-pinterest-p"></a></i></span>
              <span><a href="#"><i class="fa-brands fa-instagram"></a></i></span>
              <span><a href="#"><i class="fa-brands fa-facebook"></a></i></span>
            </div>
          </div>
        </div>
        <div class="credit">
          <span><i class="fa-brands fa-cc-visa"></i></span>
          <span><i class="fa-brands fa-cc-mastercard"></i></span>
          <span><i class="fa-brands fa-cc-paypal"></i></span>
          <span><i class="fa-brands fa-cc-jcb"></i></span>
          <span><i class="fa-brands fa-cc-amex"></i></span>
        </div>
        <div class="copyright">© 2022 F.L.O.R.A. All Rights Reserved</div>
      </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/axios.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.js"></script>
    <script>
      window.addEventListener('scroll', function(){
        var header = document.querySelector('.navbar');
        header.classList.toggle('sticky', window.scrollY > 30);
      })
      $(document).ready(function(){
				$('.menuLink').hover(function(){
					$('.dropMenu').toggleClass('visible');
				})
				$('.dropMenu').hover(function(){
					$('.dropMenu').toggleClass('visible');
				});
			})
      let links = document.querySelectorAll('.clickG');
      let linkImg = document.querySelectorAll('.Gimg');
      links.forEach((link) => {
        link.addEventListener('mousemove', (e) => {
          link.children[1].style.opacity = 1;
        })
        link.addEventListener('mouseleave', (e) =>{
          link.children[1].style.opacity = 0;
        })
      })
      document.addEventListener('click', e =>{
        const dropdownBtn = e.target.matches("[data-dropdown-button]")
        if(!dropdownBtn && e.target.closest("[data-dropdown]") != null) return
        let currentdropdown
        if(dropdownBtn){
          currentdropdown = e.target.closest('[data-dropdown]')
          currentdropdown.classList.toggle('active')
        }
        document.querySelectorAll("[data-dropdown].acive").forEach(dropdown =>{
          if(dropdown == currentdropdown)return
          dropdown.classList.remove('active')
        })
      })
      let slideIndex = 0;
      showSlides();
      function showSlides(){
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for(i = 0; i < slides.length; i++){
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if(slideIndex > slides.length){
          slideIndex = 1
        }    
        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 5000);
      }
      $(document).ready(function(){
        var a = document.getElementById("regionShow").innerText;
        if(a === ''){
          var country = 'Taiwan';
          document.getElementById("regionShow").innerHTML = "<img data-dropdown-button src='images/" + country +  ".png' width='20' height='20'>" + '&emsp;' + country + '&ensp;' + "<i data-dropdown-button class='fa-solid fa-angle-down' style=font-size:13px;padding-top:2px>&and;</i>";
        }
      })
      $(document).on('click', '.regionBtn', function(){
          var country = $(this).find('#country').val($(this).text())[0].innerText;
          var dollar = $(this).find('#dollar').val($(this).text())[0].innerText;
          var el_down = document.getElementById("regionShow");
          el_down.innerHTML = "<img data-dropdown-button src='images/" + country +  ".png' width = '20' height = '20'>" + '&emsp;' + country + '&ensp;' + "<i data-dropdown-button class='fa-solid fa-angle-down' style=font-size:13px;padding-top:2px></i>";
          var a = document.getElementById("regionShow").innerText;
          if(a !== ''){
            var newUrl = '#.php'
            window.location.replace(newUrl);
          }
      })
      function toggleSearch(){
        var menuBox = document.getElementById('searchArea');
        var searchBg = document.getElementById('searchBg');
        if(menuBox.style.display == "block"){
          menuBox.style.display = "none";
          searchBg.style.display = 'none';
          $('html').css("overflow","auto");
        }else{
          menuBox.style.display = "block";
          searchBg.style.display = "block";
          $('html').css("overflow","hidden");
        }
      }
      $(document).on('click', '#cardBtn', function(e){
        e.preventDefault();
        var $form = $(this).closest('.card');
        // var id = $form.find('#id').val();
        var product_name = $form.find('#product_name').val();
        var price = $form.find('#price').val();
        var image = $form.find('#image').val();
        var code = $form.find('#code').val();
        var formData 	= new FormData();
						formData.append('product_name', product_name);
						formData.append('price', price);
						formData.append('image', image);
            formData.append('code', code);
        axios.post('cartaction.php?action=cartItem', formData).then(function(response){
          // window.scrollTo(0, 0);
          cart_item_number();
        })
        cart_item_number();
        function cart_item_number(){
          var formData 	= new FormData();
            axios.get('cartaction.php?action=cartShow').then(function(response){
              $('#cartItem').html(response.data[0]);
            })
        }
      })
      $(document).ready(function(){
        var cart_sum = document.getElementById('cartItem').val;
				axios.get('cartaction.php?action=cartShow').then(function(response){
            $('#cartItem').html(response.data[0]);
        })
			})
    </script>
  </body>
</html>