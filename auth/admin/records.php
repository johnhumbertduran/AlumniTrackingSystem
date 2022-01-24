<?php
$alumni_qry = mysqli_query($connections, "SELECT * FROM users_tbl WHERE account_type='2' ");
    
    
    while($row_alumni = mysqli_fetch_assoc($alumni_qry)){
          // $id = $row_alumni["id"];
          $idNo = $row_alumni["id_no"];
          $lastName = $row_alumni["last_name"];
          $firstName = $row_alumni["first_name"];
          $middleName = $row_alumni["middle_name"];
          $homeAddress = $row_alumni["home_address"];
          $sex = $row_alumni["sex"];
          $civilStatus = $row_alumni["civil_status"];
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
          $paymentStatus = "";

          $checkPaymentStatus = mysqli_query($connections, "SELECT * FROM payments_tbl WHERE id_no='$idNo' ");
          $rowCheckPayment = mysqli_num_rows($checkPaymentStatus);
          if($rowCheckPayment > 0){
            $paymentStatus = "Paid";
          }else{
            $paymentStatus = "Pending";
          }

          
    
    ?>
      <tr class="text-center">
        <td class="align-middle"><?php echo $idNo; ?></td>
        <td class="align-middle"><?php echo $fullName; ?></td>
        <td class="align-middle"><?php echo $homeAddress; ?></td>
        <td class="align-middle"><?php echo $sex; ?></td>
        <td class="align-middle"><?php echo $civilStatus; ?></td>
        <!-- <td class="align-middle"><?php echo $employmentAddress; ?></td>
        <td class="align-middle"><?php echo $currentWork; ?></td>
        <td class="align-middle"><?php echo $schoolAttended; ?></td>
        <td class="align-middle"><?php echo $officeTelephone; ?></td>
        <td class="align-middle"><?php echo $mobileNumber; ?></td>
        <td class="align-middle"><?php echo $alumniChapterMembership; ?></td> -->
        <!-- <td class="align-middle"><button class="btn btn-info" id="<?php echo $idNo; ?>" onclick="viewOtherInfo(this.id)">View</button></td> -->
        <td class="align-middle"><?php echo $paymentStatus; ?></td>
        <td class="align-middle" style="width:20%;"><button class="btn text-light" style="background-color:rgb(112, 173, 70);" id="<?php echo $idNo; ?>" onclick="viewOtherInfo(this.id)">View</button><!-- <a class="btn btn-success" id="<?php echo $idNo; ?>" href="?update=<?php echo $idNo; ?>">Update</a> --><!-- &nbsp<a class="btn btn-danger" href="?set=<?php echo $idNo; ?>">Delete</a> --></td>
      </tr>


      <script>
        function viewOtherInfo(userID){
          const urlParams = new URLSearchParams(window.location.search);
          if (history.pushState) {
            if(!urlParams.has('view')){
                urlParams.set('view', userID);
                window.location.search = urlParams;
            }
          }

        }
      </script>

      <?php
    }
    