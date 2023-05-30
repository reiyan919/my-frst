<!DOCTYPE html>
<html>
<head>
<title> Inscription </title>
<meta charset="utf-8">
<meta http-equiv="X-Comptible" content="IE=edge">
<meta  content="width=device-width,initial-scale=2">

</head>
<style>
   * {
       margin: 0;
       padding: 0;
       box-sizing: border-box;
       font-family: 'Poppins', sans-serif;
       
      }
      body{
       display: flex;
       justify-content: center;
       align-items: center;
       min-height: 100vh;
       background: url("file:///C:/Users/Cherifi/Pictures/TaeAugust11-1024x673.jpg" ) no-repeat ;
       background-size: cover;
       background-size: 1500px;
       background-position: center;
           }
      header{
       position: fixed;
       top: 0;
       left: 0;
       width: 100%;
       padding: 20px 100px;
       display: flex;
       justify-content: space-between;
       align-items: center;
       z-index: 99;
          }
   .logo {
           font-size: 2em;
           color: black;
           user-select: none;
   }
   .navigation a {
       position: relative;
       font-size: 1.1em;
       color: black;
       text-decoration: none;
       font-weight: 500;
       margin-left: 40px;
       }
       .navigation a::after{
           content: '';
           position: absolute;
           left: 0;
           bottom: -6px;
           width: 100%;
           height: 3px;
           background: black;
           border-radius: 5px;
           transform-origin: right;
           transform: scaleX(0);
           transition: transform .5s;
           }
           .navigation a:hover:after {
               transform-origin: left;
               transform: scaleX(1);
           
           }
           .wrapper {
               position: relative;
               width: 500px;
               height: 450px;
               background: transparent;
               border: 2px solid rgba(255, 255 , 255 , .5);
               border-radius: 30px;
               backdrop-filter: blur(20px);
               box-shadow: 0 0 30px rgba(0 , 0 , 0 , 1.0);
               
               justify-content: center;
               align-items: center;
             
              
           }
           .wrapper .from-box {
               width: 100%;
               padding: 20px;
           
           }
           .from-box h2{
               font-size: 2.5em;
               color: #000000;
               text-align: center;
           }
           .input-box {
               position: relative;
               width: 100%;
               height: 25px;
               border-bottom: 2px solid #162938;
               margin: 30px 0;
           }
           .input-box label {
               position: absolute;
               top: 50%;
               left: 10px;
               transform: translateY(-50%);
               font-size: 1.2em;
               color: #000000;
               font-weight: 600;
               pointer-events: none;
               transition: .5s;
               }
   
               .input-box input:focus~label,
   .input-box input:valid~label{
       top: 5px;
   }

   .input-box input {
     width: 100%;
     height: 100%;
    background: transparent;
    border: none;
    outline: none; 
    font-size: 1.2em;
   color: black;
   font-weight: 700;
   padding: 0 30px 0 180px;
   }

   .input-box .icon {
   position: absolute;
   right: 2px;
   font-size: 1.4em;
   color: #06413c;
   line-height: 20px;
   }
   .remember-forgot{
    font-size: .9em;
    color: #162938;
    font-weight:500;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;

   }
   .remember-forgot label input{
    accent-color: #162938;
    margin-right: 3px;
   }
   .remember-forgot a{
    accent-color: #162938;
    text-decoration: none;
   }
   .remember-forgot a:hover{
    text-decoration: underline;
   }
   .radio-button {
       margin: 20px;
   margin-right: 5px;
   }
   .btn {
       width: 100%;
       height: 35px;
       background:#047ccc;
       border: none;
       outline: none;
       border-radius: 10px;
       cursor: pointer;
       font-size: 1em;
       color: #fff;
       font-weight: 400;
   }
   .login-register{
    font-size: .9em;
    color: #162938;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;

   }
  
   .login-register p {
    color: #162938;
    text-decoration: none;
    font-weight: 600;
    
   }
   .login-register p a:hover{
    text-decoration: underline;
   }
   
 #error{
    color: red;
    background-color: 4px;
 }
 
   </style>
<body>
 
   
<div class="wrapper"> 
<div class="form-box">
<div class="from-box register">
<h2> Inscription </h2>
<form  action="incsp.php" method="POST" >

<div class="input-box">

<span class="icon"><ion-icon name="person"></ion-icon></span>
 
<input type="text" name="username" id="username" autocapitalize="off" required>  
<label style="font-size: 0.8vw;"> Nom d’utilisateur </label>
<?php if(isset($user_error)){
echo $user_error;
}  ?> 
</div>
<div class="input-box">
<span class="icon"><ion-icon name="mail"></ion-icon></span>
<input type="text" name="email" id="email" placeholder="exemple@example.com" required>
<label style="font-size: 0.8vw;">Email </label>
<?php if(isset($email_error)){
 echo $email_error;
}  ?>
</div>
<div class="input-box">
<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
<input type="password" name="password" id="password" required>
<label style="font-size: 0.8vw;"> mot de passe </label>
<?php if(isset($password_error)){
echo $password_error;
}  ?>
</div>
<h7 style="font-size: 0.8vw;">Anniversaire:</h7>
<?php if(isset($birthday_error)){
 echo $birthday_error;
}  ?>
<select aria-label="day" name="birthday_day" id="day"><option disabled selected>day</option> <option value="1">1</option>,<option value="2"> 2</option>, <option value="3">3</option>, <option value="4">4</option>,<option value="5"> 5</option>, <option value="6">6</option>,<option value="7"> 7</option>, <option value="8">8</option>, <option value="9">9</option>, <option value="10">10</option>, <option value="11">11</option>,<option value="12"> 12</option>,<option value="13">13</option>,<option value="14"> 14</option>, <option value="15">15</option>, <option value="16">16</option>,<option value="17"> 17</option>, <option value="18">18</option>,<option value="19"> 19</option>, <option value="20">20</option>, <option value="21">21</option>, <option value="22">22</option>, <option value="23">23</option>,<option value="24" > 24</option>,<option value="25">25</option>,<option value="26"> 26</option>, <option value="27">27</option>, <option value="28">28</option>,<option value="29"> 29</option>, <option value="30">30</option>,<option value="31" > 31</option> </select> 
<select aria-label="month" name="birthday_month" id="month"><option disabled selected>month</option><option value="1">janvier</option>,<option value="2"> février</option>, <option value="3">mars</option>, <option value="4">avril</option>,<option value="5"> mai</option>, <option value="6">juin</option>,<option value="7"> juillet</option>, <option value="8">août</option>, <option value="9">septembre</option>, <option value="10">octobre</option>, <option value="11">novembre</option>,<option value="12" > décembre</option></select>  
<select aria-label="Année" name="birthday_year" id="year" title="Année" class="_9407 _5dba _9hk6 _8esg"><option disabled selected>year</option><option value="2023" >2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905" >1905</option></select>

<div class="input-name" >  
		<label for="country" class="control-label" style="font-size: 0.8vw;">Incsrir dans</label>							
		<select class="form-control" id="status" name="status">
		<option value="">Select</option>							
		<option value="Enable">Bibliothaque</option>
		<option value="Disable">Atelier</option>								
		</select>							
							
</div>


<input type="submit" name="submit" id="submit" value="Registre"class="btn"><br>
</form>

<div class="login-register">
<p> Vous avez déjà un compte ?
<a id='login' href="connexion.php" >Connectez-vous</a>
</p>
</div>
</div>
</div>      
</div>
<script src="scripte.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
</body>
</html>
                