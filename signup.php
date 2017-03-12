
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script>
        function checkSSID(persorID){
            var arrayssid = [];
            var total = 0;
            var count;
            var j =0;
            for(var i=12; i>=0; i--){
                arrayssid[j] = parseInt(persorID[i]);
                j++;
            }

            for(i =1; i<13;i++){
                count = arrayssid[i]* (i+1);
                total = total + count;
            }
            var mod = total % 11;
            var sub = 11-mod;
            var digit = sub % 10;
            var x = document.createElement("IMG");
            x.setAttribute("src","inspect.png");
            x.setAttribute("width","100");
            x.setAttribute("height","80");
            if(persorID[12] == digit){
                //document.body.appendChild(x);
                document.getElementById("messagessid").innerHTML = '';
            }
            else{
                document.getElementById("messagessid").innerHTML = '*';
                document.getElementById("messagessid").style.color = "red";
                document.getElementById("messagessid").style.fontWeight = 20;
                document.getElementById("messagessid").style.fontSize = x-large;
                document.getElementById("alert_error_ssid").innerHTML = "คุณใส่เลขประจำตัวประชาชนไม่ถูดต้อง"
                document.getElementById("alert_error_ssid").style.color = "red";
            }
            //  document.getElementById("message1").innerHTML = count;

            //var persorID = document.getElementsByName("ssid").value;
        }
        function checkEmail() {

            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
            }
        }
    </script>
</head>
<body>

<?php include 'header.php';?>
<div class="container">
    <h1 class="well">Registration Form</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form method="post" action="singupDB.php">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>ID Card</label>
                            <input type="text" name="personID" placeholder="Enter ID Card Here.." class="form-control" maxlength="13" onchange="checkSSID(this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" name="name" placeholder="Enter First Name Here.." class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Name Here.." class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea  name="address" placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="tel" type="text" placeholder="Enter Phone Number Here.." class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Email Address</label>
                            <input name="email" type="email" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Password</label>
                            <input type="text" placeholder="Enter Password Here.." class="form-control">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Re-Password</label>
                            <input type="text" name="password" placeholder="Enter Password again Here.." class="form-control">
                        </div>
                    </div>
                    <!-- captcha-->
                    <div class="row">
                        <dev class="col-lg-6 form-group"></dev>
                        <div class="g-recaptcha" data-sitekey="6LcUKxgUAAAAAH6JGULf8ZlxWsey2hlS9QKkQ-59"></div>
                    </div><br>
                    <button type="submit" class="btn btn-lg btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Captcha google -->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>