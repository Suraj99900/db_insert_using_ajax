<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_form</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="main__container section">
        <div class="container form__section-container">
            <h2>Registration Form</h2>

            <b><span id="succ_box"></span></b>

            <b><span class="error_box"></span></b>
            <form method="post" action="" id="my_form" name="reg_form">
                <div class="input_box" id="fname">
                    <input type="text" name="fname" placeholder="Enter your First name... ">
                    <b><span class="error_box"></span></b>
                </div>
                <div class="input_box" id="lname">
                    <input type="text" name="lname" placeholder="Enter your Last name... ">
                    <b><span class="error_box"></span></b>
                </div>

                <div class="input_box" id="email">
                    <input type="email" name="email" placeholder="Enter your email... ">
                    <b><span class="error_box"></span></b>
                </div>

                <div class="input_box" id="password">
                    <input type="password" name="password" placeholder="Enter your password... ">
                    <b><span class="error_box"></span></b>
                </div>

                <div class="input_box" id="c_password">
                    <input type="password" name="c_password" placeholder="Re-Enter your password ... ">
                    <b><span class="error_box"></span></b>
                </div>

                <div class="input_box" id="phone">
                    <input type="phone" name="phone" placeholder="Enter your Phone number... ">
                    <b><span class="error_box"></span></b>
                </div>

                <input type="submit" value="submit" name="submit" id="btn_s" class="btn">
            </form>

            <span class="text">Already have an account? <a href="">Sign In</a></span>

        </div>
    </section>


    <script src="main.js"></script>
</body>

</html>