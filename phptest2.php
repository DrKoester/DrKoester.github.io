<?php

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form class="form-horizontal" method="post" action="content.php" enctype="multipart/form-data">
        
        <!-- name  -->
        <label for="name">Please enter your name:</label>
        <input type="text" class="form-control" 
                id="name" placeholder="NAME" 
                name="name" value="" /><br>
        
        <!-- email  -->
        <label for="email">Please enter your e-mail:</label>
        <input type="email" class="form-control" 
                id="email" placeholder="EMAIL" 
                name="email"
            value="" /><br>
        
        <!-- birthday -->
        <label for="birthday">Please enter your birth date:</label>
        <input type="date" id="birthday" name="birthday">
        <br>

         <!-- phone -->
        <label for="phone">Please enter your phone number:</label>
        <input type="range" id="phone" name="phone" min="0" max="9999999999">
        <span id="phoneValue">+43 0</span>
        <br>

        <!-- gender -->
         <p>Gender:</p>
        <input type="radio" name="gender" id="gender1" value="Male">
        <label for="gender1">Male</label><br>
        <input type="radio" name="gender" id="gender2" value="Female">
        <label for="gender2">Female</label><br>
        <input type="radio" name="gender" id="gender3" value="Other (Not Real)">
        <label for="gender3">Other (not real)</label>
        <br>

        <!-- murica!!! -->

        <p>Please tick correct statements:</p>
        <input type="checkbox" name="intr1" value="livinginmurica">
        <label for="intr1">I was born in 'Murica</label><br>

        <input type="checkbox" name="intr2" value="likingothers">
        <label for="intr2">I like people born outside 'Murica</label><br>

        <input type="checkbox" name="intr3" value="ancestors">
        <label for="intr3">I have Ancestors less than 3 generations back who weren't born in 'Murica</label>
        <br>

        <!-- vote -->
        <p>Who did you last vote for?</p>
        <input type="radio" name="vote" id="v1" value="harris...">
        <label for="v1">harris...</label><br>
        <input type="radio" name="vote" id="v2" value="TRUMP!!!">
        <label for="v2">TRUMP!!!</label><br>

        <!-- race -->
        <label for="favcolor">Please select your skin tone:</label>
        <input type="color" id="skincolor" name="skincolor">
        <br>

        <!-- dick pic -->
        <label for="dickpic">Please attach <s>a photograph of your phallus:</s> an image of your choice:</label>
        <input type="file" id="dickpic" name="dickpic">
        <br>

        <button class="btn btn-primary send-button" 
                id="submit" type="submit" value="SEND">
            <i class="fa fa-paper-plane"></i>
            <span class="send-text">SEND</span>
        </button>
    </form>








    <script>
        const slider = document.getElementById("phone");
        const output = document.getElementById("phoneValue");

        output.textContent = "+43 " + slider.value;

        slider.addEventListener("input", () => {
            output.textContent = "+43 " + slider.value;
        });
    </script>
</body>
</html>