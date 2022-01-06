
<style>
 
 
 .modal_bg{
    background-color:#1414149f;
    
    }
    
    .modal-content{    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.5s;
        animation-name: zoom;
        animation-duration: 0.5s;
    }

    .modal{
        display: block;
    }
    

    @-webkit-keyframes zoom {
        from {-webkit-transform: scale(0)} 
        to {-webkit-transform: scale(1)}
    }
    
    @keyframes zoom {
        from {transform: scale(0.1)} 
        to {transform: scale(1)}
    }


</style>

<br>
<div class="container-fluid col-lg table-responsive">
  <!-- <input class="form-control col-3" id="myInput" type="text" placeholder="Search.."> -->
<br>

<form method="POST">
<!-- <div class="d-flex justify-content-start">
    <div class="form-floating">
    <input type="text" value="" class="form-control" name="name" id="name" alt="name" required placeholder="Search..." onkeyup="searchFunction()" autocomplete="off">
    <label for="name">Search</label>
    </div>
</div> -->

    <br>


    <?php
    if(isset($_GET["search"]) && !isset($_GET["filad"]) && !isset($_GET["filco"]) && !isset($_GET["filye"])){
      include("search.php");
    }else{
      ?>
      </form>
      <?php
      include("record_heading.php");
      include("records.php");
    }
      ?>
    </tbody>
  </table>
  
</div>


<?php
  if(!empty($_GET["set"])){

    $alumni_id = $_GET["set"];

    $get_alumni_id = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id='$alumni_id' AND account_type='2' ");
  
    while($alumni = mysqli_fetch_assoc($get_alumni_id)){
      $lastName = $alumni["last_name"];
      $firstName = $alumni["first_name"];
      $middleName = $alumni["middle_name"];
      $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
    }

    if(isset($_POST["btn_delete"])){
      mysqli_query($connections, "DELETE FROM users_tbl WHERE id_no='$alumni_id' ");
			echo"<script>window.location.href='?'; alert('Record succesfully Deleted!');</script>";
    }
?>
  <!-- The Modal -->
  <div class="modal modal_bg">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
                <h2>Delete Record</h2>
              <button type="button" class="btn-close" onclick="closeModal()"></button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <center>

                <form method="post" enctype="multipart/form-data">


                            <center><h4>Do you want to <font color="red">DELETE</font> <h2><?php echo strtoupper($fullName) . "'s Record?"; ?></h2> </h4></center>

                            

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                        <center>
                            <input type="submit" name="btn_delete" class="btn btn-danger" id="uploadPhotoBtn" value="Delete">
                        </center>
                    </form>
                </center>
            </div>
            
          </div>
          </div>
    </div>
    <?php
    }
    ?>


<?php
  if(!empty($_GET["view"])){

    $alumni_id = $_GET["view"];

    $get_alumni_id = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id='$alumni_id' AND account_type='2' ");
  
    while($alumni = mysqli_fetch_assoc($get_alumni_id)){
      $lastName = $alumni["last_name"];
      $firstName = $alumni["first_name"];
      $middleName = $alumni["middle_name"];
      $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
    }

?>

  <!-- The Modal -->
  <div class="modal modal_bg">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Other Information</h4>
              <button type="button" class="btn-close" onclick="closeModal()"></button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                

            <table class="table table-hover table-primary table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Employment Address</th>
                        <th>Current Work</th>
                        <th>School Attended</th>
                        <th>Office Tel. No.</th>
                        <th>Mobile No.</th>
                        <th>Alumni Chapter Membership</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $view_id = $_GET["view"];
    $alumni_qry = mysqli_query($connections, "SELECT * FROM users_tbl WHERE account_type='2' AND id_no='$view_id' ");
    
    while($row_alumni = mysqli_fetch_assoc($alumni_qry)){
          $id = $row_alumni["id"];
          $idNo = $row_alumni["id_no"];
          $employmentAddress = $row_alumni["employment_address"];
          $currentWork = $row_alumni["current_work"];
          $elementrayGraduateYear = $row_alumni["elementary_graduate"];
          $highschoolGraduateYear = $row_alumni["highschool_graduate"];
          $collegeGraduateYear = $row_alumni["college_graduate"];
          $graduateGraduateYear = $row_alumni["graduate_graduate"];
          $collegeDegree = $row_alumni["college_degree"];
          $graduateDegree = $row_alumni["graduate_degree"];
          $officeTelephone = $row_alumni["office_telephone"];
          $mobileNumber = $row_alumni["mobile_number"];
          $alumniChapterMembership = $row_alumni["alumni_chapter_membership"];

          $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
          $schoolAttended = "";

          if($elementrayGraduateYear != ""){
            //   echo $elementrayGraduateYear . "-" . $fullName . $idNo;
                $schoolAttended = "<hr>$elementrayGraduateYear - Elementary</br><hr>";
          }

          if($highschoolGraduateYear != ""){
            //   echo $elementrayGraduateYear . "-" . $fullName . $idNo;
                $schoolAttended = $schoolAttended . "<hr>$highschoolGraduateYear - High School</br><hr>";
          }

          if($collegeGraduateYear != ""){
            //   echo $elementrayGraduateYear . "-" . $fullName . $idNo;
                $schoolAttended = $schoolAttended . "<hr>$collegeDegree - College - ($collegeGraduateYear)</br><hr>";
          }

          if($graduateGraduateYear != ""){
            //   echo $elementrayGraduateYear . "-" . $fullName . $idNo;
                $schoolAttended = $schoolAttended . "<hr>$graduateDegree - Graduate - ($graduateGraduateYear)</br><hr>";
          }
          
    
    ?>
      <tr class="text-center">
        <td class="align-middle"><?php echo $employmentAddress; ?></td>
        <td class="align-middle"><?php echo $currentWork; ?></td>
        <td class="align-middle"><?php echo $schoolAttended; ?></td>
        <td class="align-middle"><?php echo $officeTelephone; ?></td>
        <td class="align-middle"><?php echo $mobileNumber; ?></td>
        <td class="align-middle"><?php echo $alumniChapterMembership; ?></td>
      </tr>

      <?php
    }
      ?>
    </tbody>
  </table>

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                        <center>
                            <input type="submit" name="" class="btn btn-danger invisible" value="Delete">
                        </center>
            </div>

          </div>
        </div>
    </div>
    <?php
    }
    ?>

<script>
function searchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("name");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function closeModal(){
    // alert("test");
    // window.location.href = "?";
        const urlParams = new URLSearchParams(window.location.search);
        if (history.pushState) {
            urlParams.set('view', 'empty');
            urlParams.delete('view');
            window.location.search = urlParams;
        }
}
</script>