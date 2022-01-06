<?php

session_start();


include("bins/header.php");
include("../bins/connections.php");
include("bins/nav.php");

if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    $name = $get_account_type["first_name"];
    
    if($account_type != 1){
    
        header('Location: ../../forbidden');

    }
    // include("../bins/sidenav.php");
}

$search = "";

if (isset($_POST["search"])) {
    // echo "<script>alert('hey');</script>";
    // echo "hey";
    if(!empty($_POST["searchInput"])){
        $search = $_POST["searchInput"];
        // window.location.href='?search=$search';
        echo "<script>
        const urlParams = new URLSearchParams(window.location.search);
        if (history.pushState) {
        if(!urlParams.has('search')){
            
            urlParams.set('search', '$search');
            window.location.search = urlParams;
            
        }else{
            urlParams.set('search', '$search');
            window.location.search = urlParams;
        }
        }
        </script>";
    }else{
        // echo "<script>window.location.href='?';</script>";
        echo "<script>
        const urlParams = new URLSearchParams(window.location.search);
        if (history.pushState) {
            urlParams.set('search', 'empty');
            urlParams.delete('search');
            window.location.search = urlParams;
        }
        </script>";
    }
}



?>

<center>

<br>
<form method="post">
<div class="container-fluid d-flex justify-content-start">

    <div class="form-floating">
    <input type="text" value="<?php if(isset($_GET["search"])){ echo $_GET["search"]; }else{ echo $search; } ?>" class="form-control" name="searchInput" id="searchInput" alt="Search" placeholder="Search..." onkeyup="/* searchFunction() */" autocomplete="off">
    <label for="name">Search</label>
    </div>
    
<button type="submit" name="search" class="btn btn-primary">Search</button>

</div>
<!-- <br> -->

 <!-- ######### Filters Start Here ######### -->
<!-- <div class="container-fluid">
<div class="form-check form-switch d-flex justify-content-start">
  <input class="form-check-input" type="checkbox" id="filterSwitch" onchange="checkFilter()" name="filter" value="yes"> &nbsp;
  <label class="form-check-label" for="filterSwitch">Allow Filter</label>
</div>


<div class="d-none" id="filters">
<div class="form-check d-flex justify-content-start">
  <input class="form-check-input" type="checkbox" id="address" onclick="addressFilter()" name="address" value="something"> &nbsp;
  <label class="form-check-label" for="address" >Address</label>
</div>

<div class="form-check d-flex justify-content-start">
  <input class="form-check-input" type="checkbox" id="course" onclick="courseFilter()" name="course" value="something"> &nbsp;
  <label class="form-check-label" for="course" >Course</label>
</div>

<div class="form-check d-flex justify-content-start">
  <input class="form-check-input" type="checkbox" id="year" onclick="yearFilter()" name="year" value="something"> &nbsp;
  <label class="form-check-label" for="year" >Year</label>
</div>
</div>

</div> -->

</form>

<?php
if(empty($_GET["update"])){
include("retrieve_records.php");
}else{
include("update_records.php");
}
?>
</center>

<br>
<br>
<br>
<br>



<script>

// var filterSwitch =  document.getElementById("filterSwitch").checked;
// var filters =  document.getElementById("filters");
if (history.pushState) {

function checkFilter(){
 if(document.getElementById("filterSwitch").checked){
    document.getElementById("filters").classList.remove('d-none');
    document.getElementById("filters").classList.add('d-block');
 }else{
    document.getElementById("filters").classList.remove('d-block');
    document.getElementById("filters").classList.add('d-none');
 }
 }

 
    const urlParams = new URLSearchParams(window.location.search);

    // ######################## ADDRESS ########################

    function addressFilter(){

        var url = window.location.href;
        if(document.getElementById("address").checked){
            if(!urlParams.has('filad')){
                // if (history.pushState) {
                    urlParams.set('filad', 'address');
                    window.location.search = urlParams;
                // }
            }
        }else{
            if(urlParams.has('filad')){
                urlParams.delete('filad');
                window.location.search = urlParams;
            }
        }
    }

    if(urlParams.has('filad')){
        // alert("okay");
        document.getElementById("filterSwitch").checked = true;
        document.getElementById("filters").classList.remove('d-none');
        document.getElementById("filters").classList.add('d-block');
        document.getElementById("address").checked = true;
    }else{
        // document.getElementById("filterSwitch").checked = true;
        // document.getElementById("filters").classList.remove('d-none');
        // document.getElementById("filters").classList.add('d-block');
    }


    // ######################## COURSE ########################

    function courseFilter(){

        var url = window.location.href;
        if(document.getElementById("course").checked){
            if(!urlParams.has('filco')){
                // if (history.pushState) {
                    urlParams.set('filco', 'course');
                    window.location.search = urlParams;
                // }
            }
        }else{
            if(urlParams.has('filco')){
                urlParams.delete('filco');
                window.location.search = urlParams;
            }
        }
    }

    if(urlParams.has('filco')){
        // alert("okay");
        document.getElementById("filterSwitch").checked = true;
        document.getElementById("filters").classList.remove('d-none');
        document.getElementById("filters").classList.add('d-block');
        document.getElementById("course").checked = true;
    }else{
        // document.getElementById("filterSwitch").checked = true;
        // document.getElementById("filters").classList.remove('d-none');
        // document.getElementById("filters").classList.add('d-block');
    }


    // ######################## YEAR ########################

    function yearFilter(){

        var url = window.location.href;
        if(document.getElementById("year").checked){
            if(!urlParams.has('filye')){
                // if (history.pushState) {
                    urlParams.set('filye', 'year');
                    window.location.search = urlParams;
                // }
            }
        }else{
            if(urlParams.has('filye')){
                urlParams.delete('filye');
                window.location.search = urlParams;
            }
        }
    }

    if(urlParams.has('filye')){
        // alert("okay");
        document.getElementById("filterSwitch").checked = true;
        document.getElementById("filters").classList.remove('d-none');
        document.getElementById("filters").classList.add('d-block');
        document.getElementById("year").checked = true;
    }else{
        // document.getElementById("filterSwitch").checked = true;
        // document.getElementById("filters").classList.remove('d-none');
        // document.getElementById("filters").classList.add('d-block');
    }
}

</script>

<?php
include("bins/footer.php");
?>
