
  <!-- register modal -->

  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" dir="rtl">
   
   <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content rounded-4" style="max-height: 100vh;">
         
           <div class="modal-body p-4">
               <div class="container">
                   <div class="row justify-content-center align-items-center">
                       <!-- Box body -->
                       <div class="col-12 col-md-12 col-lg-12 row bg-white p-0 rounded-4 shadow-lg justify-content-center flex-lg-row">
                           <!-- Right box -->
                           <div class="col-12 col-lg-5 bg-blue-400 rounded-end w-lgReverse-75 rounded-end-4 rounded-lg-end-4 d-flex flex-column align-items-center justify-content-center">
                               <!-- Logo -->
                               <img src="public/images/logo.png" alt="logo" class="img-fluid w-75">
                               <!-- Text box -->
                               <p class="text-center text-white fs-7 mt-3 d-none d-lg-block ff-dana-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                               <a href="#" class="btn bg-white d-none d-lg-block rounded-1 text-blue-400 fs-7 py-2 px-4 ff-dana-regular">ادامه را بخوانید</a>
                               <!-- Socialmedia links -->
                               <div class="socialmedia-box d-none d-lg-flex justify-content-center gap-3 mt-4">
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-facebook"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-twitter-x"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-google"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-linkedin"></i></a>
                               </div>
                           </div>
                           <!-- Left box -->
                           <div class="col-12 col-lg-7 p-4 mt-3 mb-3">
                               <!-- Title -->
                               <h3 class="h4 text-center mb-5 ff-dana-bold"><span class="text-blue-400">حساب خود را</span> بسازید</h3>
                             
                             
                               <!-- Form & Inputs -->
                                <div class="result"></div>
                               
                               <form class="px-4 mx-auto" id="rejister">
                                   <!-- Input box: Firest name -->
                                   <div class="mb-3">
                                     <input type="txet" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="نام" name="name" id="name">
                                   </div>
                                   <!-- Input box: Last name -->
                                   <div class="mb-3">
                                     <input type="txet" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="نام خانوادگی" name="lname" id="lname">
                                   </div>
                                    <!-- Input box: username  -->
                                    <div class="mb-3">
                                     <input type="text" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder=" نام کاربری " id="username" name="username">
                                     <span id="registerPasswordRepeatInputError" class="text-danger d-flex align-items-center gap-1 mt-1 d-none"><i class="bi bi-exclamation-circle d-flex align-items-center"></i> رمز تکرار شده درست نیست</span>
                                   </div> 
                                   <!-- Input box: Select gender -->
                                   <div class="mb-3">
                                       <select class="form-select rounded-1 shadow-sm p-2 pe-4_5 ff-dana-medium" name="gender" id="gender">
                                           <option selected disabled hidden class="px-3">جنسیت خود را وارد کنید</option>
                                           <option value="1">مرد</option>
                                           <option value="2">زن</option>
                                       </select>
                                   </div>
                                   <!-- Input box: Phone number -->
                                   <div class="mb-3">
                                     <input type="txet" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="شماره تلفن" id="phone"  name="phone">
                                   </div>
                                   <!-- Input box: Password -->
                                   <div class="mb-3">
                                     <input type="password" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="رمز عبور" id="password" name="password">
                                   </div>
                                  
                                   <!-- Submit button -->
                                   <button type="submit" class="btn bg-blue-400 text-white fs-7 rounded-1 w-100 p-2 ff-dana-medium">ثبت نام</button>
                               </form>
                              
                              
                               <!-- Login link -->
                               <p class="text-center mt-2 ff-dana-medium">حساب کاربری دارید؟ <a href="login.html" class="link-opacity-75-hover link-underline link-underline-opacity-0 link-underline-dark link-underline-opacity-50-hover text-black fs-7">از اینجا وارد شوید</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
         </div>
       </div>
   
   
     </div>
   
       <!-- login modal -->
   
     <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" dir="rtl">
       <div class="modal-dialog modal-lg modal-dialog-centered">
           <div class="modal-content rounded-4" style="max-height: 100vh;">
         
           <div class="modal-body p-4">
               <div class="container">
                   <div class="row justify-content-center align-items-center">
                       <!-- Box body -->
                       <div class="col-12 col-md-12 col-lg-12 row bg-white p-0 rounded-4 shadow-lg justify-content-center flex-lg-row">
                           <!-- Right box -->
                           <div class="col-12 col-lg-5 bg-blue-400 rounded-end w-lgReverse-75 rounded-end-4 rounded-lg-end-4 d-flex flex-column align-items-center justify-content-center">
                               <!-- Logo -->
                               <img src="public/images/logo.png" alt="logo" class="img-fluid w-75">
                               <!-- Text box -->
                               <p class="text-center text-white fs-7 mt-3 d-none d-lg-block ff-dana-bold">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                               <a href="#" class="btn bg-white d-none d-lg-block rounded-1 text-blue-400 fs-7 py-2 px-4 ff-dana-medium">ادامه را بخوانید</a>
                               <!-- Socialmedia links -->
                               <div class="socialmedia-box d-none d-lg-flex justify-content-center gap-3 mt-4">
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-facebook"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-twitter-x"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-google"></i></a>
                                   <a href="#" class="text-white d-flex justify-content-center align-items-center rounded-1 bg-blue"><i class="bi bi-linkedin"></i></a>
                               </div>
                           </div>
                           <!-- Left box -->
                           <div class="col-12 col-lg-7 p-4 mb-5 mt-4">
                               <!-- Title -->
                               <h3 class="h4 text-center mb-5 ff-dana-bold"><span class="text-blue-400">به حساب خود</span> وارد شوید</h3>
                               <!-- Form & Inputs -->
                                <div class="response"></div>
                               <form class="px-4 mx-auto" id="login">
                                   <!-- Input box: Phone number -->
                                   <div class="mb-3">
                                     <input type="txet" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="نام کاربری" id="lusername" name="lusername">
                                   </div>
                                   <!-- Input box: Password -->
                                   <div class="mb-3">
                                     <input type="password" class="form-control rounded-1 shadow-sm p-2 ff-dana-medium" placeholder="رمز عبور" name="lpassword" id="lpassword">
                                   </div>
                                   <!-- Options -->
                                   <div class="mb-3 d-flex align-items-center justify-content-between">
                                       <a href="#" class="link-opacity-75-hover link-underline link-underline-opacity-0 link-underline-dark link-underline-opacity-50-hover text-black fs-7 ff-dana-regular">فراموشی رمز عبور</a>
                                       <div class="form-check d-flex flex-row-reverse align-items-center">
                                         <input type="checkbox" id="loginCheckboxRemember" name="loginCheckboxRemember" class="form-check-input shadow-none me-1">
                                         <label class="form-check-label fs-7 ff-dana-regular" for="loginCheckboxRemember">مرا به خاطر بسپار</label>
                                       </div>
                                   </div>
                                   <!-- Submit button -->
                                   <button type="submit" class="btn bg-blue-400 text-white fs-7 rounded-1 w-100 p-2 ff-dana-medium" >ورود</button>
                               </form>
                               <!-- Register link -->
                               <p class="text-center mt-2 ff-dana-medium">حساب کاربری ندارید؟ <a href="login.html" class="link-opacity-75-hover link-underline link-underline-opacity-0 link-underline-dark link-underline-opacity-50-hover text-black fs-7">از اینجا ثبت نام کنید</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
         </div>
       </div>
     </div>





     <script>
$(document).ready(function () {
  $("#rejister").submit(function (e) { 
    e.preventDefault();
   let name = $("#name").val();
   let lname = $("#lname").val();
   let username = $("#username").val();
   let gender = $("#gender").val();
   let phone = $("#phone").val();
   let password = $("#password").val();

   $.ajax({
    method: "post",
    url: "./query/rejister.php",
    data : {
      name : name ,
      lname : lname ,
      username : username ,
      gender : gender ,
      phone : phone ,   
      password : password
    },
    
    success: function (response) {
      $(".result").html(response);
    

       
      
    },
    error : function (){
      console.log("no");
      
    }
   });
   
  });
});

$("#login").submit(function (e) { 
    e.preventDefault();
   let lusername = $("#lusername").val();
   let lpassword = $("#lpassword").val();

   $.ajax({
    method: "post",
    url: "./query/login.php",
    data : {
      lusername : lusername ,  
      lpassword : lpassword
    },
    
    success: function (response) {
      $(".response").html(response);
    

       
      
    },
    error : function (){
      console.log("no");
      
    }
   });
   
  });

    </script>




