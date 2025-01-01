function changeSigninViwe(){

 

    var signupbox = document.getElementById("signupbox"); 
    var signinbox = document.getElementById("signinbox");

    signupbox.classList.toggle("d-none");
    signinbox.classList.toggle("d-none");



}

function signup(){
   var fname = document.getElementById("f");
   var lname = document.getElementById("l");
   var email = document.getElementById("e");
   var password = document.getElementById("p");
   var mobile = document.getElementById("m");
   var gender = document.getElementById("g");

    var f = new FormData();
    f.append("f",fname.value);
    f.append("l",lname.value);
    f.append("e",email.value);
    f.append("p",password.value);
    f.append("m",mobile.value);
    f.append("g",gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == " Success"){
                document.getElementById("msg").innerHTML = t;
                document.getElementById("alertdiv").className = "alert alert-dark fw-bold";
                document.getElementById("msgdiv").className = "d-block";
                document.getElementById("msg").className = "bi bi-check-circle-fill";


            }else{
                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";

            }
           
        }
    }

    r.open("POST","signupProcess.php",true);
    r.send(f);






}



function signIn(){

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e",email.value);
    f.append("p",password.value);
    f.append("r",rememberme.checked);

    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location = "home.php";
              
              }else{
                document.getElementById("msg2").innerHTML = t;
          
              }
        }
    }

    r.open("POST","signinProcess.php",true);
    r.send(f);


}


//FOROGOT passwprd.......

var fpb;
function forogotPasssword(){

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t  = r.responseText;
            if(t == "success"){
                alert("Verification code has sent to Your Email.Please check your Emails");
                var modal = document.getElementById("forgotpasswordodal");
                fpb = new bootstrap.Modal(modal);
                fpb.show();
            }else{
                alert(t);
            }
        }
    }

    r.open("GET","forogotPasswordProcess.php?email=" +email.value,true);
    r.send();



    

}



function showPassword(){
    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");
  
  
    if(i.type == "password"){
      i.type = "text";
      eye.className = "bi bi-eye-fill";
    }else{
      i.type = "password";
      eye.className = "bi bi-eye-slash";
  
    }
  
  }
  
  
  function showPassword2(){
    var i = document.getElementById("rpi");
    var eye = document.getElementById("e2");
  
  
    if(i.type == "password"){
      i.type = "text";
      eye.className = "bi bi-eye-fill";
    }else{
      i.type = "password";
      eye.className = "bi bi-eye-slash";
  
    }
  
  }



  function resetpassword(){
    var email = document.getElementById("email2");
    var newpw = document.getElementById("npi");
    var repw = document.getElementById("rpi");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("email",email.value);
    f.append("newpw",newpw.value);
    f.append("repw",repw.value);
    f.append("vcode",vcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Success"){
                fpb.hide();
                alert("Your Password Reset Success");
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","resetPasswordProcess.php",true);
    r.send(f);


  }


//FOROGOT passwprd.......







//heder signup......

function goToSignup(){
    window.location = "index.php";

    var signupbox = document.getElementById("signupbox"); 
    signupbox.classList.toggle("d-none");

}


//heder signIn......

function goToSignIn(){
    window.location = "index.php";

    var signinbox = document.getElementById("signinbox");
    signinbox.classList.toggle("d-block");

}



function signout(){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
     if(r.readyState == 4){
      var t = r.responseText;
       if(t == "seccess"){
   
           window.location = "home.php";           
       }else{
         alert(t);
   
       }
   
     }
    };

    r.open("GET","signoutProcess.php",true);
    r.send()
}


function sellerSignout(){

    window.location = "home.php";
    
}






function homeview(){
    window.location = "home.php";
}

function watchlistView(){
    window.location = "watchlist.php";
}




function chamgeImage(){
 
  var img = document.getElementById("viewImg");
  var file = document.getElementById("profileimg");

  file.onchange = function(){
   var file1 = this.files[0];
   var url = window.URL.createObjectURL(file1);
   img.src = url;

  }

}




function updateProfile(){
   var fname = document.getElementById("fname");
   var lname = document.getElementById("lname");
   var mobile = document.getElementById("mobile");
   var line1 = document.getElementById("line1");
   var line2 = document.getElementById("line2");
   var province = document.getElementById("province");
   var district = document.getElementById("district");
   var city = document.getElementById("city");
   var pcode = document.getElementById("pcode");
   var img = document.getElementById("profileimg");


var f = new FormData();
f.append("f",fname.value);
f.append("l",lname.value);
f.append("m",mobile.value);
f.append("l1",line1.value);
f.append("l2",line2.value);
f.append("p",province.value);
f.append("d",district.value);
f.append("c",city.value);
f.append("pc",pcode.value);


if(img.files.length == 0){
  

    var confirmation = confirm("Are you sure You don't want to update Profile Image?");
  
    if(confirmation){
      alert("you have not selected any Image");
    }
  
   }else{
    f.append("img",img.files[0]);
   }



var r = new XMLHttpRequest();

r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
       
            alert(t);
       
    }
}


r.open("POST","updateprofileProcess.php",true);
r.send(f);

}


function closemodel(){
    window.location.reload();
}


// Add Product.................................................................


function changeImgUpload(){
    var image = document.getElementById("imageUploder");


  image.onchange = function(){
    var file_conut  = image.files.length;

   

    if(file_conut <= 3){
     

      for(x = 0; x < file_conut; x++){
        
         var file = this.files[x];
         var url = window.URL.createObjectURL(file);
         
         document.getElementById("p" + x).src = url;
        
        
        
        }
        alert("success");

    }else{
      alert("Please select 3 or less than  3 images");
    }
}

}



function otherdetails(){

    var cetegory  = document.getElementById("category");
   var brand  = document.getElementById("brand");
   var model  = document.getElementById("model");
   var title  = document.getElementById("title");
    var condition = 0;
    if(document.getElementById("b").checked){
        condition = 1;
    }else if(document.getElementById("u").checked){
        condition = 2;
    }
  
   var color  = document.getElementById("color");
   var cost  = document.getElementById("cost");
   var qty  = document.getElementById("qty");
   var withing_colombo  = document.getElementById("dwc");
   var out_of_colombo  = document.getElementById("doc");
   var discription  = document.getElementById("dc");
   var img  = document.getElementById("imageUploder");




   var f = new FormData();
   f.append("ca",cetegory.value);
   f.append("br",brand.value);
   f.append("mo",model.value);
   f.append("t",title.value);
   f.append("con",condition);
   f.append("clr",color.value);
   f.append("cos",cost.value);
   f.append("qty",qty.value);
   f.append("dwc",withing_colombo.value);
   f.append("doc",out_of_colombo.value);
   f.append("dis",discription.value);

   var file_conut = img.files.length;

   for(x = 0; x < file_conut; x++){
     f.append("image" + x, img.files[x]);
   }

  

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success1"){
            var dbox1 = document.getElementById("details1");
            var dbox2 = document.getElementById("details2");

            dbox1.classList.toggle("d-none");
            dbox2.classList.toggle("d-none");

        }else{
            alert(t);
        }
    }
   }

   r.open("POST","otherDetailsProcess.php",true);
   r.send(f);



    

}



function backdiv(){

    var dbox1 = document.getElementById("details1");
    var dbox2 = document.getElementById("details2");

    dbox2.classList.toggle("d-none");
    dbox1.classList.toggle("d-none");


}


function saveProduct(){
   var cetegory  = document.getElementById("category");
   var brand  = document.getElementById("brand"); 
   var model  = document.getElementById("model");
   var title  = document.getElementById("title");
    var condition = 0;
    if(document.getElementById("b").checked){
        condition = 1;
    }else if(document.getElementById("u").checked){
        condition = 2;
    }
  
   var color  = document.getElementById("color");
   var cost  = document.getElementById("cost");
   var qty  = document.getElementById("qty");
   var withing_colombo  = document.getElementById("dwc");
   var out_of_colombo  = document.getElementById("doc");
   var discription  = document.getElementById("dc");
   var img  = document.getElementById("imageUploder"); 




   var f = new FormData();
   f.append("ca",cetegory.value);
   f.append("br",brand.value);
   f.append("mo",model.value);
   f.append("t",title.value);
   f.append("con",condition);
   f.append("clr",color.value);
   f.append("cos",cost.value);
   f.append("qty",qty.value);
   f.append("dwc",withing_colombo.value);
   f.append("doc",out_of_colombo.value);
   f.append("dis",discription.value);

   var file_conut = img.files.length;

   for(x = 0; x < file_conut; x++){
     f.append("image" + x, img.files[x]);
   }

  

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        if(t == "Prodct saved"){
            window.location.reload();
            alert("Prodct save success");
        }else{
            alert(t);
        }
    }
   }

   r.open("POST","addProductProcess.php",true);
   r.send(f);



  




}
// Add Product.................................................................





// Update Product.................................................

function sendpid(id){

 var r = new XMLHttpRequest();

 r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success"){
            window.location = "updateProduct.php";
        }else{
        alert(t);
        }
    }
 }


 r.open("GET","sendProdctIdProcess.php?id=" + id,true);
 r.send();
}



function changeImage(){
    var image = document.getElementById("imageuploader");


  image.onchange = function(){
    var file_conut  = image.files.length;

   

    if(file_conut <= 3){
     

      for(x = 0; x < file_conut; x++){
        
         var file = this.files[x];
         var url = window.URL.createObjectURL(file);
         
         document.getElementById("img" + x).src = url;
        
        
        }

    }else{
      alert("Please select 3 or less than  3 images");
    }
  }
}



function updateOtherdetails() { 

    var title = document.getElementById("title");
    var img = document.getElementById("imageuploader");


    var f = new FormData();
    f.append("title",title.value);

    var image_count = img.files.length;

    for(var x = 0; x < image_count; x++){
  
      f.append("img" + x,img.files[x]);
  
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Success"){
                var dbox1 = document.getElementById("details1");
            var dbox2 = document.getElementById("details2");

            dbox1.classList.toggle("d-none");
            dbox2.classList.toggle("d-none");

            }else{
            alert(t); 
            }
        }
    }

    r.open("POST","updateOtherDetailsProcess.php",true);
    r.send(f);



}



 function updateProduct() { 

    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var deliveery_fee_col = document.getElementById("dwc"); 
    var deliveery_fee_other = document.getElementById("doc"); 
    var dis = document.getElementById("discription"); 
    var img = document.getElementById("imageuploader"); 





    var f = new FormData();
    f.append("title",title.value);
    f.append("qty",qty.value);
    f.append("dwc",deliveery_fee_col.value);
    f.append("doc",deliveery_fee_other.value);
    f.append("dis",dis.value);



    var image_count = img.files.length;

    for(var x = 0; x < image_count; x++){
  
      f.append("img" + x,img.files[x]);
  
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location = "myProduct.php";
                alert("prodct has been updeted"); 
            }else{
             alert(t); 
            }
        }
    }

    r.open("POST","updateProductProcess.php",true);
    r.send(f);



 }


// Update Product.................................................








function addtoCart(id){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET","addtoCartProcess.php?id="+id,true);
    r.send();

}




function removefromCart(id){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
            alert(t);
        }
    }

    r.open("GET","removefromCartProcess.php?id="+id,true);
    r.send();

}




function addtoWatchlist(id){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "removed"){
                document.getElementById("watchlistHeart"+id).style.className = " text-dark";
                window.location.reload();
            }else if(t == "added"){
                document.getElementById("watchlistHeart"+id).style.className = " text-danger";
                window.location.reload();
            }else{
            alert(t);
            }
        }
    }


    r.open("GET","addtoWatchlistProcess.php?id="+id,true);
    r.send();
}



function removeFromWatchlist(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);

            }
        }
    }

    r.open("GET","removeFromWatchlistProcess.php?id="+id,true);
    r.send()

}









function changeStatus1(id){
   
 
    var Product_id = id;
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function(){
      if(r.readyState == 4){
        var t = r.responseText;
  
        if(t == "deactivete" || t == "Activete"){
          window.location.reload();
        }else{
          alert(t);
        }
  
        
      }
    }
  
  
    r.open("GET","changeSatatusProcess.php?p=" + Product_id,true);
    r.send();
}



function sort1(){
   
   var search =  document.getElementById("s");
   var time;

   if(document.getElementById("n").checked){
    time = "1";

   }else if(document.getElementById("o").checked){
     time = "2";
   }else{
    time = "0";
   }

   var qty;

   if(document.getElementById("h").checked){
    qty = "1";

   }else if(document.getElementById("l").checked){
    qty = "2";
   }else{
    qty = "0";
   }

   var condition;

   if(document.getElementById("b").checked){
    condition = "1";

   }else if(document.getElementById("u").checked){
    condition = "2";
   }else{
    condition = "0";
   }


   var f = new FormData();
   f.append("search",search.value);
   f.append("time",time);
   f.append("qty",qty);
   f.append("con",condition);


   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("sortProduct").innerHTML = t;
        // alert(t);
    }
   }

   r.open("POST","sortProcess.php",true);
   r.send(f);



}





function newUserClickWatchlist(id){
    alert("please Sign in First");

    window.location = "index.php";

}










//home Basic Search Part.........................


function basicSearch(x){
   var txt = document.getElementById("basic_search_txt");
   var select_category = document.getElementById("basic_search_select_category");


var f = new FormData();
f.append("txt",txt.value);
f.append("select",select_category.value);
f.append("page",x);

var r = new XMLHttpRequest();

r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("basicSearchReslt").innerHTML = t;
    }
}

r.open("POST","basicSearchProcess.php",true);
r.send(f);




}




//home Bacic Search Part.........................



//Advancs Search...........

function advanceSeacher(x){

  var txt = document.getElementById("text");
  var catogery = document.getElementById("catogery");
  var brand = document.getElementById("brand");
  var modal = document.getElementById("modal");
  var condition = document.getElementById("condition");
  var colour = document.getElementById("colour");
  var priceFrom = document.getElementById("pf");
  var priceTo = document.getElementById("pt");
  var sortp = document.getElementById("s");



  var f = new FormData();
  f.append("txt",txt.value);
  f.append("cat",catogery.value);
  f.append("brand",brand.value);
  f.append("modal",modal.value);
  f.append("condi",condition.value);
  f.append("color",colour.value);
  f.append("pf",priceFrom.value);
  f.append("pt",priceTo.value);
  f.append("s",sortp.value);

  f.append("page",x);



  var r = new XMLHttpRequest();

  r.onreadystatechange = function (){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("view_area").innerHTML = t;
    }
  }

  r.open("POST","advanceSearchProcess.php",true);
  r.send(f);


}

//Advancs Search...........




// single product viwe eke qty eka hadapu function tika...........................

function checkValue(qty){

    var input = document.getElementById("qty_input");
    if(input.value <= 0){
      alert("quntity mst be 1 or more");
      input.value = 1;
    }else if(input.value > qty){
      alert("Maximum quantity achieved");
      input.value = qty;
    }
}


function qty_inc(qty){
    var input = document.getElementById("qty_input");
  
    if(input.value < qty){
      var newValue = parseInt(input.value) + 1;
      input.value = newValue.toString();
    }else{
      alert("Maximum Quntty has achieved");
      input.value = qty;
    }
  
  
}



function qty_dec(){

    var input = document.getElementById("qty_input");
  
    if(input.value > 1){
      var newValue = parseInt(input.value) - 1;
      input.value = newValue.toString();
    }else{
      alert("Minimum Quntty has achieved");
      input.value = 1;
  
    }

  
  
  
  
}

// single product viwe eke qty eka hadapu function tika...........................







//payment Method eka...............................

function paynow(id){
  

   var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
  
        if(r.readyState == 4 && r.status == 200){
            var t  = r.responseText;
           
            var obj = JSON.parse(t);

            var mail = obj["umail"];
            var amount = obj["amount"];
            var hash = obj["hash"];
        


            if(t == 1){
                alert("please Log in or Sign Up");
                window.location = "index.php";
              }else if(t == 2){
                alert("Please Update your Profile First");
                window.location = "myProfile.php";
              }else{
               

             
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId,id,mail,amount,qty);

                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:"  + error);
                };


               

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1222015",    // Replace your Merchant ID
                    "return_url": "http://localhost/medifindsl/singleProductview.php?id" + id,     // Important
                    "cancel_url": "http://localhost/medifindsl/singleProductview.php?id" + id,       // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city":obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                    payhere.startPayment(payment);
                // };



              }


            


            

        }
    }

    r.open("GET","buyNowProcess.php?id=" + id +"&qty=" + qty,true);
    r.send();

}



function saveInvoice(orderId,id,mail,amount,qty){
    var f = new FormData();
    f.append("o",orderId);
    f.append("i",id);
    f.append("m",mail);
    f.append("a",amount);
    f.append("q",qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){

                // sendOrder(orderId,mail,id);

                window.location = "invoice.php?id="+orderId;

                

            }else{
                alert (t);
            }
        }
    }

    r.open("POST","saveInvoice.php",true);
    r.send(f);

}



//Send Order ............................................

function openConfirmOrder(){

    var orderModal = document.getElementById("exampleModal2");
                om = new bootstrap.Modal(orderModal);
                om.show();
}




function sendOrder(orderId){
    alert("awaa");

    alert(orderId);
    alert(mail);


    var f = new FormData();
    f.append("oId",orderId);
    f.append("email",mail);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;           
                alert (t);
            
        }
    }

    r.open("POST","orderConfirmtoSellerMailprocess.php",true);
    r.send(f);


}
  



//Admin Sign In....................


var  avc;
function adminverification(){
    var email = document.getElementById("e");

    

    var f = new FormData();
    f.append("email",email.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                var modal = document.getElementById("adminVerificationModl");
                avc = new bootstrap.Modal(modal);
                avc.show();

            }else{
                alert(t);
            }
        }
    }

    r.open("POST","adminVerificationProcess.php",true);
    r.send(f);
}


function verifyCode(){

   var verificationCode = document.getElementById("vcode").value;

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
       if(t == "success"){
        avc.hide();
        window.location = "adminPanel.php";
       }else{
        alert(t); 
       }
    }
   }

   r.open("GET","verificationProcess.php?vcode="+verificationCode,true);
   r.send();
}

//adminSign out..............................

function adminSignout(){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
     if(r.readyState == 4){
      var t = r.responseText;
       if(t == "success"){
   
           window.location = "adminSignin.php";
        //    window.location.reload();
           
       }else{
         alert(t);
   
       }
   
     }
    };

    r.open("GET","adminSignOutProcess.php",true);
    r.send()
}

//adminSign out..............................



//admin Manage Product................................


function searchproductid(){
   var pid = document.getElementById("search_id").value;

    var r  = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Invalid Product ID"){
                alert(t);
            }else{
                document.getElementById("MP_table").innerHTML = t;
            }
            
           
        }
    }


    r.open("GET","SearchProductIdProcess.php?pid="+pid,true);
    r.send();

}


function manageSearchProduct(){
   var id = document.getElementById("search_id");
   var pname = document.getElementById("search_name");

   var f = new FormData();
   f.append("id",id.value);
   f.append("pname",pname.value);


   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("MP_table").innerHTML = t;

    }
   }

   r.open("POST","adminManageProductsearchProcess.php",true);
   r.send(f);



}





function blockProduct(id){


    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function(){
      if(r.readyState == 4){
        var t = r.responseText;
        if(t == "Blocked"){
          document.getElementById("mp"+id).innerHTML = "Unblock";
          document.getElementById("mp"+id).classList = "tUnblockbtn";
          window.location.reload();
  
        }else if(t == "Unblocked"){
          document.getElementById("mp"+id).innerHTML = "Block";
          document.getElementById("mp"+id).classList = "tBlockbtn";
          window.location.reload();
  
        }
        alert(t);
      }
    }
  
    r.open("GET","adminProductBlockProcess.php?id="+ id,true);
    r.send();
  
  }
//admin Manage Product................................





function abcd(){
    alert("ok");
}

function block(){
    alert("ok");
}






//Mange Users.................


function blockUser(email){
    


    var requset = new XMLHttpRequest();
  
    requset.onreadystatechange = function(){
      if(requset.readyState == 4){
        var txt = requset.responseText;
  
        if(txt == "blocked"){
          document.getElementById("ub"+email).innerHTML = "Unblock";
          document.getElementById("ub"+email).classList = "tUnblockbtn";
  
        }else if(txt == "Unblocked"){
          document.getElementById("ub"+email).innerHTML = "Block";
          document.getElementById("ub"+email).classList = "tBlockbtn";
  
        }else{
          alert(txt);
        }
       
      }
    }
  
    requset.open("GET","adminUserBlockProcess.php?email=" + email,true);
    requset.send();
  
  
  
  }



  function ManageUserSearch(){

       var email = document.getElementById("email").value;
       var name = document.getElementById("uname").value;


       var r = new XMLHttpRequest();

       r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t  = r.responseText;
            document.getElementById("MU_view").innerHTML = t;
        }
       }

       r.open("GET","adminManageUserSearchProcess.php?email="+email +"&&name="+name,true);
       r.send();


  }


  //Mange Users.................







  //Switch Seller account.....................

  function switchSellerAccont(){
   var SellerACBox = document.getElementById("sellerACbox");
   SellerACBox.classList.toggle("d-none");
  }



  var svm;

  function verifySeller(email){


    var seller_email = email;
   var s_name = document.getElementById("store_name");
   var b_code = document.getElementById("BR_code");
   var location = document.getElementById("location");


   var f = new FormData();
   f.append("email",seller_email);
   f.append("sName",s_name.value);
   f.append("bCode",b_code.value);
   f.append("location",location.value);

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        if(t == "success1"){
            var seller_Vmodal = document.getElementById("sellerverifiymodal");
            svm = new bootstrap.Modal(seller_Vmodal);
            svm.show();
        }else{
            alert(t);
        }
    }
   }

   r.open("POST","sellerAccountVerificationProcess.php",true);
   r.send(f);


  }



  function verifiycode(email){
    var s_email = email;
    var vcode = document.getElementById("vcode");

    var f = new FormData();
    f.append("email",s_email);
    f.append("vcode",vcode.value);

    var r  = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                svm.hide();
                window.location = "sellerDashbord.php";
            }else{
                alert(t);
            }
        }
    }


    r.open("POST","sellerVerifyProcess.php",true);
    r.send(f);

  }


  function allradyhaveAccount(){
    window.location = "sellerDashbord.php";
  }


//   function abcd(){
//     alert("ok");
//   }



//orderConfirmtoSellerMailprocess.php