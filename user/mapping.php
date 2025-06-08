<?php 
    include("connect.php");
    session_start();
    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/user_op2.css">

    <title>CO-PO map</title>
</head>
<body>
    <nav>
    <div class="nav_elements">
        <a href="./home.php" class="logo"><img src="../static/img/logo.png" alt=""></a>
    </div>
    <div class="nav_elements">
        <a href="./home.php">home</a>
        <a href="./internal_qa.php">internal_qa</a>
        <a href="./marks.php">student marks</a>
        <a href="./mapping.php">co-po mapping</a>
    </div>

    <div class="log_out_btn">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <button name="logout" value="logout">log out</button>
        </form>   
    </div>
    </nav>

    <?php
        $name = $_SESSION['username'];
$sql = "SELECT * FROM `num_co` WHERE subject = '$name'";
$result1 = mysqli_query($conn,$sql);
if(mysqli_num_rows($result1) == 0){
    echo '<div class="ia-form-container">';
    echo '<div class="form-header">';
    echo '<h3 class="form-title">CO-PO Mapping Setup Required</h3>';
    echo '</div>';
    echo '<div class="ia-main-form">';
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<p>To insert new CO-PO mapping <a href="insert_co_po.php" class="submit-btn" style="display: inline-flex; padding: 12px 20px; text-decoration: none; margin-left: 10px;">Click Here</a></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
else{
    $row = mysqli_fetch_assoc($result1);
    echo '<div class="ia-form-container">';
    echo '<div class="form-header">';
    echo '<h2 class="form-title">CO-PO Mapping Table</h2>';
    echo '<div class="subject-info">';
    echo '<span class="subject-label">Subject:</span>';
    echo '<span class="subject-id">' . htmlspecialchars($name) . '</span>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="ia-main-form">';
    echo '<div class="ia-section">';
    echo '<div class="section-header">';
    echo '<h3 class="section-title">Course Outcomes Mapping</h3>';
    echo '<div class="section-divider"></div>';
    echo '</div>';
    
    echo '<div class="question-card">';
    echo '<div class="question-header">';
    echo '<h4 class="question-title">CO-PO Mapping Matrix</h4>';
    echo '</div>';
    echo '<div class="question-content">';
    
    echo '<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">';
    echo '<tr style="background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">CO/PO</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO1</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO2</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO3</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO4</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO5</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO6</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO7</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO8</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO9</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO10</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO11</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PO12</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PSO1</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PSO2</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PSO3</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">PSO4</th>';
    echo '<th style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600;">Update</th>';
    echo '</tr>';
    
    for($i = 1; $i <= $row['number_co']; $i++){
        $sql2 = "SELECT * FROM `co{$i}` WHERE subject = '$name'";
        $result2 = mysqli_query($conn, $sql2);
        $row1 = mysqli_fetch_assoc($result2);
        $po1 = $row1['po1'];
        $po2 = $row1['po2'];
        $po3 = $row1['po3'];
        $po4 = $row1['po4'];
        $po5 = $row1['po5'];
        $po6 = $row1['po6'];
        $po7 = $row1['po7'];
        $po8 = $row1['po8'];
        $po9 = $row1['po9'];
        $po10 = $row1['po10'];
        $po11 = $row1['po11'];
        $po12 = $row1['po12'];
        $pso1 = $row1['pso1'];
        $pso2 = $row1['pso2'];
        $pso3 = $row1['pso3'];
        $pso4 = $row1['pso4'];

        echo '<tr style="background: ' . ($i % 2 == 0 ? '#f8f9fa' : 'white') . ';">';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center; font-weight: 600; background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">CO' . $i . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po1 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po2 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po3 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po4 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po5 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po6 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po7 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po8 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po9 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po10 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po11 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $po12 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $pso1 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $pso2 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $pso3 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">' . $pso4 . '</td>';
        echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">';
        echo '<a href="update_co.php?updateid=' . $i . '" class="submit-btn" style="display: inline-flex; padding: 8px 16px; text-decoration: none; font-size: 0.9rem;">';
        echo '<span class="btn-text">Update</span>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    
    echo '</div>'; // Close question-content
    echo '</div>'; // Close question-card
    
    echo '<div class="form-group" style="margin-top: 30px;">';
    echo '<p style="text-align: center; margin-bottom: 20px; font-size: 1.1rem; color: #4a5568;">To re-insert overall CO-PO mapping <a href="delete_co.php" class="submit-btn" style="display: inline-flex; padding: 12px 20px; text-decoration: none; margin-left: 10px;">Click Here</a></p>';
    echo '</div>';
    
    echo '<div class="submit-section">';
    echo '<form action="mapping.php" method="post">';
    echo '<button name="calculate" value="calculate" class="submit-btn">';
    echo '<span class="btn-text">Calculate CO-PO Attainment</span>';
    echo '<span class="btn-icon">→</span>';
    echo '</button>';
    echo '</form>';
    echo '</div>';
    
    echo '</div>'; // Close ia-section
    echo '</div>'; // Close ia-main-form
    echo '</div>'; // Close ia-form-container
}
        if(isset($_POST['calculate'])){
            $sem = $_SESSION['semister'];
            $sql3 = "SELECT * FROM `marks` WHERE subject='$name' and sem='$sem'";
            $result3 = mysqli_query($conn,$sql3);
            $avg_IA1_1A = 0;
            $avg_IA1_1B = 0;
            $avg_IA1_2A = 0;
            $avg_IA1_2B = 0;
            $avg_IA2_1A = 0;
            $avg_IA2_1B = 0;
            $avg_IA2_2A = 0;
            $avg_IA2_2B = 0;

            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            $count4 = 0;
            while($rows = mysqli_fetch_assoc($result3)){
                $avg_IA1_1A += $rows['IA1_1A_M']; 
                $avg_IA1_1B += $rows['IA1_1B_M']; 

                $temp_sum1 = $rows['IA1_1B_M'] + $rows['IA1_1A_M'];

                $avg_IA1_2A += $rows['IA1_2A_M']; 
                $avg_IA1_2B += $rows['IA1_2B_M'];

                $temp_sum2 = $rows['IA1_2A_M'] + $rows['IA1_2B_M'];

                if($temp_sum1 > $temp_sum2){
                    $avg_IA1_2A -= $rows['IA1_2A_M']; 
                    $avg_IA1_2B -= $rows['IA1_2B_M'];
                    $count1 += 1;
                    $temp_sum1 = 0;
                    $temp_sum2 = 0;
                }elseif($temp_sum1 < $temp_sum2){
                    $avg_IA1_1A -= $rows['IA1_1A_M']; 
                    $avg_IA1_1B -= $rows['IA1_1B_M'];     
                    $count2 += 1;
                    $temp_sum1 = 0;
                    $temp_sum2 = 0;
                }else{
                    $count2 += 1;
                    $count1 += 1;
                }

                $avg_IA2_1A += $rows['IA2_1A_M']; 
                $avg_IA2_1B += $rows['IA2_1B_M'];

                $temp1_sum1 = $rows['IA2_1A_M'] + $rows['IA2_1B_M'];

                $avg_IA2_2A += $rows['IA2_2A_M']; 
                $avg_IA2_2B += $rows['IA2_2B_M'];

                $temp1_sum2 = $rows['IA2_1A_M'] + $rows['IA2_1B_M'];

                if($temp1_sum1 > $temp1_sum2){
                    $avg_IA2_1A -= $rows['IA2_1A_M']; 
                    $avg_IA2_1B -= $rows['IA2_1B_M'];
                    $count3 += 1;
                    $temp1_sum1 = 0;
                    $temp1_sum2 = 0;
                }elseif($temp1_sum1 < $temp1_sum2){
                    $avg_IA2_2A -= $rows['IA2_2A_M']; 
                    $avg_IA2_2B -= $rows['IA2_2B_M'];   
                    $count4 += 1;
                    $temp1_sum1 = 0;
                    $temp1_sum2 = 0;
                }else{
                    $count4 += 1;
                    $count3 += 1;
                }
            }
            $num = mysqli_num_rows($result3);
            $avg_IA1_1A = $avg_IA1_1A / $num;
            $avg_IA1_1B = $avg_IA1_1B / $num;
            $avg_IA1_2A = $avg_IA1_2A / $num;
            $avg_IA1_2B = $avg_IA1_2B / $num;
            $avg_IA2_1A = $avg_IA2_1A / $num;
            $avg_IA2_1B = $avg_IA2_1B / $num;
            $avg_IA2_2A = $avg_IA2_2A / $num;
            $avg_IA2_2B = $avg_IA2_2B / $num;


            $IA1_1A_CO = 0;
            $IA1_1B_CO = 0;
            $IA1_2A_CO = 0;
            $IA1_2B_CO = 0;
            $IA2_1A_CO = 0;
            $IA2_1B_CO = 0;
            $IA2_2A_CO = 0;
            $IA2_2B_CO = 0;


            $sql4 = "SELECT * FROM `internals` WHERE subject='$name'";
            $result4 = mysqli_query($conn,$sql4);
            $row4 = mysqli_fetch_assoc($result4);
            $IA1_1A_CO = $row4['IA1_1A_CO'];
            $IA1_1B_CO = $row4['IA1_1B_CO'];
            $IA1_2A_CO = $row4['IA1_2A_CO'];
            $IA1_2B_CO = $row4['IA1_2B_CO'];
            $IA2_1A_CO = $row4['IA2_1A_CO'];
            $IA2_1B_CO = $row4['IA2_1B_CO'];
            $IA2_2A_CO = $row4['IA2_2A_CO'];
            $IA2_2B_CO = $row4['IA2_2B_CO'];


            $CO1 = 0;
            $CO2 = 0;
            $CO3 = 0;
            $CO4 = 0;
            $CO5 = 0;
            $CO6 = 0;
            $CO7 = 0;

            $CO1_COUNT = 0;
            $CO2_COUNT = 0;
            $CO3_COUNT = 0;
            $CO4_COUNT = 0;
            $CO5_COUNT = 0;
            $CO6_COUNT = 0;
            $CO7_COUNT = 0;
            //IA1_1A_CO
            if($IA1_1A_CO == 1){
                $CO1 += $avg_IA1_1A;
                $CO1_COUNT +=1;
            }
            elseif($IA1_1A_CO == 2){
                $CO2 += $avg_IA1_1A;
                $CO2_COUNT +=1;
            }
            elseif($IA1_1A_CO == 3){
                $CO3 += $avg_IA1_1A;
                $CO3_COUNT +=1;
            }
            elseif($IA1_1A_CO == 4){
                $CO4 += $avg_IA1_1A;
                $CO4_COUNT +=1;
            }
            elseif($IA1_1A_CO == 5){
                $CO5 += $avg_IA1_1A;
                $CO5_COUNT +=1;
            }
            elseif($IA1_1A_CO == 6){
                $CO6 += $avg_IA1_1A;
                $CO6_COUNT +=1;
            }
            elseif($IA1_1A_CO == 7){
                $CO7 += $avg_IA1_1A;
                $CO7_COUNT +=1;
            }
            //IA1_1B_CO
            if($IA1_1B_CO == 1){
                $CO1 += $avg_IA1_1B;
                $CO1_COUNT +=1;
            }
            elseif($IA1_1B_CO == 2){
                $CO2 += $avg_IA1_1B;
                $CO2_COUNT +=1;
            }
            elseif($IA1_1B_CO == 3){
                $CO3 += $avg_IA1_1B;
                $CO3_COUNT +=1;
            }
            elseif($IA1_1B_CO == 4){
                $CO4 += $avg_IA1_1B;
                $CO4_COUNT +=1;
            }
            elseif($IA1_1B_CO == 5){
                $CO5 += $avg_IA1_1B;
                $CO5_COUNT +=1;
            }
            elseif($IA1_1B_CO == 6){
                $CO6 += $avg_IA1_1B;
                $CO6_COUNT +=1;
            }
            elseif($IA1_1B_CO == 7){
                $CO7 += $avg_IA1_1B;
                $CO7_COUNT +=1;
            }
            //IA1_2A_CO
            if($IA1_2A_CO == 1){
                $CO1 += $avg_IA1_2A;
                $CO1_COUNT +=1;
            }
            elseif($IA1_2A_CO == 2){
                $CO2 += $avg_IA1_2A;
                $CO2_COUNT +=1;
            }
            elseif($IA1_2A_CO == 3){
                $CO3 += $avg_IA1_2A;
                $CO3_COUNT +=1;
            }
            elseif($IA1_2A_CO == 4){
                $CO4 += $avg_IA1_2A;
                $CO4_COUNT +=1;
            }
            elseif($IA1_2A_CO == 5){
                $CO5 += $avg_IA1_2A;
                $CO5_COUNT +=1;
            }
            elseif($IA1_2A_CO == 6){
                $CO6 += $avg_IA1_2A;
                $CO6_COUNT +=1;
            }
            elseif($IA1_2A_CO == 7){
                $CO7 += $avg_IA1_2A;
                $CO7_COUNT +=1;
            }
            //IA1_2B_CO
            if($IA1_2B_CO == 1){
                $CO1 += $avg_IA1_2B;
                $CO1_COUNT +=1;
            }elseif($IA1_2B_CO == 2){
                $CO2 += $avg_IA1_2B;
                $CO2_COUNT +=1;
            }elseif($IA1_2B_CO == 3){
                $CO3 += $avg_IA1_2B;
                $CO3_COUNT +=1;
            }elseif($IA1_2B_CO == 4){
                $CO4 += $avg_IA1_2B;
                $CO4_COUNT +=1;
            }elseif($IA1_2B_CO == 5){
                $CO5 += $avg_IA1_2B;
                $CO5_COUNT +=1;
            }elseif($IA1_2B_CO == 6){
                $CO6 += $avg_IA1_2B;
                $CO6_COUNT +=1;
            }elseif($IA1_2B_CO == 7){
                $CO7 += $avg_IA1_2B;
                $CO7_COUNT +=1;
            }
            //IA2_1A_CO
            if($IA2_1A_CO == 1){
                $CO1 += $avg_IA2_1A;
                $CO1_COUNT +=1;
            }elseif($IA2_1A_CO == 2){
                $CO2 += $avg_IA2_1A;
                $CO2_COUNT +=1;
            }elseif($IA2_1A_CO == 3){
                $CO3 += $avg_IA2_1A;
                $CO3_COUNT +=1;
            }elseif($IA2_1A_CO == 4){
                $CO4 += $avg_IA2_1A;
                $CO4_COUNT +=1;
            }elseif($IA2_1A_CO == 5){
                $CO5 += $avg_IA2_1A;
                $CO5_COUNT +=1;
            }elseif($IA2_1A_CO == 6){
                $CO6 += $avg_IA2_1A;
                $CO6_COUNT +=1;
            }elseif($IA2_1A_CO == 7){
                $CO7 += $avg_IA2_1A;
                $CO7_COUNT +=1;
            }
            //IA2_1B_CO
            if($IA2_1B_CO == 1){
                $CO1 += $avg_IA2_1B;
                $CO1_COUNT +=1;
            }elseif($IA2_1B_CO == 2){
                $CO2 += $avg_IA2_1B;
                $CO2_COUNT +=1;
            }elseif($IA2_1B_CO == 3){
                $CO3 += $avg_IA2_1B;
                $CO3_COUNT +=1;
            }elseif($IA2_1B_CO == 4){
                $CO4 += $avg_IA2_1B;
                $CO4_COUNT +=1;
            }elseif($IA2_1B_CO == 5){
                $CO5 += $avg_IA2_1B;
                $CO5_COUNT +=1;
            }elseif($IA2_1B_CO == 6){
                $CO6 += $avg_IA2_1B;
                $CO6_COUNT +=1;
            }elseif($IA2_1B_CO == 7){
                $CO7 += $avg_IA2_1B;
                $CO7_COUNT +=1;
            }
            //IA2_2A_CO
            if($IA2_2A_CO == 1){
                $CO1 += $avg_IA2_2A;
                $CO1_COUNT +=1;
            }elseif($IA2_2A_CO == 2){
                $CO2 += $avg_IA2_2A;
                $CO2_COUNT +=1;
            }elseif($IA2_2A_CO == 3){
                $CO3 += $avg_IA2_2A;
                $CO3_COUNT +=1;
            }elseif($IA2_2A_CO == 4){
                $CO4 += $avg_IA2_2A;
                $CO4_COUNT +=1;
            }elseif($IA2_2A_CO == 5){
                $CO5 += $avg_IA2_2A;
                $CO5_COUNT +=1;
            }elseif($IA2_2A_CO == 6){
                $CO6 += $avg_IA2_2A;
                $CO6_COUNT +=1;
            }elseif($IA2_2A_CO == 7){
                $CO7 += $avg_IA2_2A;
                $CO7_COUNT +=1;
            }
            //IA2_2B_CO
            if($IA2_2B_CO == 1){
                $CO1 += $avg_IA2_2B;
                $CO1_COUNT +=1;
            }
            elseif($IA2_2B_CO == 2){
                $CO2 += $avg_IA2_2B;
                $CO2_COUNT +=1;
            }
            elseif($IA2_2B_CO == 3){
                $CO3 += $avg_IA2_2B;
                $CO3_COUNT +=1;
            }
            elseif($IA2_2B_CO == 4){
                $CO4 += $avg_IA2_2B;
                $CO4_COUNT +=1;
            }
            elseif($IA2_2B_CO == 5){
                $CO5 += $avg_IA2_2B;
                $CO5_COUNT +=1;
            }
            elseif($IA2_2B_CO == 6){
                $CO6 += $avg_IA2_2B;
                $CO6_COUNT +=1;
            }
            elseif($IA2_2B_CO == 7){
                $CO7 += $avg_IA2_2B;
                $CO7_COUNT +=1;
            }


            if($CO1_COUNT > 0 && ($CO1 != 0)){
                $CO1 = (($CO1 / $CO1_COUNT)/20)*100 ;
            }
            if($CO2_COUNT > 0 && ($CO2 != 0)){
                $CO2 = (($CO2 / $CO2_COUNT)/20)*100 ;
            }
            if($CO3_COUNT > 0 && ($CO3 != 0)){
                $CO3 = (($CO3 / $CO3_COUNT)/20)*100 ;
            }
            if($CO4_COUNT > 0 && ($CO4 != 0)){
                $CO4 = (($CO4 / $CO4_COUNT)/20)*100 ;
            }
            if($CO5_COUNT > 0 && ($CO5 != 0)){
                $CO5 = (($CO5 / $CO5_COUNT)/20)*100 ;
            }
            if($CO6_COUNT > 0 && ($CO6 != 0)){
                $CO6 = (($CO6 / $CO6_COUNT)/20)*100 ;
            }
            if($CO7_COUNT > 0 && ($CO7 != 0)){
                $CO7 = (($CO7 / $CO7_COUNT)/20)*100 ;
            }

            if($CO1 >= 50){
                $CO1 = 3;
            }elseif($CO1 < 50 && $CO1 >= 30){
                $CO1 = 2;
            }elseif($CO1 < 30 && $CO1 > 1){
                $CO1 = 1;
            }elseif($CO1 == 0 || $CO1 < 0){
                $CO1 = 0;
            }

            if($CO2 >= 50){
                $CO2 = 3;
            }elseif($CO2 < 50 && $CO2 >= 30){
                $CO2 = 2;
            }elseif($CO2 < 30 && $CO2 > 1){
                $CO2 = 1;
            }elseif($CO2 == 0 || $CO2 < 0){
                $CO2 = 0;
            }

            if($CO3 >= 50){
                $CO3 = 3;
            }elseif($CO3 < 50 && $CO3 >= 30){
                $CO3 = 2;
            }elseif($CO3 < 30 && $CO3 > 1){
                $CO3 = 1;
            }elseif($CO3 == 0 || $CO3 < 0){
                $CO3 = 0;
            }

            if($CO4 >= 50){
                $CO4 = 3;
            }elseif($CO4 < 50 && $CO4 >= 30){
                $CO4 = 2;
            }elseif($CO4 < 30 && $CO4 > 1){
                $CO4 = 1;
            }elseif($CO4 == 0 || $CO4 < 0){
                $CO4 = 0;
            }

            if($CO5 >= 50){
                $CO5 = 3;
            }elseif($CO5 < 50 && $CO5 >= 30){
                $CO5 = 2;
            }elseif($CO5 < 30 && $CO5 > 1){
                $CO5 = 1;
            }elseif($CO5 == 0 || $CO5 < 0){
                $CO5 = 0;
            }

            if($CO6 >= 50){
                $CO6 = 3;
            }elseif($CO6 < 50 && $CO6 >= 30){
                $CO6 = 2;
            }elseif($CO6 < 30 && $CO6 > 1){
                $CO6 = 1;
            }elseif($CO6 == 0 || $CO6 < 0){
                $CO6 = 0;
            }

            if($CO7 >= 50){
                $CO7 = 3;
            }elseif($CO7 < 50 && $CO7 >= 30){
                $CO7 = 2;
            }elseif($CO7 < 30 && $CO7 > 1){
                $CO7 = 1;
            }elseif($CO7 == 0 || $CO7 < 0){
                $CO7 = 0;
            }

            $sql_co1 = "SELECT * FROM `CO1` WHERE subject='$name'";
            $result_co1 = mysqli_query($conn,$sql_co1);
            $row_co1 = mysqli_fetch_assoc($result_co1);
            $CO1_PO1 = $row_co1['po1'] ;
            $CO1_PO2 = $row_co1['po2'] ;
            $CO1_PO3 = $row_co1['po3'] ;
            $CO1_PO4 = $row_co1['po4'] ;
            $CO1_PO5 = $row_co1['po5'] ;
            $CO1_PO6 = $row_co1['po6'] ;
            $CO1_PO7 = $row_co1['po7'] ;
            $CO1_PO8 = $row_co1['po8'] ;
            $CO1_PO9 = $row_co1['po9'] ;
            $CO1_PO10 = $row_co1['po10'] ;
            $CO1_PO11 = $row_co1['po11'] ;
            $CO1_PO12 = $row_co1['po12'] ;
            $CO1_PSO1 = $row_co1['pso1'] ;
            $CO1_PSO2 = $row_co1['pso2'] ;
            $CO1_PSO3 = $row_co1['pso3'] ;
            $CO1_PSO4 = $row_co1['pso4'] ;


            $sql_co2 = "SELECT * FROM `CO2` WHERE subject='$name'";
            $result_co2 = mysqli_query($conn,$sql_co2);
            $row_co2 = mysqli_fetch_assoc($result_co2);

            $CO2_PO1 = $row_co2['po1'] ;
            $CO2_PO2 = $row_co2['po2'] ;
            $CO2_PO3 = $row_co2['po3'] ;
            $CO2_PO4 = $row_co2['po4'] ;
            $CO2_PO5 = $row_co2['po5'] ;
            $CO2_PO6 = $row_co2['po6'] ;
            $CO2_PO7 = $row_co2['po7'] ;
            $CO2_PO8 = $row_co2['po8'] ;
            $CO2_PO9 = $row_co2['po9'] ;
            $CO2_PO10 = $row_co2['po10'] ;
            $CO2_PO11 = $row_co2['po11'] ;
            $CO2_PO12 = $row_co2['po12'] ;
            $CO2_PSO1 = $row_co2['pso1'] ;
            $CO2_PSO2 = $row_co2['pso2'] ;
            $CO2_PSO3 = $row_co2['pso3'] ;
            $CO2_PSO4 = $row_co2['pso4'] ;

            $sql_co3 = "SELECT * FROM `CO3` WHERE subject='$name'";
            $result_co3 = mysqli_query($conn,$sql_co3);
            $row_co3 = mysqli_fetch_assoc($result_co3);
            $CO3_PO1 = $row_co3['po1'] ;
            $CO3_PO2 = $row_co3['po2'] ;
            $CO3_PO3 = $row_co3['po3'] ;
            $CO3_PO4 = $row_co3['po4'] ;
            $CO3_PO5 = $row_co3['po5'] ;
            $CO3_PO6 = $row_co3['po6'] ;
            $CO3_PO7 = $row_co3['po7'] ;
            $CO3_PO8 = $row_co3['po8'] ;
            $CO3_PO9 = $row_co3['po9'] ;
            $CO3_PO10 = $row_co3['po10'] ;
            $CO3_PO11 = $row_co3['po11'] ;
            $CO3_PO12 = $row_co3['po12'] ;
            $CO3_PSO1 = $row_co3['pso1'] ;
            $CO3_PSO2 = $row_co3['pso2'] ;
            $CO3_PSO3 = $row_co3['pso3'] ;
            $CO3_PSO4 = $row_co3['pso4'] ;


            $sql_co4 = "SELECT * FROM `CO4` WHERE subject='$name'";
            $result_co4 = mysqli_query($conn,$sql_co4);
            $row_co4 = mysqli_fetch_assoc($result_co4);

            $CO4_PO1 = $row_co4['po1'] ;
            $CO4_PO2 = $row_co4['po2'] ;
            $CO4_PO3 = $row_co4['po3'] ;
            $CO4_PO4 = $row_co4['po4'] ;
            $CO4_PO5 = $row_co4['po5'] ;
            $CO4_PO6 = $row_co4['po6'] ;
            $CO4_PO7 = $row_co4['po7'] ;
            $CO4_PO8 = $row_co4['po8'] ;
            $CO4_PO9 = $row_co4['po9'] ;
            $CO4_PO10 = $row_co4['po10'] ;
            $CO4_PO11 = $row_co4['po11'] ;
            $CO4_PO12 = $row_co4['po12'] ;
            $CO4_PSO1 = $row_co4['pso1'] ;
            $CO4_PSO2 = $row_co4['pso2'] ;
            $CO4_PSO3 = $row_co4['pso3'] ;
            $CO4_PSO4 = $row_co4['pso4'] ;


            $sql_co5 = "SELECT * FROM `CO5` WHERE subject='$name'";
            $result_co5 = mysqli_query($conn,$sql_co5);
            $row_co5 = mysqli_fetch_assoc($result_co5);

            $CO5_PO1 = $row_co5['po1'] ;
            $CO5_PO2 = $row_co5['po2'] ;
            $CO5_PO3 = $row_co5['po3'] ;
            $CO5_PO4 = $row_co5['po4'] ;
            $CO5_PO5 = $row_co5['po5'] ;
            $CO5_PO6 = $row_co5['po6'] ;
            $CO5_PO7 = $row_co5['po7'] ;
            $CO5_PO8 = $row_co5['po8'] ;
            $CO5_PO9 = $row_co5['po9'] ;
            $CO5_PO10 = $row_co5['po10'] ;
            $CO5_PO11 = $row_co5['po11'] ;
            $CO5_PO12 = $row_co5['po12'] ;
            $CO5_PSO1 = $row_co5['pso1'] ;
            $CO5_PSO2 = $row_co5['pso2'] ;
            $CO5_PSO3 = $row_co5['pso3'] ;
            $CO5_PSO4 = $row_co5['pso4'] ;


            $sql_co6 = "SELECT * FROM `CO6` WHERE subject='$name'";
            $result_co6 = mysqli_query($conn,$sql_co6);
            $row_co6 = mysqli_fetch_assoc($result_co6);
            $CO6_PO1 = $row_co6['po1'] ;
            $CO6_PO2 = $row_co6['po2'] ;
            $CO6_PO3 = $row_co6['po3'] ;
            $CO6_PO4 = $row_co6['po4'] ;
            $CO6_PO5 = $row_co6['po5'] ;
            $CO6_PO6 = $row_co6['po6'] ;
            $CO6_PO7 = $row_co6['po7'] ;
            $CO6_PO8 = $row_co6['po8'] ;
            $CO6_PO9 = $row_co6['po9'] ;
            $CO6_PO10 = $row_co6['po10'] ;
            $CO6_PO11 = $row_co6['po11'] ;
            $CO6_PO12 = $row_co6['po12'] ;
            $CO6_PSO1 = $row_co6['pso1'] ;
            $CO6_PSO2 = $row_co6['pso2'] ;
            $CO6_PSO3 = $row_co6['pso3'] ;
            $CO6_PSO4 = $row_co6['pso4'] ;


            $sql_co7 = "SELECT * FROM `CO7` WHERE subject='$name'";
            $result_co7 = mysqli_query($conn,$sql_co7);
            $row_co7 = mysqli_fetch_assoc($result_co7);

            $CO7_PO1 = $row_co7['po1'] ;
            $CO7_PO2 = $row_co7['po2'] ;
            $CO7_PO3 = $row_co7['po3'] ;
            $CO7_PO4 = $row_co7['po4'] ;
            $CO7_PO5 = $row_co7['po5'] ;
            $CO7_PO6 = $row_co7['po6'] ;
            $CO7_PO7 = $row_co7['po7'] ;
            $CO7_PO8 = $row_co7['po8'] ;
            $CO7_PO9 = $row_co7['po9'] ;
            $CO7_PO10 = $row_co7['po10'] ;
            $CO7_PO11 = $row_co7['po11'] ;
            $CO7_PO12 = $row_co7['po12'] ;
            $CO7_PSO1 = $row_co7['pso1'] ;
            $CO7_PSO2 = $row_co7['pso2'] ;
            $CO7_PSO3 = $row_co7['pso3'] ;
            $CO7_PSO4 = $row_co7['pso4'] ;

            $sql = "SELECT * FROM `num_co` WHERE subject = '$name'";
            $result1 = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result1);
            $co_num =$row['number_co'];
            if($co_num == 7){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1 + $CO3_PO1 + $CO4_PO1 + $CO5_PO1 + $CO6_PO1 + $CO7_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2 + $CO3_PO2 + $CO4_PO2 + $CO5_PO2 + $CO6_PO2 + $CO7_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3 + $CO3_PO3 + $CO4_PO3 + $CO5_PO3 + $CO6_PO3 + $CO7_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4 + $CO3_PO4 + $CO4_PO4 + $CO5_PO4 + $CO6_PO4 + $CO7_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5 + $CO3_PO5 + $CO4_PO5 + $CO5_PO5 + $CO6_PO5 + $CO7_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6 + $CO3_PO6 + $CO4_PO6 + $CO5_PO6 + $CO6_PO6 + $CO7_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7 + $CO3_PO7 + $CO4_PO7 + $CO5_PO7 + $CO6_PO7 + $CO7_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8 + $CO3_PO8 + $CO4_PO8 + $CO5_PO8 + $CO6_PO8 + $CO7_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9 + $CO3_PO9 + $CO4_PO9 + $CO5_PO9 + $CO6_PO9 + $CO7_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10 + $CO3_PO10 + $CO4_PO10 + $CO5_PO10 + $CO6_PO10 + $CO7_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11 + $CO3_PO11 + $CO4_PO11 + $CO5_PO11 + $CO6_PO11 + $CO7_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12 + $CO3_PO12 + $CO4_PO12 + $CO5_PO12 + $CO6_PO12 + $CO7_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1 + $CO3_PSO1 + $CO4_PSO1 + $CO5_PSO1 + $CO6_PSO1 + $CO7_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2 + $CO3_PSO2 + $CO4_PSO2 + $CO5_PSO2 + $CO6_PSO2 + $CO7_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3 + $CO3_PSO3 + $CO4_PSO3 + $CO5_PSO3 + $CO6_PSO3 + $CO7_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4 + $CO3_PSO4 + $CO4_PSO4 + $CO5_PSO4 + $CO6_PSO4 + $CO7_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2) + ($CO3_PO1 * $CO3) + ($CO4_PO1 * $CO4) + ($CO5_PO1 * $CO5) + ($CO6_PO1 * $CO6) + ($CO7_PO1 * $CO7))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2) + ($CO3_PO2 * $CO3) + ($CO4_PO2 * $CO4) + ($CO5_PO2 * $CO5) + ($CO6_PO2 * $CO6) + ($CO7_PO2 * $CO7))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2) + ($CO3_PO3 * $CO3) + ($CO4_PO3 * $CO4) + ($CO5_PO3 * $CO5) + ($CO6_PO3 * $CO6) + ($CO7_PO3 * $CO7))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2) + ($CO3_PO4 * $CO3) + ($CO4_PO4 * $CO4) + ($CO5_PO4 * $CO5) + ($CO6_PO4 * $CO6) + ($CO7_PO4 * $CO7))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2) + ($CO3_PO5 * $CO3) + ($CO4_PO5 * $CO4) + ($CO5_PO5 * $CO5) + ($CO6_PO5 * $CO6) + ($CO7_PO5 * $CO7))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2) + ($CO3_PO6 * $CO3) + ($CO4_PO6 * $CO4) + ($CO5_PO6 * $CO5) + ($CO6_PO6 * $CO6) + ($CO7_PO6 * $CO7))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2) + ($CO3_PO7 * $CO3) + ($CO4_PO7 * $CO4) + ($CO5_PO7 * $CO5) + ($CO6_PO7 * $CO6) + ($CO7_PO7 * $CO7))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2) + ($CO3_PO8 * $CO3) + ($CO4_PO8 * $CO4) + ($CO5_PO8 * $CO5) + ($CO6_PO8 * $CO6) + ($CO7_PO8 * $CO7))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2) + ($CO3_PO9 * $CO3) + ($CO4_PO9 * $CO4) + ($CO5_PO9 * $CO5) + ($CO6_PO9 * $CO6) + ($CO7_PO9 * $CO7))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2) + ($CO3_PO10 * $CO3) + ($CO4_PO10 * $CO4) + ($CO5_PO10 * $CO5) + ($CO6_PO10 * $CO6) + ($CO7_PO10 * $CO7))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2) + ($CO3_PO11 * $CO3) + ($CO4_PO11 * $CO4) + ($CO5_PO11 * $CO5) + ($CO6_PO11 * $CO6) + ($CO7_PO11 * $CO7))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2) + ($CO3_PO12 * $CO3) + ($CO4_PO12 * $CO4) + ($CO5_PO12 * $CO5) + ($CO6_PO12 * $CO6) + ($CO7_PO12 * $CO7))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2) + ($CO3_PSO1 * $CO3) + ($CO4_PSO1 * $CO4) + ($CO5_PSO1 * $CO5) + ($CO6_PSO1 * $CO6) + ($CO7_PSO1 * $CO7))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2) + ($CO3_PSO2 * $CO3) + ($CO4_PSO2 * $CO4) + ($CO5_PSO2 * $CO5) + ($CO6_PSO2 * $CO6) + ($CO7_PSO2 * $CO7))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2) + ($CO3_PSO3 * $CO3) + ($CO4_PSO3 * $CO4) + ($CO5_PSO3 * $CO5) + ($CO6_PSO3 * $CO6) + ($CO7_PSO3 * $CO7))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2) + ($CO3_PSO4 * $CO3) + ($CO4_PSO4 * $CO4) + ($CO5_PSO4 * $CO5) + ($CO6_PSO4 * $CO6) + ($CO7_PSO4 * $CO7))/$PSO4_SUM;
                }

            }
            if($co_num == 6){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1 + $CO3_PO1 + $CO4_PO1 + $CO5_PO1 + $CO6_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2 + $CO3_PO2 + $CO4_PO2 + $CO5_PO2 + $CO6_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3 + $CO3_PO3 + $CO4_PO3 + $CO5_PO3 + $CO6_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4 + $CO3_PO4 + $CO4_PO4 + $CO5_PO4 + $CO6_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5 + $CO3_PO5 + $CO4_PO5 + $CO5_PO5 + $CO6_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6 + $CO3_PO6 + $CO4_PO6 + $CO5_PO6 + $CO6_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7 + $CO3_PO7 + $CO4_PO7 + $CO5_PO7 + $CO6_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8 + $CO3_PO8 + $CO4_PO8 + $CO5_PO8 + $CO6_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9 + $CO3_PO9 + $CO4_PO9 + $CO5_PO9 + $CO6_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10 + $CO3_PO10 + $CO4_PO10 + $CO5_PO10 + $CO6_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11 + $CO3_PO11 + $CO4_PO11 + $CO5_PO11 + $CO6_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12 + $CO3_PO12 + $CO4_PO12 + $CO5_PO12 + $CO6_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1 + $CO3_PSO1 + $CO4_PSO1 + $CO5_PSO1 + $CO6_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2 + $CO3_PSO2 + $CO4_PSO2 + $CO5_PSO2 + $CO6_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3 + $CO3_PSO3 + $CO4_PSO3 + $CO5_PSO3 + $CO6_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4 + $CO3_PSO4 + $CO4_PSO4 + $CO5_PSO4 + $CO6_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2) + ($CO3_PO1 * $CO3) + ($CO4_PO1 * $CO4) + ($CO5_PO1 * $CO5) + ($CO6_PO1 * $CO6))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2) + ($CO3_PO2 * $CO3) + ($CO4_PO2 * $CO4) + ($CO5_PO2 * $CO5) + ($CO6_PO2 * $CO6))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2) + ($CO3_PO3 * $CO3) + ($CO4_PO3 * $CO4) + ($CO5_PO3 * $CO5) + ($CO6_PO3 * $CO6))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2) + ($CO3_PO4 * $CO3) + ($CO4_PO4 * $CO4) + ($CO5_PO4 * $CO5) + ($CO6_PO4 * $CO6))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2) + ($CO3_PO5 * $CO3) + ($CO4_PO5 * $CO4) + ($CO5_PO5 * $CO5) + ($CO6_PO5 * $CO6))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2) + ($CO3_PO6 * $CO3) + ($CO4_PO6 * $CO4) + ($CO5_PO6 * $CO5) + ($CO6_PO6 * $CO6))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2) + ($CO3_PO7 * $CO3) + ($CO4_PO7 * $CO4) + ($CO5_PO7 * $CO5) + ($CO6_PO7 * $CO6))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2) + ($CO3_PO8 * $CO3) + ($CO4_PO8 * $CO4) + ($CO5_PO8 * $CO5) + ($CO6_PO8 * $CO6))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2) + ($CO3_PO9 * $CO3) + ($CO4_PO9 * $CO4) + ($CO5_PO9 * $CO5) + ($CO6_PO9 * $CO6))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2) + ($CO3_PO10 * $CO3) + ($CO4_PO10 * $CO4) + ($CO5_PO10 * $CO5) + ($CO6_PO10 * $CO6))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2) + ($CO3_PO11 * $CO3) + ($CO4_PO11 * $CO4) + ($CO5_PO11 * $CO5) + ($CO6_PO11 * $CO6))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2) + ($CO3_PO12 * $CO3) + ($CO4_PO12 * $CO4) + ($CO5_PO12 * $CO5) + ($CO6_PO12 * $CO6))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2) + ($CO3_PSO1 * $CO3) + ($CO4_PSO1 * $CO4) + ($CO5_PSO1 * $CO5) + ($CO6_PSO1 * $CO6))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2) + ($CO3_PSO2 * $CO3) + ($CO4_PSO2 * $CO4) + ($CO5_PSO2 * $CO5) + ($CO6_PSO2 * $CO6))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2) + ($CO3_PSO3 * $CO3) + ($CO4_PSO3 * $CO4) + ($CO5_PSO3 * $CO5) + ($CO6_PSO3 * $CO6))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2) + ($CO3_PSO4 * $CO3) + ($CO4_PSO4 * $CO4) + ($CO5_PSO4 * $CO5) + ($CO6_PSO4 * $CO6))/$PSO4_SUM;
                }

            }
            if($co_num == 5){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1 + $CO3_PO1 + $CO4_PO1 + $CO5_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2 + $CO3_PO2 + $CO4_PO2 + $CO5_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3 + $CO3_PO3 + $CO4_PO3 + $CO5_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4 + $CO3_PO4 + $CO4_PO4 + $CO5_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5 + $CO3_PO5 + $CO4_PO5 + $CO5_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6 + $CO3_PO6 + $CO4_PO6 + $CO5_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7 + $CO3_PO7 + $CO4_PO7 + $CO5_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8 + $CO3_PO8 + $CO4_PO8 + $CO5_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9 + $CO3_PO9 + $CO4_PO9 + $CO5_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10 + $CO3_PO10 + $CO4_PO10 + $CO5_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11 + $CO3_PO11 + $CO4_PO11 + $CO5_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12 + $CO3_PO12 + $CO4_PO12 + $CO5_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1 + $CO3_PSO1 + $CO4_PSO1 + $CO5_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2 + $CO3_PSO2 + $CO4_PSO2 + $CO5_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3 + $CO3_PSO3 + $CO4_PSO3 + $CO5_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4 + $CO3_PSO4 + $CO4_PSO4 + $CO5_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2) + ($CO3_PO1 * $CO3) + ($CO4_PO1 * $CO4) + ($CO5_PO1 * $CO5))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2) + ($CO3_PO2 * $CO3) + ($CO4_PO2 * $CO4) + ($CO5_PO2 * $CO5))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2) + ($CO3_PO3 * $CO3) + ($CO4_PO3 * $CO4) + ($CO5_PO3 * $CO5))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2) + ($CO3_PO4 * $CO3) + ($CO4_PO4 * $CO4) + ($CO5_PO4 * $CO5))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2) + ($CO3_PO5 * $CO3) + ($CO4_PO5 * $CO4) + ($CO5_PO5 * $CO5))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2) + ($CO3_PO6 * $CO3) + ($CO4_PO6 * $CO4) + ($CO5_PO6 * $CO5))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2) + ($CO3_PO7 * $CO3) + ($CO4_PO7 * $CO4) + ($CO5_PO7 * $CO5))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2) + ($CO3_PO8 * $CO3) + ($CO4_PO8 * $CO4) + ($CO5_PO8 * $CO5))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2) + ($CO3_PO9 * $CO3) + ($CO4_PO9 * $CO4) + ($CO5_PO9 * $CO5))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2) + ($CO3_PO10 * $CO3) + ($CO4_PO10 * $CO4) + ($CO5_PO10 * $CO5))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2) + ($CO3_PO11 * $CO3) + ($CO4_PO11 * $CO4) + ($CO5_PO11 * $CO5))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2) + ($CO3_PO12 * $CO3) + ($CO4_PO12 * $CO4) + ($CO5_PO12 * $CO5))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2) + ($CO3_PSO1 * $CO3) + ($CO4_PSO1 * $CO4) + ($CO5_PSO1 * $CO5))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2) + ($CO3_PSO2 * $CO3) + ($CO4_PSO2 * $CO4) + ($CO5_PSO2 * $CO5))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2) + ($CO3_PSO3 * $CO3) + ($CO4_PSO3 * $CO4) + ($CO5_PSO3 * $CO5))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2) + ($CO3_PSO4 * $CO3) + ($CO4_PSO4 * $CO4) + ($CO5_PSO4 * $CO5))/$PSO4_SUM;
                }

            }
            if($co_num == 4){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1 + $CO3_PO1 + $CO4_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2 + $CO3_PO2 + $CO4_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3 + $CO3_PO3 + $CO4_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4 + $CO3_PO4 + $CO4_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5 + $CO3_PO5 + $CO4_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6 + $CO3_PO6 + $CO4_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7 + $CO3_PO7 + $CO4_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8 + $CO3_PO8 + $CO4_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9 + $CO3_PO9 + $CO4_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10 + $CO3_PO10 + $CO4_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11 + $CO3_PO11 + $CO4_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12 + $CO3_PO12 + $CO4_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1 + $CO3_PSO1 + $CO4_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2 + $CO3_PSO2 + $CO4_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3 + $CO3_PSO3 + $CO4_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4 + $CO3_PSO4 + $CO4_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2) + ($CO3_PO1 * $CO3) + ($CO4_PO1 * $CO4))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2) + ($CO3_PO2 * $CO3) + ($CO4_PO2 * $CO4))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2) + ($CO3_PO3 * $CO3) + ($CO4_PO3 * $CO4))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2) + ($CO3_PO4 * $CO3) + ($CO4_PO4 * $CO4))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2) + ($CO3_PO5 * $CO3) + ($CO4_PO5 * $CO4))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2) + ($CO3_PO6 * $CO3) + ($CO4_PO6 * $CO4))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2) + ($CO3_PO7 * $CO3) + ($CO4_PO7 * $CO4))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2) + ($CO3_PO8 * $CO3) + ($CO4_PO8 * $CO4))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2) + ($CO3_PO9 * $CO3) + ($CO4_PO9 * $CO4))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2) + ($CO3_PO10 * $CO3) + ($CO4_PO10 * $CO4))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2) + ($CO3_PO11 * $CO3) + ($CO4_PO11 * $CO4))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2) + ($CO3_PO12 * $CO3) + ($CO4_PO12 * $CO4))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2) + ($CO3_PSO1 * $CO3) + ($CO4_PSO1 * $CO4))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2) + ($CO3_PSO2 * $CO3) + ($CO4_PSO2 * $CO4))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2) + ($CO3_PSO3 * $CO3) + ($CO4_PSO3 * $CO4))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2) + ($CO3_PSO4 * $CO3) + ($CO4_PSO4 * $CO4))/$PSO4_SUM;
                }

            }
            if($co_num == 3){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1 + $CO3_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2 + $CO3_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3 + $CO3_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4 + $CO3_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5 + $CO3_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6 + $CO3_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7 + $CO3_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8 + $CO3_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9 + $CO3_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10 + $CO3_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11 + $CO3_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12 + $CO3_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1 + $CO3_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2 + $CO3_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3 + $CO3_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4 + $CO3_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2) + ($CO3_PO1 * $CO3))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2) + ($CO3_PO2 * $CO3))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2) + ($CO3_PO3 * $CO3))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2) + ($CO3_PO4 * $CO3))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2) + ($CO3_PO5 * $CO3))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2) + ($CO3_PO6 * $CO3))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2) + ($CO3_PO7 * $CO3))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2) + ($CO3_PO8 * $CO3))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2) + ($CO3_PO9 * $CO3))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2) + ($CO3_PO10 * $CO3))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2) + ($CO3_PO11 * $CO3))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2) + ($CO3_PO12 * $CO3))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2) + ($CO3_PSO1 * $CO3))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2) + ($CO3_PSO2 * $CO3))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2) + ($CO3_PSO3 * $CO3))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2) + ($CO3_PSO4 * $CO3))/$PSO4_SUM;
                }

            }
            if($co_num == 2){
                $PO1_SUM = ($CO1_PO1 + $CO2_PO1);
                $PO2_SUM = ($CO1_PO2 + $CO2_PO2);
                $PO3_SUM = ($CO1_PO3 + $CO2_PO3);
                $PO4_SUM = ($CO1_PO4 + $CO2_PO4);
                $PO5_SUM = ($CO1_PO5 + $CO2_PO5);
                $PO6_SUM = ($CO1_PO6 + $CO2_PO6);
                $PO7_SUM = ($CO1_PO7 + $CO2_PO7);
                $PO8_SUM = ($CO1_PO8 + $CO2_PO8);
                $PO9_SUM = ($CO1_PO9 + $CO2_PO9);
                $PO10_SUM = ($CO1_PO10 + $CO2_PO10);
                $PO11_SUM = ($CO1_PO11 + $CO2_PO11);
                $PO12_SUM = ($CO1_PO12 + $CO2_PO12);
                $PSO1_SUM = ($CO1_PSO1 + $CO2_PSO1);
                $PSO2_SUM = ($CO1_PSO2 + $CO2_PSO2);
                $PSO3_SUM = ($CO1_PSO3 + $CO2_PSO3);
                $PSO4_SUM = ($CO1_PSO4 + $CO2_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1) + ($CO2_PO1 *$CO2))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1) + ($CO2_PO2 *$CO2))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1) + ($CO2_PO3 *$CO2))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1) + ($CO2_PO4 *$CO2))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1) + ($CO2_PO5 *$CO2))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1) + ($CO2_PO6 *$CO2))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1) + ($CO2_PO7 *$CO2))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1) + ($CO2_PO8 *$CO2))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1) + ($CO2_PO9 *$CO2))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1) + ($CO2_PO10 *$CO2))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1) + ($CO2_PO11 *$CO2))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1) + ($CO2_PO12 *$CO2))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1) + ($CO2_PSO1 *$CO2))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1) + ($CO2_PSO2 *$CO2))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1) + ($CO2_PSO3 *$CO2))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1) + ($CO2_PSO4 *$CO2))/$PSO4_SUM;
                }

            }
            if($co_num == 1){
                $PO1_SUM = ($CO1_PO1);
                $PO2_SUM = ($CO1_PO2);
                $PO3_SUM = ($CO1_PO3);
                $PO4_SUM = ($CO1_PO4);
                $PO5_SUM = ($CO1_PO5);
                $PO6_SUM = ($CO1_PO6);
                $PO7_SUM = ($CO1_PO7);
                $PO8_SUM = ($CO1_PO8);
                $PO9_SUM = ($CO1_PO9);
                $PO10_SUM = ($CO1_PO10);
                $PO11_SUM = ($CO1_PO11);
                $PO12_SUM = ($CO1_PO12);
                $PSO1_SUM = ($CO1_PSO1);
                $PSO2_SUM = ($CO1_PSO2);
                $PSO3_SUM = ($CO1_PSO3);
                $PSO4_SUM = ($CO1_PSO4);
                if($PO1_SUM == 0){
                    $PO1 = 0;
                }else{
                    $PO1 = (($CO1_PO1 * $CO1))/$PO1_SUM;
                }
                if($PO2_SUM == 0){
                    $PO2 = 0;
                }else{
                    $PO2 = (($CO1_PO2 * $CO1))/$PO2_SUM;
                }
                if($PO3_SUM == 0){
                    $PO3 = 0;
                }else{
                    $PO3 = (($CO1_PO3 * $CO1))/$PO3_SUM;
                }
                if($PO4_SUM == 0){
                    $PO4 = 0;
                }else{
                    $PO4 = (($CO1_PO4 * $CO1))/$PO4_SUM;
                }
                if($PO5_SUM == 0){
                    $PO5 = 0;
                }else{
                    $PO5 = (($CO1_PO5 * $CO1))/$PO5_SUM;
                }
                if($PO6_SUM == 0){
                    $PO6 = 0;
                }else{
                    $PO6 = (($CO1_PO6 * $CO1))/$PO6_SUM;
                }
                if($PO7_SUM == 0){
                    $PO7 = 0;
                }else{
                    $PO7 = (($CO1_PO7 * $CO1))/$PO7_SUM;
                }
                if($PO8_SUM == 0){
                    $PO8 = 0;
                }else{
                    $PO8 = (($CO1_PO8 * $CO1))/$PO8_SUM;
                }
                if($PO9_SUM == 0){
                    $PO9 =0;
                }else{
                    $PO9 = (($CO1_PO9 * $CO1))/$PO9_SUM;
                }
                if($PO10_SUM == 0){
                    $PO10 = 0;
                }else{
                    $PO10 = (($CO1_PO10 * $CO1))/$PO10_SUM;
                }
                if($PO11_SUM == 0){
                    $PO11 = 0;
                }else{
                    $PO11 = (($CO1_PO11 * $CO1))/$PO11_SUM;
                }
                if($PO12_SUM == 0){
                    $PO12 = 0;
                }else{
                    $PO12 = (($CO1_PO12 * $CO1))/$PO12_SUM;
                }
                if($PSO1_SUM == 0){
                    $PSO1 = 0;
                }else{
                    $PSO1 = (($CO1_PSO1 * $CO1))/$PSO1_SUM;
                }
                if($PSO2_SUM == 0){
                    $PSO2 = 0;
                }else{
                    $PSO2 = (($CO1_PSO2 * $CO1))/$PSO2_SUM;
                }
                if($PSO3_SUM == 0){
                    $PSO3 = 0;
                }else{
                    $PSO3 = (($CO1_PSO3 * $CO1))/$PSO3_SUM;
                }
                if($PSO4_SUM == 0){
                    $PSO4 = 0;
                }else{
                    $PSO4 = (($CO1_PSO4 * $CO1))/$PSO4_SUM;
                }

            }
            $PO1 = round($PO1);
            $PO2 = round($PO2);
            $PO3 = round($PO3);
            $PO4 = round($PO4);
            $PO5 = round($PO5);
            $PO6 = round($PO6);
            $PO7 = round($PO7);
            $PO8 = round($PO8);
            $PO9 = round($PO9);
            $PO10 = round($PO10);
            $PO11 = round($PO11);
            $PO12 = round($PO12);
            $PSO1 = round($PSO1);
            $PSO2 = round($PSO2);
            $PSO3 = round($PSO3);
            $PSO4 = round($PSO4);

            echo '<div class="ia-form-container">';
echo '<div class="form-header">';
echo '<h2 class="form-title">Attainment Results</h2>';
echo '<div class="subject-info">';
echo '<span class="subject-label">Assessment Summary</span>';
echo '</div>';
echo '</div>';

echo '<div class="ia-main-form">';

// PO Attainment Table
echo '<div class="ia-section">';
echo '<div class="section-header">';
echo '<h3 class="section-title">Program Outcomes</h3>';
echo '<div class="section-divider"></div>';
echo '</div>';

echo '<div class="question-card">';
echo '<div class="question-header">';
echo '<h4 class="question-title">PO Attainment Results</h4>';
echo '</div>';
echo '<div class="question-content">';

echo '<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">';
echo '<tr style="background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">Program Outcome (PO)</th>';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">PO Attainment</th>';
echo '</tr>';

$po_outcomes = [
    'PO1' => $PO1, 'PO2' => $PO2, 'PO3' => $PO3, 'PO4' => $PO4,
    'PO5' => $PO5, 'PO6' => $PO6, 'PO7' => $PO7, 'PO8' => $PO8,
    'PO9' => $PO9, 'PO10' => $PO10, 'PO11' => $PO11, 'PO12' => $PO12
];

$row_count = 0;
foreach($po_outcomes as $po => $value) {
    $row_color = ($row_count % 2 == 0) ? '#f8f9fa' : 'white';
    echo '<tr style="background: ' . $row_color . ';">';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600; background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">' . $po . '</td>';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-size: 1.1rem; font-weight: 500;">' . $value . '</td>';
    echo '</tr>';
    $row_count++;
}
echo '</table>';
echo '</div></div></div>';

// PSO Attainment Table
echo '<div class="ia-section">';
echo '<div class="section-header">';
echo '<h3 class="section-title">Program Specific Outcomes</h3>';
echo '<div class="section-divider"></div>';
echo '</div>';

echo '<div class="question-card">';
echo '<div class="question-header">';
echo '<h4 class="question-title">PSO Attainment Results</h4>';
echo '</div>';
echo '<div class="question-content">';

echo '<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">';
echo '<tr style="background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">Program Specific Outcome (PSO)</th>';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">PSO Attainment</th>';
echo '</tr>';

$pso_outcomes = [
    'PSO1' => $PSO1, 'PSO2' => $PSO2, 'PSO3' => $PSO3, 'PSO4' => $PSO4
];

$row_count = 0;
foreach($pso_outcomes as $pso => $value) {
    $row_color = ($row_count % 2 == 0) ? '#f8f9fa' : 'white';
    echo '<tr style="background: ' . $row_color . ';">';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600; background: linear-gradient(135deg, #20b2aa, #4682b4); color: white;">' . $pso . '</td>';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-size: 1.1rem; font-weight: 500;">' . $value . '</td>';
    echo '</tr>';
    $row_count++;
}
echo '</table>';
echo '</div></div></div>';

// CO Attainment Table
echo '<div class="ia-section">';
echo '<div class="section-header">';
echo '<h3 class="section-title">Course Outcomes</h3>';
echo '<div class="section-divider"></div>';
echo '</div>';

echo '<div class="question-card">';
echo '<div class="question-header">';
echo '<h4 class="question-title">CO Attainment Results</h4>';
echo '</div>';
echo '<div class="question-content">';

echo '<table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">';
echo '<tr style="background: linear-gradient(135deg, #87ceeb, #4682b4); color: white;">';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">Course Outcome (CO)</th>';
echo '<th style="padding: 15px; border: 1px solid #ddd; text-align: center; font-weight: 600; font-size: 1.1rem;">CO Attainment</th>';
echo '</tr>';

$co_outcomes = [
    'CO1' => $CO1, 'CO2' => $CO2, 'CO3' => $CO3, 'CO4' => $CO4,
    'CO5' => $CO5, 'CO6' => $CO6, 'CO7' => $CO7
];

$row_count = 0;
foreach($co_outcomes as $co => $value) {
    $row_color = ($row_count % 2 == 0) ? '#f8f9fa' : 'white';
    echo '<tr style="background: ' . $row_color . ';">';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-weight: 600; background: linear-gradient(135deg, #ff6b6b, #ee5a6f); color: white;">' . $co . '</td>';
    echo '<td style="padding: 12px; border: 1px solid #ddd; text-align: center; font-size: 1.1rem; font-weight: 500;">' . $value . '</td>';
    echo '</tr>';
    $row_count++;
}
echo '</table>';
echo '</div></div></div>';

echo '</div>'; // Close ia-main-form
echo '</div>'; 

        }
    ?>
</body>
</html>

<?php 

    if(isset($_POST['logout'])){
        $_SESSION['username'] = null;
        $_SESSION['password'] = null;
        $_SESSION['semister'] = null;
       if(empty($_SESSION['adminname']) && empty($_SESSION['adminpassword']) && empty($_SESSION['semisters'])){
        session_destroy();
        header("Location:login.php");
    }
    }  

?>