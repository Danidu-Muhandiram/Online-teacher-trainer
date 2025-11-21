<!DOCTYPE html>
<head>
    <title>Student Register</title>
    <link rel="stylesheet" href="student-register.css">
    <link rel="stylesheet" href="navigation_footer.css">
    <link rel="stylesheet" href="font.css">
</head>
<body>
    <div class="toggle-button">
        <a href="Regselector.html"><button>Register</button></a>
        <a href="login.html"><button>Log in</button></a>
    </div>
    <div class="register-details">
        <!--<div class="logo">
            <img src="images/logo5.png" alt="">
        </div>-->
        <form method = "post" action="stddatainsert.php" onsubmit="return validateInputs()">
            <div class="input-field">
                <input type="text" name="sfname" placeholder="First Name" required>
            </div>
            <div class="input-field">
                <input type="text" name="slname" placeholder="Last Name" required>
            </div>
            <div class="input-field">
                <input type="email" name="semail" placeholder="Email" required>
            </div>
            <div class="input-field">
                <input type="tel" name="stelephone" id="phone-number" placeholder="Phone Number">
                <p id="numbermessage"></p>
            </div>
            <div class="input-field">
                <input type="text" name="ssubject" placeholder="Subject">
            </div>
            <div class="input-field">
                <input type="text" name="scountry" placeholder="Country" required>
            </div>
            <div class="input-field">
                <input id="password" type="password" name="spassword" placeholder="Password" required>
                <p id="charcheck"></p>
            </div>
            <div class="input-field">
                <input id="confirm-password" type="password" placeholder="Re-enter password" required>
                <p id="errorMessage"></p>
            </div>
            <button type="submit" class="register">Create an account</button>      
            <p class="sign-in">Already have an account? <a href="login.html">Sign in</a></p>
        </form>
        
    </div>
    
    <script src="student-register.js"></script>    
</body>
</html>