<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORA</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/en-tw.css">
    <link rel="stylesheet" href="css/en-twnavbar.css">
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
      <!-- <div class="shadow"></div> -->
      <div class="navbg"><img src="images/restaurant.jpg"></div>
      <div class="regionArea">
        <div class="dropdown" data-dropdown>
          <button class="region" data-dropdown-button id="regionShow"></button>
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
        <div class="logo">Flora</div>
        <div class="infoIcon">
          <div class="icon">
            <div id="search" onclick="toggleSearch()">
              <img src="images/wsearch.png" alt="" class="search">
              <img src="images/search.png" alt="" class="searchNav">
              <div class="textSearch">Search</div>
            </div>
            <a href="account.php">
              <div id="user">
                <img src="images/wperson.png" alt="" class="user">
                <img src="images/person.png" alt="" class="userNav">
                <div class="textUser">Account</div>
              </div>
            </a>
            <div id="like">
              <img src="images/wheart.png" alt="" class="like">
              <img src="images/heart.png" alt="" class="likeNav">
              <div class="textLike">Wishlist</div>
            </div>
            <a href="cart.php" class="cart">
              <div id="bag">
                <img src="images/wshopping-bag.png" alt="" class="bag">
                <img src="images/shopping-bag.png" alt="" class="bagNav">
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
                      <a href="coffee.php" class="clickG">
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
      </div>
    </div>
      <div class="searchBg" id="searchBg">
        <div class="searchArea" id="searchArea">
          <div class="searchBlock">
            <img src="images/close.png" alt="" class="close" id="close" onclick="toggleSearch()">
            <input type="text" class="searchInput" placeholder="What are you looking for?">
            <input type="submit" value="SEND" class="searchSend">
          </div>
        </div> 
      </div>
    

    <div class="logoBg">
      <div class="logoText">
        <div>F L O R A</div>
      </div>
      <div class="logoImg">
        <div class="deepText"><div class="autoText">F L O R A</div></div>
        <img src="images/teabgdeep.jpg" alt="">
      </div>
    </div>

    <section class="season">
      <div class="seasonWrap">
        <div class="seasonLeft">
          <h6>This the season</h6>
          <h3>Taste the FLORA!</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas aspernatur corporis quia delectus obcaecati sit aut saepe ad quo aperiam esse atque, tempore totam expedita, ducimus perferendis ullam quis enim.</p>
        </div>
        <div class="seasonRight">
          <img src="images/season.jpg" alt="">
        </div>
      </div>
    </section>

    <section class="second">
      <div class="secondWrap">
        <div class="rightArea">
          <div class="rightImg">
            <h3>' top selling '</h3>
            <img src="images/bestsale.jpg" alt="">
          </div>
          <div class="flowerBg"></div>
        </div>
        <div class="leftArea">
          <h4>the best tea house</h4>
          <h3>the teahouse since 1995</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi aliquam porro quam eius fugiat officiis accusantium ad dolorem atque. Delectus iste pariatur praesentium omnis odio obcaecati amet commodi, soluta tempora.</p>
          <a class="link" href="#">MORE INFORMATION</a>
        </div>
      </div>
      <div class="secondscroll">
        <ul>
          <li>
            <article class="secondscrollImg">
              <div><img src="images/secondcoffee.jpg" alt=""></div>
              <h5>Arabica coffee</h5>
              <h6>South America</h6>
              <p>NT 1,000</p>
            </article>
          </li>
          <li>
            <article class="secondscrollImg">
              <div><img src="images/secondtea.jpg" alt=""></div>
              <h5>Rose tea</h5>
              <h6>France</h6>
              <p>NT 850</p>
            </article>
          </li>
          <li>
            <article class="secondscrollImg">
              <div><img src="images/secondcoffee.jpg" alt=""></div>
              <h5>Robusta coffee</h5>
              <h6>Indonesia</h6>
              <p>NT 800</p>
            </article>
          </li>
        </ul>
      </div>
    </section>

    <section class="moment">
      <div class="momentWrap">
        <div class="momentText">
          <h4>YOUR SPECIAL MOMENTS</h4>
          <h3>the flora at taipei</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus nobis soluta nemo optio minus architecto maiores doloribus amet similique laudantium unde minima fugiat quis, sapiente illo quod, voluptas, ut natus.</p>
        </div>
        <div class="momentImg"><img src="images/moment.jpg" alt=""></div>
      </div>
    </section>

    <section class="location">
      <div class="locationWrap">
        <div class="locationLeft">
          <div class="locaLeftTable">
            <p>WEATHER</p>
            <div class="temp"><span id="tempValue"></span><span id="temp-unit">&#176c</span></div>
            <div class="tempmain"><span id="tempmain"></span></div>
            <div class="address">
              <h5>address</h5>
              <p>10F., No. 420, Sec. 4, Xinyi Rd., Xinyi Dist., Taipei City</p>
            </div>
            <div class="open">
              <h5>OPENING HOURS</h5>
              <p></p>
              <p class="locaLeftP">Monday ~ Saturday : <br>10am ~ 9pm</p>
              <p>Sunday : <br>11am ~ 8pm</p>
            </div>
          </div>
          <div class="locationImg"><img src="images/location.jpg" alt=""></div>
        </div>
        <div class="locationRight">
          <div>
            <h3>Events</h3>
            <div>
              <div class="chrisImg"><img src="images/christmas.jpg" alt=""></div>
              <h5>Christmas</h5>
              <h6>Special Sale up to 30 % off</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. libero voluptates quos iste pariatur aperiam dolorem reprehenderit consequatur molestias illum asperiores ipsa. Laboriosam, quis!</p>
            </div>
          </div>
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
          document.getElementById("regionShow").innerHTML = "<img data-dropdown-button src='images/" + country +  ".png' width='20' height='20'>" + '&emsp;' + country + '&ensp;' + "<i data-dropdown-button class='fa-solid fa-angle-down' style=font-size:13px;padding-top:2px></i>";
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
      let loc = 'Taipei';
      let tempvalue = document.getElementById('tempValue');
      let tempmain = document.getElementById('tempmain');
      let iconfile;
      window.addEventListener('load', ()=>{
        let long;
        let lat;
        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition((position)=>{
            long = position.coords.longitude;
            lat = position.coords.latitude;
            // const proxy = 'https://cors-anywhere.herokuapp.com/';
            const api = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=fd48bdf8a8b87b3c140f17625f4e2d57`
            fetch(api).then((response)=>{
              return response.json();
            })
            .then(data =>{
              const {name} = data;
              const {feels_like} = data.main;
              const {id, main} = data.weather[0];
              loc.textContent = name;
              tempmain.textContent = data.weather[0].main;
              tempvalue.textContent = Math.round(feels_like-273);
              // console.log(data);
            })
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