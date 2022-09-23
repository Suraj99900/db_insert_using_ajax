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

    <div class="container_table ">

        <h2>Details</h2>

        <!-- Modal -->
        <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">


                        <form method="post" id="my_form_u" name="up_form">
                            <div class="input_box" id="srno">
                                <input type="text" name="srno" placeholder="enter your Srno... ">
                                <b><span class="error_box"></span></b>
                            </div>
                            <div class="input_box" id="fname">
                                <input type="text" name="fname" placeholder="Enter your First name... ">
                                <b><span class="error_box"></span></b>
                            </div>
                            <div class="input_box" id="lname">
                                <input type="text" name="lname" placeholder="Enter your Last name... ">
                                <b><span class="error_box"></span></b>
                            </div>

                            <div class="input_box" id="email">
                                <input type="email" name="email" placeholder="Enter your email... " required>
                                <b><span class="error_box"></span></b>
                            </div>

                            <div class="input_box" id="phone">
                                <input type="phone" name="phone" placeholder="Enter your Phone number... ">
                                <b><span class="error_box"></span></b>
                            </div>

                            <input type="button" value="update" name="update" id="btn_u" class="btn">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Srno</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Number</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>

    </div>




    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>