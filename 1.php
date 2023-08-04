<?php
    require_once("connect.php"); 
    // C:\xampp\phpMyAdmin\vendor
    // require_once __DIR__ . '\vendor\autoload.php';
    $id=$_POST["fname"];

    $query=" SELECT * from samplestudent1 where RollNumber = '".$id."' ";
    $queryfire = mysqli_query($conn, $query);
    // $row=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($queryfire); 
    if($num){
        $result=mysqli_query($conn,$query); 
        $row=mysqli_fetch_assoc($result);
    }
    else{
        // $err="Incorrect details";
        header('Location: roll.html');  
    }
    $query2="SELECT TC FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    if(isset($_POST['save'])){
        $id=$_POST['admin_no'];
        $course=$_POST['course'];
        $sur_name=$_POST['sur_name'];
        $name=$_POST['name'];
        $father_name=$_POST['father_name'];
        $father_sur_name=$_POST['father_sur_name'];
        // $date=$_POST['date'];
        $religion=$_POST['religion'];
        $dob=$_POST['dob'];
        $date_adm=$_POST['date_adm'];
        $qualify=$_POST['qualify'];
        $fee_pay=$_POST['fee_pay'];
        $date_left=$_POST['date_left'];
        $remarks=$_POST['remarks'];
        $conduct=$_POST['conduct'];
        $query="UPDATE samplestudent1 SET Course='$course',Student_Name='$name',Student_Sur_Name='$sur_name',Father_Name='$father_name',Father_Sur_Name='$father_sur_name',
        Nationality='$religion',Date_of_Birth='$dob',Admission_date='$date_adm',
        Promoted='$qualify',Fee_paid='$fee_pay',Date_college_left='$date_left',
        Remarks='$remarks',Conduct='$conduct' where RollNumber='$id'";
        $query_run=mysqli_query($conn,$query);
    }
    if(isset($_POST['print'])){
        $val4=$row2['TC']+1;
        $query4="UPDATE serial SET TC='$val4'";
        $query_run4=mysqli_query($conn,$query4);
    }
?>
<html>
  <head>
    <style>
      /* CSS for styling the page */
      .container {
        width: 800px;
        margin: 0 auto;
        text-align: center;
        font-family: Arial, sans-serif;
      }
      h1 {
        font-size: 23px;
        margin-top: 50px;
      }
      .tc-section {
        width: 49%;
        display: inline-block;
        vertical-align: top;
        margin: 50px 0;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 5px #ccc;
      }
      .sc-section {
        width: 49%;
        display: inline-block;
        vertical-align: top;
        margin: 50px 0;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 5px #ccc;
      }
      .title {
        font-size: 24px;
        margin-bottom: 20px;
      }
      .logo {
        width: 100px;
        height: 100px;
        margin: 20px auto;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
      }

      .no-outline:focus {
        outline: none;
      }

   </style>

<script>

 var prFun=function(){
    var pr=document.getElementById("print");
    var sa=document.getElementById("save");
    pr.style.visibility = 'hidden';
    sa.style.visibility = 'hidden';
    window.print();
}
</script>
  </head>
  <body>
    <form action="1.php" method = "post">
    <div class="container">
      <h1>JAWAHARLAL  NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA</h1>
      <h2>UNIVERSITY COLLEGE OF ENGINEERING,VIZINAGARAM-535003(AP)</h2>
      <img class="logo" src="college-logo.png" alt="College Logo">
      <!-- Transfer certificate section -->
      <div class="tc-section">
        <div class="title">
          Transfer Certificate
        </div>
        <table>
          
<tr>
<td class="t1">1.</td>
<td>Name of the College which the pupil is leaving</td>
<td>....</td>
<td align="center"><input type="text" name="college_name" maxlength="1000" border:none style="width :200%; class="no-outline" "value = " <?php    
       echo  "University College of Engineering,Vizianagaram" ;
    ?>"/>
</td>
</tr>
<tr>
<td class="t1">2.</td>
<td> Name of the pupil</td>
<td>....</td>
<td style="text-align:center" width=200><input type="text" name="sur_name" maxlength="1000" value = "<?php    
       echo $row['Student_Sur_Name'];?>"></td>
       <td>
        <input type="text" name="name" maxlength="1000" value = "<?php    
       echo $row['Student_Name'];?>">
      
 
</td>
</tr>
<tr>
<td >3.</td>
    <td>Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_sur_name" maxlength="1000" width ="100" value = "<?php    
       echo $row['Father_Sur_Name'];?>"></td>
       <td>
       <input type="text" name="father_name" maxlength="1000" width ="100" value = "<?php    
       echo $row['Father_Name'];?>">
    </td>
    </tr>
    <tr>
        <td >4.</td>
        <td>Nationality,Religion,Caste</td>
         <td>....</td><td align="center">
        <input type="text" name="religion" maxlength="1000"  style="width :205%;"value = "<?php    
        echo $row['Nationality'];
    ?>"/>
        </td>
        </tr>
       
       
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td >5.</td>
<td>Date Of Birth as entered in the adimission register(in words)</td>
 <td>....</td>
<td align="center"><input type="text" name="dob" maxlength=1000 style="width :205%;" value = "<?php    
       echo $row['Date_of_Birth'];
    ?>"></td>
</tr>
<tr>
<td >6.</td>
    <td>Class in which the pupil was studying at the time of leaving</td>
<td>....</td>
    <td align="center"><input type="text" name="course" maxlength="1000" style="width :205%;" value = "<?php    
       echo $row['Course'];
    ?>"/>
    
    </td>
    </tr>

    <tr>
        <td>7.</td>
        <td>Date of admission</td>
<td>....</td>
        <td align="center"><input type="text" name="date_adm" maxlength="1000" style="width :205%;" value = "<?php    
         echo $row['Admission_date'];
    ?>"/>
        
        </td>
        </tr>
             

<tr>
<td>8.</td>
<td>Whether qualified for promotion to a higher class</td>
<td>....</td>
<td align="center"><input type="text" name="qualify" maxlength="1000" style="width :205%;" value = "<?php    
       echo $row['Promoted'];
    ?>"/>

</td>
</tr>
 

<tr>
<td>9.</td>
    <td> Whether the pupil has paid all the fees due to the college</td>
<td>....</td>
    <td align="center"><input type="text" name="fee_pay" maxlength="1000" style="width :205%;"
    value = "<?php    
       echo $row['Fee_paid'];
    ?>"/>
    
    </td>
    </tr>
     

<tr>
<td>10.</td>
<td>Date on which pupil actually left the college</td>
<td>....</td>
<td align="center"><input type="text" name="date_left" maxlength="1000" style="width :205%;"
value = "<?php    
       echo $row['Date_college_left'];
    ?>"/>
</td>
</tr>
 



 

<tr>
<td>11.</td>
    <td>Date on which appilication for Transfer Certificate was made <br> on behalf the pupil by his/her parent or Guardian </td>
<td>....</td>
    <td align="center"><input type="text" name="date_made" maxlength="1000" style="width :205%;" 
    value = "<?php    
        echo "".date("d-m-Y");
    ?>"/></td>
    </tr>
 
<tr>
<td>12.</td>
<td>Counduct and Character</td>
<td>....</td>
<td align="center"><input type="text" name="conduct" maxlength="1000" style="width :205%;"
value = "<?php    
       echo $row['Conduct'];
    ?>"/>
</td>
</tr>

<tr>
<td>13.</td>
<td>General Remarks</td>
<td>....</td>
<td align="center"><input type="text" name="remarks" maxlength="1000" style="width :205%;"
value = "<?php    
       echo $row['Remarks'];
    ?>"/>
</td>
</tr>

</table>
      </div>
      <!-- Study certificate section -->
      <div class="sc-section">
        <div class="title">
          Study Certificate
                  </div>
        <table>
          <tr>
            <th>S.No</th>
            <th>Details</th>
            <th>Value</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Name</td>
            <td>John Doe</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Admin No</td>
            <td>12345</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Enrollment No</td>
            <td>67890</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Date of Birth</td>
            <td>01-01-2000</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Duration of Study</td>
            <td>5 years</td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>


    