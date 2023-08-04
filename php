<?php
    require_once("connect.php"); 
    $id=$_POST["admin_noo"];
    if(!$id){
        header('Location: roll.html'); 
    }
    
    
    $query=" SELECT * from samplestudent1 where RollNumber = '".$id."' ";
    $queryfire = mysqli_query($conn, $query);
    $num=mysqli_num_rows($queryfire); 
    
    if($num){
        $result=mysqli_query($conn,$query); 
        $row=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: roll.html');  
    }
//    }
// else{
    // $q1=" SELECT * from `study` where `Roll_Number` = '".$id."' ";
    //     $qfire1 = mysqli_query($conn, $q1);
    //     $n1=mysqli_num_rows($qfire1); 
    //     $r1=mysqli_query($conn,$q1); 
    //     $row11=mysqli_fetch_assoc($r1);
    // $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
    //     $queryfire1 = mysqli_query($conn, $query1);
    //     $num1=mysqli_num_rows($queryfire1); 
    //     $result1=mysqli_query($conn,$query1); 
    //     $row1=mysqli_fetch_assoc($result1);
    
if (isset($_POST['print'])) {
    $idd = $_POST['admin_no'];
    $date = $_POST['date'];
    $query1 = "SELECT * from samplestudent1 WHERE RollNumber = '".$idd."'";
    $queryfire1 = mysqli_query($conn, $query1);
    if ($queryfire1 && mysqli_num_rows($queryfire1) > 0) {
        $row1 = mysqli_fetch_assoc($queryfire1);
        if ($row1['Tc_taken'] != 'yes') {
            $query2 = "UPDATE `samplestudent1` SET `Tc_taken` = 'yes' WHERE `RollNumber` = '".$idd."'";
            $query_run2 = mysqli_query($conn, $query2);
        }
        if ($row1['Study_taken'] != 'yes') {
            $query3 = "UPDATE `samplestudent1` SET `Study_taken` = 'yes' WHERE `RollNumber` = '".$idd."'";
            $query_run3 = mysqli_query($conn, $query3);
        }
    } else {
        // Student record not found, handle error or redirection here if needed.
    }
}
        // $query5=" SELECT * from `tc` where `Roll_Number` = '".$idd."' ";
        // $num5 = mysqli_query($conn, $query5);
        // $num6 =mysqli_num_rows($num5); 

        // if($num6)
        // {
        //     $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
        //     $query_run=mysqli_query($conn,$query1);
        // }
        // else{
        //     $query1= "INSERT into `tc`(`Roll_Number`,`Date`) values ('".$idd."','".$date."')";
        //     $query_run=mysqli_query($conn,$query1);
        //     $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
        //     $query_run=mysqli_query($conn,$query1);
        // }
        // $i=$_POST['admin_no'];
        // $d=$_POST['date'];
        // $q5=" SELECT * from `study` where `Roll_Number` = '".$i."' ";
        // $n5 = mysqli_query($conn, $q5);
        // $n6 =mysqli_num_rows($n5); 

        // if($n6)
        // {
        //     $q1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$i."'";
        //     $q_run=mysqli_query($conn,$q1);
        // }
        // else{
        //     $q1= "INSERT into `study`(`Roll_Number`,`Date`) values ('".$i."','".$d."')";
        //     $query_run=mysqli_query($conn,$q1);
        //     $q1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
        //     $query_run=mysqli_query($conn,$q1);
        
    

?> 
<html>
<head>
<!-- <title>jntugv1</title> -->
<link rel="stylesheet" href="fom.css">
<link rel="stylesheet" href="style1.css">

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
<div id="main-container">
<form action="tc_form.php" method = "post">

<table  align="center" cellpadding="0" width="100%">
<tr>
<tr>
    <td>

</td>
<td></td>
<td align="right"> <?php 
      if($row['Tc_taken']=='yes'){
        echo "DUPLICATE";
      }
     ?></td> 
</tr>
<div class="line">
<tr>
<td class="summary" colspan="4" ><center><?php 
            $yr=substr($id,0,2);
            $fontSize = "24.66px";
            $fontSize1 = "29px";
            if($yr>19){
            echo "<label style='font-size: $fontSize1;'>JNTU-GV COLLEGE OF ENGINEERING VIZIANAGARAM</label>";
            }
            else{
                echo "<p style='font-size: $fontSize;'>JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA</p>";
            }?>
            </center>
</td>
</tr>
<tr>
<td class="single-line-paragraph" colspan="4" ><center><?php 
            $yr=substr($id,0,2);
            $fontSize = "23.26px";
            $fontSize1 = "19.5px";
            if($yr>19){
            echo "<label style='font-size: $fontSize1;'>JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY GURAJADA VIZIANAGARAM</label>";
            }
            else{
                echo "<p style='font-size: $fontSize;'>UNIVERSITY COLLEGE OF ENGINEERING, VIZINAGARAM-535 003(AP)</p>";
            }?>
            </center>
</td>
</tr>
</div>

<tr>
<td width=250 class="conduct1">Adm.No:<?php    
       echo strtoupper($id);
    ?></td>
   <td width = 900 align="center">
   <?php
    // Specify the original image filename
    $originalImage = "logo.jpg";
    // Specify the fallback image filename
    $fallbackImage = "Jntuklogo.png";
    $yr=substr($id,0,2);
    // Check if the original image exists
    if ($yr>19) {
        // Display the original image with alternative text
        echo '<img src="' . $originalImage . '" alt ="LOGO" height = 100 width = 100>';
    } else {
        // Display the fallback image with alternative text
        echo '<img src="' . $fallbackImage . '" alt ="LOGO" height = 100 width = 100>';
    }
    ?>
<td width=400 align="center" class="conduct1">Date:<?php
  echo strtoupper("".date("d-m-Y"));
?></td>
</td>
</tr>
<table>

<table  align="center" cellpadding="0" width="100%" margin-top="-20px" >
<tr>
<td class="conduct" colspan="3"><b>TRANSFER CERTIFICATE</b>
</td>
</tr>
</table>
<table  align="center"  class="conduct" cellpadding="0" width="100%" margin-left="100px">
<tr>
<td style="vertical-align: top" >1.</td>
<td width=250 align="left">Name of the College which the<br> pupil is leaving</td>
<td width=30 align="center">....</td>
<td align="left" class="footer"><b><?php    
       $yr=substr($id,0,2);
       if($yr>19){
       echo "JNTU-GV COLLEGE OF ENGINEERING, VIZIANAGARAM";
       }
       else{
           echo "UNIVERSITY COLLEGE OF ENGINEERING,VIZIANAGARAM ";
       }
    ?>
</td>
</tr>
<tr>
<td style="vertical-align: top">2.</td>
<td align="left"> Name of the pupil</td>
<td align="center">....</td>
<td align="left"><?php    
       echo strtoupper($row['Student_Sur_Name']." ".$row['Student_Name']);?></td>
</tr>
<tr>
<td style="vertical-align: top">3.</td>
    <td align="left">Name of the Father/Guardian</td>
<td align="center">....</td>
    <td align="left"><?php    
       echo strtoupper($row['Father_Sur_Name']." ".$row['Father_Name']);?></td>
    </tr>
    <tr>
        <td style="vertical-align: top" >4.</td>
        <td align="left">Nationality,Religion,Caste</td>
         <td>....</td>
         <td align="left"><?php    
        echo strtoupper($row['Nation'].",".$row['Religion'].",".$row['Caste']."(".$row['Subcaste'].")");
    ?>
        </td>
        </tr>
<tr>
<td style="vertical-align: top" >5.</td>
<td align="left">Date Of Birth as entered in the <br> admission register(in words)</td>
 <td align="center">....</td>
 <td align="left"><?php  
          $r=$row['Date_of_Birth']; 
            $d=date_format(date_create_from_format('Y-m-d',$r),'d-m-Y');     
            
       
 ?><?php  
       
       $k=$row['Date_of_Birth'];
$x=date($k);
$y=date('Y',strtotime($x));
$m=date('F',strtotime($x));
$d=date('d',strtotime($x));
function convert(int $num){
    $digit=array(
        0=>"zero",
        1=>"one",
        2=>"two",
        3=>"three",
        4=>"four",
        5=>"five",
        6=>"six",
        7=>"seven",
        8=>"eight",
        9=>"nine"
        );
    $str=null;
    while($num>0){
        $r=$num%10;
        $x=$digit[$r];
        $str=$x.' '.$str;
        $num=floor($num/10);
        }
        return $str;
}
$date=null;
$p=convert($y);
$n=convert($d);
$date=$n.' '.$m.' '.$p;
echo strtoupper($date);

    ?></td>
</tr>
<tr>
<td style="vertical-align: top">6.</td>
    <td align="left">Class in which the pupil was <br> studying at the time of leaving</td>
<td align="center">....</td>
    <td align="left" class="footer1"><?php    
       echo strtoupper($row['Course']."[".$row['Branch']."]");
    ?>
    
    </td>
    </tr>

    <tr>
        <td style="vertical-align: top">7.</td>
        <td align="left">Date of admission</td>
<td align="center">....</td>
        <td align="left"><?php    
         echo strtoupper(date('F-Y', strtotime($row['Admission_date'])));
    ?>
        
        </td>
        </tr>
             

<tr>
<td style="vertical-align: top">8.</td>
<td align="left">Whether qualified for promotion <br>to a higher class</td>
<td align="center">....</td>
<td align="left"><?php    
       echo strtoupper($row['Promoted']);
    ?>

</td>
</tr>
 

<tr>
<td style="vertical-align: top">9.</td>
    <td align="left"> Whether the pupil has paid all <br>the fees due to the college</td>
<td align="center">....</td>
    <td align="left"><?php    
       echo strtoupper($row['Fee_paid']);
    ?>
    
    </td>
    </tr>
     

<tr>
<td style="vertical-align: top">10.</td>
<td align="left">Date on which pupil <br>actually left the college</td>
<td align="center">....</td>
<td align="left"><?php    
       echo strtoupper(date('F-Y', strtotime($row['Date_college_left'])));
    ?>
</td>
</tr>
 



 

<tr>
<td style="vertical-align: top">11.</td>
    <td align="left">Date on which appilication for <br>Transfer Certificate was made
        <br> on behalf the pupil by his/her <br> Parent or Guardian </td>
<td align="center">....</td>
    <td align="left"><?php    
        echo strtoupper("".date("d-m-Y"));
    ?></td>
    </tr>
 
<tr>
<td style="vertical-align: top">12.</td>
<td align="left">Counduct and Character</td>
<td align="center">....</td>
<td align="left"><?php    
       echo strtoupper($row['Conduct']);
    ?>
</td>
</tr>

<tr>
<td style="vertical-align: top">13.</td>
<td align="left">General Remarks</td>
<td align="center">....</td>
<td align="left"><?php    
       echo strtoupper($row['Remarks']);
    ?>
</td>
</tr>
</table>

<div class="signature">
    <div class="conduct">
                <?php
            if($yr>19){
            echo "<p>PRINCIPAL<br>UNIVERSITY COLLEGE OF ENGINEERING<br>JNTUGV VIZIANAGARAM </p>";
            }
            else{
                echo "<p>PRINCIPAL<br>UNIVERSITY COLLEGE OF ENGINEERING<br>JNTUK VIZIANAGARAM CAMPUS</p>";
            }?>
                
            </div>
</div>
</head>
------------------------------------------------------------------------------------------------------------------------------------------------------------
</body>
<link rel="stylesheet" href="style1.css">

    

<body>
    <div class="conduct">
        <form action="tc_form.php" method="post">
        <div class="std1">
        <label><b>STUDY & CONDUCT CERTIFICATE</b></label>
        </div>
            <div class="student-info1">
                <label style="margin-right: 5px";>This is to certify that Mr./Ms.</label>
                <?php echo strtoupper($row['Student_Sur_Name'] . " " . $row['Student_Name']); ?>
</div>
                <div class="student-info">
                <label style="margin-left: 5px";>S/o,D/o</label>
                <?php echo strtoupper($row['Father_Sur_Name'] . " " . $row['Father_Name']); ?>
            
                <label style="margin-left: 5px";> has studied in this institution in</label></div>
                <div class="student-info">
                    <label style="margin-right: 5px";>the</label>
                <?php echo strtoupper($row['Course']."[".$row['Branch']."]"); ?>
                <label style="margin-left: 5px";>course from</label>
</div>
<div class="student-info">
                <?php echo strtoupper(date('F-Y', strtotime($row['Admission_date']))); ?>
                <label style="margin-left: 5px; margin-right:5px";>to</label>
                <?php echo strtoupper(date('F-Y', strtotime($row['Date_college_left']))); ?>
</div>
<div class="student-info1">
                <label>During his/her stay at this college his/her conduct and character were </label>
</div>
<div class="student-info">
                <label style="margin-right: 5px";> found to be</label>
                <?php echo strtoupper($row['Conduct']); ?>
            </div>
            <div class="signature">
                <?php
            if($yr>19){
            echo "<p>PRINCIPAL<br>UNIVERSITY COLLEGE OF ENGINEERING<br>JNTUGV VIZIANAGARAM </p>";
            }
            else{
                echo "<p>PRINCIPAL<br>UNIVERSITY COLLEGE OF ENGINEERING<br>JNTUK VIZIANAGARAM CAMPUS</p>";
            }?>
                
            </div>
            <div class="buttons">
                <button id="save" type="submit" name="save">Save</button>
                <button id="print" type="submit" name="print" onclick = "prFun()">Print</button>
            </div>
        </form>
    </div>
</div>



</form>
</body>
</html>