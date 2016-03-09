<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"
          type="image/png"
          href="assets/b&bicon.png">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Register B&B: theB&Bhub</title>
</head>
<body>

<section class="container" id="banner">
    <div class="floatleft">
        <img src = "assets/bnblogocroporange.png" id="img">
    </div>
    <div class="floatright">

        <?php
        if ($_SESSION["user"] != null) {
            echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
            echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";

            //header("Location: OwnerReviewPage.php"); ||



        }else{
            echo "<p id='loginText'>currently not logged in";


        }

        ?>
        <script>
            function logout() {

                window.location = "SearchBB.php?value=logout";
            }
        </script>

    </div>
</section>

<section class="container" id="navigation2">
    <div>
        <nav role="main">
            <ul>
                <li><a href="B&Bregistration.php">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
</section>


<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">

        <p>Add Room to</p>


        <?php

        $bb = $_POST['bbname'];

        echo "<p>{$bb} form.</p>";



        ?>

    </div>
</section>



<section>


    <form action="bbReviewPage.php" method="POST">

        <table class="table3">
            <tr><td colspan="3"><p>* Required Fields</p></td>

            <tr>
                <td><label for="bbname">B&B Name: *</label></td>
                <td hidden><input id="bbname" type="text" class="inputform" name="bbname" placeholder="Enter your B&B Name" required /></td>

                <td>
                    <label for="city">City: *</label></td>
                <td><input id="city" type="text" class="inputform" name="city" placeholder="Enter City" size="30" maxlength="50" required /></td>

                <td>
                    <label for="city">Region: *</label></td>
                <td><input id="city" type="text" class="inputform" name="city" placeholder="Enter City" size="30" maxlength="50" required /></td>


            </tr>
            <tr><td>
                    <label for="address">Address: *</label></td>
                <td><input id="address" type="text" class="inputform" name="address" placeholder=" Enter first line of your address" size="30" maxlength="50" required /></td>


                <td>
                    <label for="address2">Address Line 2: *</label></td>
                <td><input id="address2" type="text" class="inputform" name="address2" placeholder=" Enter second line of your address" size="30" maxlength="50" required /></td>

                <td>
                    <label for="telephone">Telephone: *</label></td>
                <td><input id="telephone" type="text" class="inputform" name="telephone" placeholder=" Enter your telephone number" size="20" maxlength="20" required /></td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email: *</label></td>
                <td><input id="email" type="text" class="inputform" name="email" placeholder="email" size="30" maxlength="50" required /></td>
                <td>
                    <label for="bbdescription">B&B Description: *</label></td>
                <td><input id="bbdescription" type="text" class="inputform" name="bbdescription" placeholder=" Enter a description of your B&B" size="30" maxlength="50" required /></td>


                <td>
                    <label for="roomdescription">Room Description: *</label></td>
                <td><input id="roomdescription" type="text" class="inputform" name="roomdescription" placeholder=" Enter a description of your rooms" size="30" maxlength="50" required /></td>
            </tr>

            <tr><td>
                    <label for="price">Price: *</label></td>
                <td><input id="price" type="text" class="inputform" name="price" placeholder="Enter the price per night" required /></td>
                <td>
                    <label for="checkin">Check-in time: *</label></td>
                <td><input id="checkin" type="text" class="inputform" name="check-in" placeholder="Enter the check-in time" required /></td>


                <td>
                    <label for="checkout">Check-out time: *</label></td>
                <td><input id="checkout" type="text" class="inputform" name="check-out" placeholder="Enter the check-out time" required /></td>

            </tr><tr><td>
                    <label for="picture">Upload a picture: *</label></td>
                <td><input id="picture" type="text" class="inputform" name="picture" required /></td>


                <td>
                    <label  for="pets">Pets Allowed: *</label></td>
                <td><select id="pets" class="inputform" name="title">
                        <option value="">Select Yes or No</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="6"><p><input id="submit" type="submit" value="Submit" class="submit" /></p></td>
            </tr>
        </table></form>


</section>



<section class="spacer" id="spacer">


</section>

<section class="container" id="featured">
    <div class="centre">

        <p>Need help with the form?</p>
    </div>
</section>


<section id="mycontainer">

    <button class="accordion">Adding you bed and breakfast name</button>
    <div class="panel">
        <p>Enter the name of your bed and breakfast as you want it displayed on the site. This will be the name returned in the search results. Maximum number of characters is 50.</p>
    </div>

    <button class="accordion">Address?</button>
    <div class="panel">
        <p>Enter the address of your bed and breakfast including the city and postcode.  </div>

    <button class="accordion">City?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p>
    </div>


    <button class="accordion">Telephone?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p>
    </div>


    <button class="accordion">Email?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p>
    </div>

    <button class="accordion">B&B Description?</button>
    <div class="panel">
        <p>Blah... Blah... Blah... </div>


    <button class="accordion">Room Description?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p>
    </div>

    <button class="accordion">Check In Time</button>
    <div class="panel">
        <p>Blah... Blah... Blah... </p></div>


    <button class="accordion">Check Out Time?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p>
    </div>

    <button class="accordion">Upload Picture?</button>
    <div class="panel">
        <p>Blah... Blah... Blah...</p> </div>




    <button class="accordion lastaccordion">Pets Allowed?</button>
    <div id="foo" class="panel lastpanel">
        <p>Blah... Blah... Blah...</p>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function(){
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    </script>


</section>




<section class="spacer" id="spacer">


</section>
<section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="B&Bregistration.php">Contact</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="SearchBB.php">Search</a></li>
            </ul>
        </nav>
    </div>
    <div id="copyright">
        <hr width="100%" size="1">
        <p>Copyright. Team D Solutions.</p>
    </div>

</section>



</body>
</html>