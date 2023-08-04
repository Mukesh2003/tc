<?php

     session_start();
     require_once("connect.php");
     if(isset($_POST["subb"])){
     $id=$_POST["fname"];
     $_SESSION['roll']=$id;
     }
     else{
        $id=$_SESSION['roll'];
        if(!$id){
        header('Location:roll.html');
        }
    }
    if(1){
        // $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        // $queryfire1 = mysqli_query($conn, $query1);
        // $num1=mysqli_num_rows($queryfire1); 
        // $result1=mysqli_query($conn,$query1); 
        // $row1=mysqli_fetch_assoc($result1);
        $query=" SELECT * from samplestudent1 where RollNumber = '".$id."' ";
        $queryfire = mysqli_query($conn, $query);
        $num=mysqli_num_rows($queryfire); 
        // $query2="SELECT `TC` FROM serial";
        // $queryfire2 = mysqli_query($conn, $query2);
        // $row2=mysqli_fetch_assoc($queryfire2);
        if($num){
            $result=mysqli_query($conn,$query); 
            $row=mysqli_fetch_assoc($result);
        }
        else{
            header('Location: roll.html');  
        }
    }
    if(isset($_POST['save'])){
        $id=$_POST['admin_no'];
        $course=$_POST['course'];
        $sur_name=$_POST['sur_name'];
        $name=$_POST['name'];
        $father_name=$_POST['father_name'];
        $father_sur_name=$_POST['father_sur_name'];
        $nation=$_POST['nation'];
        $religion=$_POST['religion'];
        $caste=$_POST['caste'];
        $dob=$_POST['dob'];
        //$dob=date_format(date_create_from_format('Y-m-d',$dob1),'d-m-Y');
        $date_adm=$_POST['date_adm'];
        $qualify=$_POST['qualify'];
        $state=$_POST['state'];
        $fee_pay=$_POST['fee_pay'];
        $date_left=$_POST['date_left'];
        $remarks=$_POST['remarks'];
        $conduct=$_POST['conduct'];
        $bran=$_POST['branch'];
        $sub=$_POST['subcaste'];
        $new=$qualify." ".$state;
        $query="UPDATE samplestudent1 SET Course='$course',Student_Name='$name',Student_Sur_Name='$sur_name',Father_Name='$father_name',Father_Sur_Name='$father_sur_name',
Nation='$nation',Religion='$religion',Caste='$caste',Date_of_Birth='$dob',Admission_date='$date_adm',Branch='$bran',Subcaste='$sub',
        Promoted='$new',Fee_paid='$fee_pay',Date_college_left='$date_left',
        Remarks='$remarks',Conduct='$conduct' where RollNumber='$id'";
        $query_run=mysqli_query($conn,$query);
    
        header('Location: TC_edit.php');  
    }

?>

<html>
<head>
<title>jntugv1</title>
<link rel="stylesheet" href="fom.css">
</head>
<style>
  .t {
    margin-top:15px;
  }


  </style>
<body>


<!-- <form id="form1" action="tc_form.php" method = "post"></form> -->
<form action="TC_edit.php" method = "post">
<table class="image" align="center" cellpadding="8" width="75%">
<tr>
<td class="t1">1.</td>
<td>Admission Number</td>
<td>....</td>
<td align="center"><input type="text" name="admin_no" maxlength="1000" value="<?php
        echo $id;
        ?>"/>
</td>
</tr>
<tr>
<!-- <td class="t1">2.</td>
<td>Name of the College </td>
<td>....</td>
<td align="center"><input type="text" name="college_name" maxlength="1000" value = "<?php    
       $yr=substr($id,0,2);
       if($yr>19){
       echo "JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY GURAJADA VIZIANAGARAM";
       }
       else{
           echo "JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA";
       }
    ?>"/> -->
</td>
</tr>
<tr>
<td class="t1">2.</td>
<td> Student Sur Name</td>
<td>....</td>
<td align="center"><input type="text" name="sur_name" maxlength="1000" size="30" value = "<?php    
       echo $row['Student_Sur_Name'];?>"/>
</td>
</tr>
<tr>
<td class="t1">3.</td>
<td> Student Name</td>
<td>....</td>
<td align="center"><input type="text" name="name" maxlength="1000" size="30" value = "<?php    
       echo $row['Student_Name'];?>"/>
</td>
</tr>


<tr>
<td >4.</td>
    <td>Sur Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_sur_name" maxlength="1000" size="30" value = "<?php    
       echo $row['Father_Sur_Name'];?>"/>
    </td>
    </tr>
<tr>
<td >5.</td>
    <td>Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_name" maxlength="1000" size="30" value = "<?php    
       echo $row['Father_Name'];?>"/>
</td>
</tr>
<tr>
<td >6.</td>
    <td>Nationality</td>
<td>....</td>
    <td align="center"><input type="text" name="nation" maxlength="1000" value = "<?php    
       echo $row['Nation'] ;?>"/>
</td>
</tr>

<tr>
<td >7.</td>
        <td>Religion</td>
         <td>....</td>
        <td align="center">
        <select id="religion" name="religion">
        <option value="<?php echo $row['Religion'] ?>"><?php echo $row['Religion'] ?></option>
        <option value="HINDU">hindu</option>
        <option value="MUSLIM">muslim</option>
        <option value="CHRISTIAN">christian</option>
</td>
</tr>
<tr>
<td >8.</td>
        <td>Caste</td>
         <td>....</td>

<td align="center">
<select id="caste" name="caste">
<option value="<?php echo $row['Caste'] ?>"><?php echo $row['Caste'] ?></option>
<option value="GENERAL">oc</option>
<option value="SC">sc</option>
<option value="ST">st</option>
<option value="BC-A">bc-a</option>
<option value="BC-B">bc-b</option>
<option value="BC-C">bc-c</option>
<option value="BC-D">bc-d</option>
<option value="BC-E">bc-e</option>
</td>

<td>
<input type="text" name="subcaste" maxlength="1000" value = "<?php   
 echo $row['Subcaste'];
?>">
    
</td>
</tr>
<tr>
<td >9.</td>
<td>Date Of Birth (in words)</td>
 <td>....</td>
<td align="center">
<label for="dob"></label>
  <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy" value="<?php 
  echo $row['Date_of_Birth'];
//   $d=date_format(date_create_from_format('Y-m-d',$r),'d-m-Y');      
 ?>"></td>
</tr>
<tr>
<td >10.</td>
    <td>Class studying at time of leaving</td>
<td>....</td>
    
    <td align="center">
<select id="course" name="course">
<option value="<?php echo $row['Course'] ?>"><?php echo $row['Course'] ?></option>
<option value="B.TECH">b.tech</option>
<option value="M.TECH">m.tech</option>
<option value="MCA">mca</option>
</td>
<td>
    <input type="text" name="branch" maxlength="1000" size="35" value = "<?php   
      $b=substr($id,6,2);
      if($b=='05'){
        echo "Computer Science and Engineering";
      }
      elseif($b=='12'){
        echo "Information Technology";
      }
      elseif($b=='04'){
        echo "Electrical and Communication Engineering";
      }
      elseif($b=='01')
      {
        echo "Civil Engineering";
      }
      elseif($b=='02')
      {
        echo "Electrical and Electronics Engineering";
      }
      elseif($b=='03')
      {
        echo "Mechanical Engineering";
      }
      elseif($b=='31')
      {
        echo "Metallurgical Engineering";
      }
       ?>"/>
</td>
    
    </tr>

    <tr>
        <td>11.</td>
        <td>Date of admission</td>
<td>....</td>
<td align="center">
  <label for="date_adm"></label>
  <input type="month" id="date_adm" name="date_adm" min="2000-01" max="2023-12" value="<?php echo $row['Admission_date'] ?>">
</td>        
        </tr>
<tr>
<td>13.</td>
<td>Whether promoted or not</td>
<td>....</td>
<td align="center">
<select id="qualify" name="qualify">
<option value="<?php echo $row['Promoted'] ?>"><?php echo $row['Promoted'] ?></option>
<option value="yes">Yes</option>
<option value="Discontinued">No</option>
</td>
<td>
<select id="state" name="state" disabled>
</td>
</select>
</td>
</tr>
<script>
  var qualifySelect = document.getElementById("qualify");
  var stateSelect = document.getElementById("state");

  qualifySelect.addEventListener("change", function() {
    var selectedqualify = this.options[this.selectedIndex].value;

    if (selectedqualify == "Discontinued") {
      stateSelect.innerHTML = "<option value='I B.TECH I SEMESTER'>I B.TECH I SEMESTER</option>";
      stateSelect.innerHTML += "<option value='I B.TECH II SEMESTER'>I B.TECH II SEMESTER</option>";
      stateSelect.innerHTML += "<option value='II B.TECH I SEMESTER'>II B.TECH I SEMESTER</option>";
      stateSelect.innerHTML += "<option value='II B.TECH II SEMESTER'>II B.TECH II SEMESTER</option>";
      stateSelect.innerHTML += "<option value='III B.TECH I SEMESTER'>III B.TECH I SEMESTER</option>";
      stateSelect.innerHTML += "<option value='III B.TECH II SEMESTER'>III B.TECH II SEMESTER</option>";
      stateSelect.innerHTML += "<option value='IV B.TECH I SEMESTER'>IV B.TECH I SEMESTER</option>";
      stateSelect.innerHTML += "<option value='IV B.TECH II SEMESTER'>IV B.TECH II SEMESTER</option>";
      stateSelect.disabled = false;
    }
    else{
        stateSelect.disabled = true;
    }
});
</script> 

<tr>
<td>14.</td>
    <td> Fee paid or not</td>
<td>....</td>
    <td align="center">
<select id="fee_pay" name="fee_pay">
<option value="<?php echo $row['Fee_paid'] ?>"><?php echo $row['Fee_paid'] ?></option>
<option value="yes">Yes</option>
<option value="No">No</option>
</td>
    
    </td>
    </tr>
     

<tr>
<td>15.</td>
<td>Date left the college</td>
<td>....</td>
<td align="center">
<label for="birthday"></label>
  <input type="month" name="date_left" min="2000-01" max="2023-12" value="<?php echo $row['Date_college_left']; ?>" ></td>
</tr>
<td>16.</td>
<td>Conduct and Character</td>
<td>....</td>
<td align="center">
<select id="conduct" name="conduct" >
<option value="<?php echo $row['Conduct'] ?>"><?php echo $row['Conduct'] ?></option>
<option value="Satisfactory">Satisfactory</option>
<option value="Good">Good</option>
</td>
</td>
</tr>

<tr>
<td>17.</td>
<td>General Remarks</td>
<td>....</td>
<td align="center">
<select id="remarks" name="remarks">
<option value="-">-</option>
</td>
</td>
</tr>
<table>
  <table>
<center>
  <div class="t">
<tr>
    <td width=550 align="right" ><input id="save" type="submit" value="save" name="save" /></td>
</form>
<form action="tc_form.php" method = "post">
    
        <td class="t1"></td>
        <td align="center" hidden><input type="text" name="admin_noo" maxlength="1000" value="<?php
        echo $id;
        ?>" />
</td>
    <td><input id="save" type="submit" value="next" name="save2" ></td>
</tr>
</center>
</div>
</form>
</table>
</body>
</html>