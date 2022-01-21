<?php

session_start();
include("bins/header.php");
include("../bins/connections.php");

?>

<div style="height: 100vh; ">
<div class="d-flex flex-column align-items-center justify-content-center align-self-center h-100 d-inline-block">
        <p class="display-5">Please wait <span class="spinner-grow spinner-grow-sm d-none" id="grow3"></span><span class="spinner-grow spinner-grow-sm d-none" id="grow2"></span><span class="spinner-grow spinner-grow-sm" id="grow1"></span> </p>
        
</div>
</div>
<!-- <button id="submitPayment">Submit</button> -->
<script src="http://js.stripe.com/v3/"></script>
<script src="js/stripeScript.js"></script>
<script>
    const myTimeout = setTimeout(myGreeting, 400);

    function myGreeting(){
        document.getElementById("grow2").classList.remove("d-none");
        document.getElementById("grow2").classList.add("d-inline-block");
    }
 
    const myTimeout2 = setTimeout(myGreeting2, 900);

    function myGreeting2(){
        document.getElementById("grow3").classList.remove("d-none");
        document.getElementById("grow3").classList.add("d-inline-block");
    }


</script>
<?php
// include("bins/footer.php");
?>