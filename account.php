<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORA | Log In</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/en-tw.css">
    <link rel="stylesheet" href="css/login.css">
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

    <section class="content">
        <span class="accountDeep"></span>
        <div class="backGround"><img src="images/location.jpg" alt=""></div>
        <div class="contentWrap">
            <div class="accountRegion">
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
            <a href="en-tw.php"><div class="accountLogo">Flora</div></a>
            <div class="accountItm">
                <div class="accountItmWrap">
                    <a href="en-tw.php">
                      <div id="close">
                          <img src="images/wclose.png" alt="" class="accountClose">
                          <div class="ACNTtextClose">Close</div>
                      </div>
                    </a>
                    <div id="like">
                        <img src="images/wheart.png" alt="" class="accountlike">
                        <div class="ACNTtextLike">Wishlist</div>
                    </div>
                    <a href="cart.php" class="cart">
                      <div id="bag">
                        <img src="images/wshopping-bag.png" alt="" class="bag">
                        <div class="textBag">Cart</div>
                      </div>
                      <span class="cartNum" id="cartItem"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="login">
        <div class="loginWrap">
            <div class="logContentBlock" id="vueLogin">
                <div class="loginFrom signIn">
                    <h2>Welcome back !</h2>
                    <!-- <div class="error" v-if="errorMessage">
                      <span class="errormessage">{{ errorMessage }}</span>
                    </div> -->
                      <div class="loginInput">
                        <label>Username or Email</label>
                        <input type="text" class="loginInput" v-model="login.email" v-on:keyup="keymonitor">
                      </div>

                      <div class="error" v-if="errorEmailMessage">
                        <span class="errormessage">{{ errorEmailMessage }}</span>
                      </div>
                      <div class="success" v-if="successEmailMessage">
                        <span class="successmessage">{{ successEmailMessage }}</span> 
                      </div>

                      <div class="loginInput">
                        <label>Password</label>
                        <input type="password" class="loginInput" v-model="login.password" v-on:keyup="keymonitor">
                      </div>

                      <div class="error" v-if="errorPassMessage">
                        <span class="errormessage">{{ errorPassMessage }}</span>
                      </div>
                      <div class="success" v-if="successPassMessage">
                        <span class="successmessage">{{ successPassMessage }}</span> 
                      </div>

                      <div class="forgot">
                          <span>
                            <input type="checkbox">
                            <label>Remember me</label>
                          </span>
                          <a href="#" class="forgotPass">Forgot password ?</a>
                      </div>
                    <button type="submit" class="submit" @click="checkLogin()">Log In</button>
                </div>
                <div class="subContent">
                    <div class="loginImg">
                        <div class="loginImgText moveUp">Do not have an account ?</div>
                        <div class="loginImgText moveIn register">Register</div>
                        <div class="loginImgBtn">
                            <span class="moveUp" name="register" id="register">Register</span>
                            <span class="moveIn">Log In</span>
                        </div>
                    </div>
                    <div class="loginFrom signUp" id="registerForm">
                      <div class="loginInput">
                        <label>Name</label>
                        <input type="text" class="loginInput" id="rname" v-model="register.name" v-on:keyup="keyregister">
                      </div>
                      <div class="loginInput">
                        <label>Username</label>
                        <input type="text" class="loginInput" id="rusername" v-model="register.username" v-on:keyup="keyregister">
                      </div>
                      <div class="loginInput">
                        <label>Email</label>
                        <input type="email" class="loginInput" id="remail" v-model="register.email" v-on:keyup="keyregister">
                      </div>
                      <div class="loginInput">
                        <label>Password</label>
                        <input type="password" class="loginInput" id="rpassword" v-model="register.password" v-on:keyup="keyregister">
                      </div>
                      <div class="loginInput">
                        <label>Confirm Password</label>
                        <input type="password" class="loginInput" id="rcpassword" v-model="register.cpassword" v-on:keyup="keyregister">
                      </div>
                      <div class="error" v-if="errorPass">
                        <span class="errormessage">{{ errorPass }}</span>
                      </div>

                      <div class="agree">
                        <input type="checkbox" id="agree" value="1" onclick="this.value=1-this.value">
                        <span>I agree the <a href="#">Privacy Policy</a></span>
                      </div>
                      <button type="button" class="submitRegister" @click="checkregister()">Register</button>
                      <div class="error" v-if="errorPM">
                        <span class="errorPM">{{ errorPM }}</span>
                      </div>
                      <div class="success" v-if="successPM">
                        <span class="successPM">{{ successPM }}</span> 
                      </div>
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

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/vue.js"></script>
    <!-- <script type="text/javascript" src="js/axios.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.0/axios.js"></script>

    <script>
      var app = new Vue({
        el: '#vueLogin',
        data:{
          successEmailMessage: '',
          errorEmailMessage: '',
          errorPassMessage: '',
          successPassMessage: '',
          login: {email: '', password: ''},
          register:{name:'', username:'', email:'', password:'', cpassword:''},
          errorPass: '',
          successPM:'',
          errorPM:''
        },
        methods:{
          keymonitor: function(event){
            if(event.key == "Enter"){
              app.checkLogin();
            }
          },
          keyregister:function(event){
            if(event.key == "Enter"){
              app.checkregister();
            }
          },
          checkLogin:function(){
              var login = app.toFormData(app.login);
              axios.post('login.php?action=login', login).then(function(res){
                if(res.data.error){
                  // this.email = res.data.email
                  app.errorEmailMessage = res.data.email;
                  app.errorPassMessage = res.data.password;
                }
                else{
                  app.errorEmailMessage = res.data.email;
                  app.errorPassMessage = res.data.password;
                  app.successEmailMessage = 'Login Success';
                  app.successPassMessage = 'Login Success';
                    // app.login = {email: '', password:''};
                  setTimeout(function(){
                      window.location.href="en-tw.php";
                  },300);
                }
              });
          },
          checkregister:function(){
            var agree = document.getElementById('agree').value;
            var rname = document.getElementById('rname').value
            var rusername = document.getElementById('rusername').value
            var remail = document.getElementById('remail').value
            var rpassword = document.getElementById('rpassword').value
            var rcpassword = document.getElementById('rcpassword').value
            if(rname !== '' && rusername !== '' && remail !== '' && rpassword !=='' && rcpassword !== ''){
              if(agree == '0'){
                console.log(app.register)
                var register = app.toFormData(app.register);
                axios.post('login.php?action=register', register).then(function(res){
                  if(res.data.error){
                    app.errorPass = res.data.message;
                  }
                  else{
                    if(res.data.success){
                      app.successPM = res.data.message;
                      setTimeout(function(){
                        app.successPM = '';
                      },1500);
                    }else{
                      app.errorPM = res.data.message;
                      setTimeout(function(){
                        app.errorPM = '';
                      },1500);
                    }
                  }
                });
              }
              else{
                app.errorPM = 'Please agree the Privacy Policy';
                setTimeout(function(){
                  app.errorPM = '';
                },1500);
              }
          }
          else{
            app.errorPM = 'Please fill all fields';
            setTimeout(function(){
              app.errorPM = '';
            },1500);
          }
          },
          toFormData: function(obj){
            var form_data = new FormData();
            for(var key in obj){
                form_data.append(key, obj[key]);
            }
            return form_data;
          },
          // clearMessage: function(){
          //     app.errorEmailMessage = '';
          //     app.successEmailMessage = '';
          // }
        }
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
      document.querySelector('.loginImgBtn').addEventListener('click', function() {
        document.querySelector('.logContentBlock').classList.toggle('s-signup');
      });
      $(document).ready(function(){
        var cart_sum = document.getElementById('cartItem').val;
				axios.get('cartaction.php?action=cartShow').then(function(response){
            $('#cartItem').html(response.data[0]);
        })
			})
    </script>
  </body>
  </html>