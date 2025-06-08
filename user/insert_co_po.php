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
    <link rel="stylesheet" href="../static/css/user_op.css">
    <title>Num CO</title>
</head>
<body>
   <div class="form-container">
        <div class="input-section">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="co-number-form">
                <div class="form-group">
                    <label for="num_co" class="form-label">Number of COs:</label>
                    <input type="number" name="num_co" id="num_co" class="form-input" required min="0" max="7">
                </div>
                <button type="submit" name="codata" value="submit" class="submit-btn primary-btn">Get Table</button>
            </form>
        </div>

        <?php
            $sub = $_SESSION['username'];
            if(isset($_POST['codata'])){
                $numco = $_POST['num_co'];
                $_SESSION['num'] = $numco;
                
                echo '<div class="table-section">';
                echo '<form action="insert_co_po.php" method="post" class="co-po-form">';
                echo '<div class="table-container">';
                echo '<table class="co-po-table">';
                echo '<thead>';
                echo '<tr class="header-row">
                        <th class="co-header">CO\PO</th>
                        <th class="po-header">PO1</th>
                        <th class="po-header">PO2</th>
                        <th class="po-header">PO3</th>
                        <th class="po-header">PO4</th>
                        <th class="po-header">PO5</th>
                        <th class="po-header">PO6</th>
                        <th class="po-header">PO7</th>
                        <th class="po-header">PO8</th>
                        <th class="po-header">PO9</th>
                        <th class="po-header">PO10</th>
                        <th class="po-header">PO11</th>
                        <th class="po-header">PO12</th>
                        <th class="pso-header">PSO1</th>
                        <th class="pso-header">PSO2</th>
                        <th class="pso-header">PSO3</th>
                        <th class="pso-header">PSO4</th>
                      </tr>';
                echo '</thead>';
                echo '<tbody>';
                
                if($numco > 7){
                    $numco = 7;
                    $_SESSION['num'] = $numco;
                }
                if($numco < 0){
                    $numco = 0;
                    $_SESSION['num'] = $numco;
                }
                
                for($i = 1; $i <= $numco; $i++){
                    echo '<tr class="data-row">';
                    for($j = 0; $j <= 12; $j++){
                        if($j == 0){
                            echo '<td class="co-label">CO' . $i . '</td>';
                        } else {
                            echo '<td class="input-cell"><input type="number" name="co' . $i . '_po' . $j . '" class="mapping-input po-input" min="0" max="3"></td>';
                        }
                    }
                    for($j = 1; $j <= 4; $j++){
                        echo '<td class="input-cell"><input type="number" name="co' . $i . '_pso' . $j . '" class="mapping-input pso-input" min="0" max="3"></td>';
                    }
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                
                if($numco > 0){
                    echo '<div class="submit-section">';
                    echo '<button type="submit" name="update" value="value" class="submit-btn update-btn">Update Mapping</button>';
                    echo '</div>';
                }
                echo '</form>';
                echo '</div>';
            }
        echo '</div>';
        if(isset($_POST['update'])){
            $co1_po1 = 0;
            $co1_po2 = 0;
            $co1_po3 = 0;
            $co1_po4 = 0;
            $co1_po5 = 0;
            $co1_po6 = 0;
            $co1_po7 = 0;
            $co1_po8 = 0;
            $co1_po9 = 0;
            $co1_po10 = 0;
            $co1_po11 = 0;
            $co1_po12 = 0;
            $co1_pso1 = 0;
            $co1_pso2 = 0;
            $co1_pso3 = 0;
            $co1_pso4 = 0;
            if(!empty($_POST['co1_po1'])){
                $co1_po1 = $_POST['co1_po1']; 
            }
            if(!empty($_POST['co1_po2'])){
                $co1_po2 = $_POST['co1_po2']; 
            }
            if(!empty($_POST['co1_po3'])){
                $co1_po3 = $_POST['co1_po3']; 
            }
            if(!empty($_POST['co1_po4'])){
                $co1_po4 = $_POST['co1_po4']; 
            }
            if(!empty($_POST['co1_po5'])){
                $co1_po5 = $_POST['co1_po5']; 
            }
            if(!empty($_POST['co1_po6'])){
                $co1_po6 = $_POST['co1_po6']; 
            }
            if(!empty($_POST['co1_po7'])){
                $co1_po7 = $_POST['co1_po7']; 
            }
            if(!empty($_POST['co1_po8'])){
                $co1_po8 = $_POST['co1_po8']; 
            }
            if(!empty($_POST['co1_po9'])){
                $co1_po9 = $_POST['co1_po9']; 
            }
            if(!empty($_POST['co1_po10'])){
                $co1_po10 = $_POST['co1_po10']; 
            }
            if(!empty($_POST['co1_po11'])){
                $co1_po11 = $_POST['co1_po11']; 
            }
            if(!empty($_POST['co1_po12'])){
                $co1_po12 = $_POST['co1_po12']; 
            }
            if(!empty($_POST['co1_pso1'])){
                $co1_pso1 = $_POST['co1_pso1']; 
            }
            if(!empty($_POST['co1_pso2'])){
                $co1_pso2 = $_POST['co1_pso2']; 
            }
            if(!empty($_POST['co1_pso3'])){
                $co1_pso3 = $_POST['co1_pso3']; 
            }
            if(!empty($_POST['co1_pso4'])){
                $co1_pso4 = $_POST['co1_pso4']; 
            }

//co2
            $co2_po1 = 0;
            $co2_po2 = 0;
            $co2_po3 = 0;
            $co2_po4 = 0;
            $co2_po5 = 0;
            $co2_po6 = 0;
            $co2_po7 = 0;
            $co2_po8 = 0;
            $co2_po9 = 0;
            $co2_po10 = 0;
            $co2_po11 = 0;
            $co2_po12 = 0;
            $co2_pso1 = 0;
            $co2_pso2 = 0;
            $co2_pso3 = 0;
            $co2_pso4 = 0;
            if(!empty($_POST['co2_po1'])){
                $co2_po1 = $_POST['co2_po1']; 
            }
            if(!empty($_POST['co2_po2'])){
                $co2_po2 = $_POST['co2_po2']; 
            }
            if(!empty($_POST['co2_po3'])){
                $co2_po3 = $_POST['co2_po3']; 
            }
            if(!empty($_POST['co2_po4'])){
                $co2_po4 = $_POST['co2_po4']; 
            }
            if(!empty($_POST['co2_po5'])){
                $co2_po5 = $_POST['co2_po5']; 
            }
            if(!empty($_POST['co2_po6'])){
                $co2_po6 = $_POST['co2_po6']; 
            }
            if(!empty($_POST['co2_po7'])){
                $co2_po7 = $_POST['co2_po7']; 
            }
            if(!empty($_POST['co2_po8'])){
                $co2_po8 = $_POST['co2_po8']; 
            }
            if(!empty($_POST['co2_po9'])){
                $co2_po9 = $_POST['co2_po9']; 
            }
            if(!empty($_POST['co2_po10'])){
                $co2_po10 = $_POST['co2_po10']; 
            }
            if(!empty($_POST['co2_po11'])){
                $co2_po11 = $_POST['co2_po11']; 
            }
            if(!empty($_POST['co2_po12'])){
                $co2_po12 = $_POST['co2_po12']; 
            }
            if(!empty($_POST['co2_pso1'])){
                $co2_pso1 = $_POST['co2_pso1']; 
            }
            if(!empty($_POST['co2_pso2'])){
                $co2_pso2 = $_POST['co2_pso2']; 
            }
            if(!empty($_POST['co2_pso3'])){
                $co2_pso3 = $_POST['co2_pso3']; 
            }
            if(!empty($_POST['co2_pso4'])){
                $co2_pso4 = $_POST['co2_pso4']; 
            }
//co3
            $co3_po1 = 0;
            $co3_po2 = 0;
            $co3_po3 = 0;
            $co3_po4 = 0;
            $co3_po5 = 0;
            $co3_po6 = 0;
            $co3_po7 = 0;
            $co3_po8 = 0;
            $co3_po9 = 0;
            $co3_po10 = 0;
            $co3_po11 = 0;
            $co3_po12 = 0;
            $co3_pso1 = 0;
            $co3_pso2 = 0;
            $co3_pso3 = 0;
            $co3_pso4 = 0;
            if(!empty($_POST['co3_po1'])){
                $co3_po1 = $_POST['co3_po1']; 
            }
            if(!empty($_POST['co3_po2'])){
                $co3_po2 = $_POST['co3_po2']; 
            }
            if(!empty($_POST['co3_po3'])){
                $co3_po3 = $_POST['co3_po3']; 
            }
            if(!empty($_POST['co3_po4'])){
                $co3_po4 = $_POST['co3_po4']; 
            }
            if(!empty($_POST['co3_po5'])){
                $co3_po5 = $_POST['co3_po5']; 
            }
            if(!empty($_POST['co3_po6'])){
                $co3_po6 = $_POST['co3_po6']; 
            }
            if(!empty($_POST['co3_po7'])){
                $co3_po7 = $_POST['co3_po7']; 
            }
            if(!empty($_POST['co3_po8'])){
                $co3_po8 = $_POST['co3_po8']; 
            }
            if(!empty($_POST['co3_po9'])){
                $co3_po9 = $_POST['co3_po9']; 
            }
            if(!empty($_POST['co3_po10'])){
                $co3_po10 = $_POST['co3_po10']; 
            }
            if(!empty($_POST['co3_po11'])){
                $co3_po11 = $_POST['co3_po11']; 
            }
            if(!empty($_POST['co3_po12'])){
                $co3_po12 = $_POST['co3_po12']; 
            }
            if(!empty($_POST['co3_pso1'])){
                $co3_pso1 = $_POST['co3_pso1']; 
            }
            if(!empty($_POST['co3_pso2'])){
                $co3_pso2 = $_POST['co3_pso2']; 
            }
            if(!empty($_POST['co3_pso3'])){
                $co3_pso3 = $_POST['co3_pso3']; 
            }
            if(!empty($_POST['co3_pso4'])){
                $co3_pso4 = $_POST['co3_pso4']; 
            }
//co4
            $co4_po1 = 0;
            $co4_po2 = 0;
            $co4_po3 = 0;
            $co4_po4 = 0;
            $co4_po5 = 0;
            $co4_po6 = 0;
            $co4_po7 = 0;
            $co4_po8 = 0;
            $co4_po9 = 0;
            $co4_po10 = 0;
            $co4_po11 = 0;
            $co4_po12 = 0;
            $co4_pso1 = 0;
            $co4_pso2 = 0;
            $co4_pso3 = 0;
            $co4_pso4 = 0;
            if(!empty($_POST['co4_po1'])){
                $co4_po1 = $_POST['co4_po1']; 
            }
            if(!empty($_POST['co4_po2'])){
                $co4_po2 = $_POST['co4_po2']; 
            }
            if(!empty($_POST['co4_po3'])){
                $co4_po3 = $_POST['co4_po3']; 
            }
            if(!empty($_POST['co4_po4'])){
                $co4_po4 = $_POST['co4_po4']; 
            }
            if(!empty($_POST['co4_po5'])){
                $co4_po5 = $_POST['co4_po5']; 
            }
            if(!empty($_POST['co4_po6'])){
                $co4_po6 = $_POST['co4_po6']; 
            }
            if(!empty($_POST['co4_po7'])){
                $co4_po7 = $_POST['co4_po7']; 
            }
            if(!empty($_POST['co4_po8'])){
                $co4_po8 = $_POST['co4_po8']; 
            }
            if(!empty($_POST['co4_po9'])){
                $co4_po9 = $_POST['co4_po9']; 
            }
            if(!empty($_POST['co4_po10'])){
                $co4_po10 = $_POST['co4_po10']; 
            }
            if(!empty($_POST['co4_po11'])){
                $co4_po11 = $_POST['co4_po11']; 
            }
            if(!empty($_POST['co4_po12'])){
                $co4_po12 = $_POST['co4_po12']; 
            }
            if(!empty($_POST['co4_pso1'])){
                $co4_pso1 = $_POST['co4_pso1']; 
            }
            if(!empty($_POST['co4_pso2'])){
                $co4_pso2 = $_POST['co4_pso2']; 
            }
            if(!empty($_POST['co4_pso3'])){
                $co4_pso3 = $_POST['co4_pso3']; 
            }
            if(!empty($_POST['co4_pso4'])){
                $co4_pso4 = $_POST['co4_pso4']; 
            }
//co5
            $co5_po1 = 0;
            $co5_po2 = 0;
            $co5_po3 = 0;
            $co5_po4 = 0;
            $co5_po5 = 0;
            $co5_po6 = 0;
            $co5_po7 = 0;
            $co5_po8 = 0;
            $co5_po9 = 0;
            $co5_po10 = 0;
            $co5_po11 = 0;
            $co5_po12 = 0;
            $co5_pso1 = 0;
            $co5_pso2 = 0;
            $co5_pso3 = 0;
            $co5_pso4 = 0;
            if(!empty($_POST['co5_po1'])){
                $co5_po1 = $_POST['co5_po1']; 
            }
            if(!empty($_POST['co5_po2'])){
                $co5_po2 = $_POST['co5_po2']; 
            }
            if(!empty($_POST['co5_po3'])){
                $co5_po3 = $_POST['co5_po3']; 
            }
            if(!empty($_POST['co5_po4'])){
                $co5_po4 = $_POST['co5_po4']; 
            }
            if(!empty($_POST['co5_po5'])){
                $co5_po5 = $_POST['co5_po5']; 
            }
            if(!empty($_POST['co5_po6'])){
                $co5_po6 = $_POST['co5_po6']; 
            }
            if(!empty($_POST['co5_po7'])){
                $co5_po7 = $_POST['co5_po7']; 
            }
            if(!empty($_POST['co5_po8'])){
                $co5_po8 = $_POST['co5_po8']; 
            }
            if(!empty($_POST['co5_po9'])){
                $co5_po9 = $_POST['co5_po9']; 
            }
            if(!empty($_POST['co5_po10'])){
                $co5_po10 = $_POST['co5_po10']; 
            }
            if(!empty($_POST['co5_po11'])){
                $co5_po11 = $_POST['co5_po11']; 
            }
            if(!empty($_POST['co5_po12'])){
                $co5_po12 = $_POST['co5_po12']; 
            }
            if(!empty($_POST['co5_pso1'])){
                $co5_pso1 = $_POST['co5_pso1']; 
            }
            if(!empty($_POST['co5_pso2'])){
                $co5_pso2 = $_POST['co5_pso2']; 
            }
            if(!empty($_POST['co5_pso3'])){
                $co5_pso3 = $_POST['co5_pso3']; 
            }
            if(!empty($_POST['co5_pso4'])){
                $co5_pso4 = $_POST['co5_pso4']; 
            }
//co6
            $co6_po1 = 0;
            $co6_po2 = 0;
            $co6_po3 = 0;
            $co6_po4 = 0;
            $co6_po5 = 0;
            $co6_po6 = 0;
            $co6_po7 = 0;
            $co6_po8 = 0;
            $co6_po9 = 0;
            $co6_po10 = 0;
            $co6_po11 = 0;
            $co6_po12 = 0;
            $co6_pso1 = 0;
            $co6_pso2 = 0;
            $co6_pso3 = 0;
            $co6_pso4 = 0;
            if(!empty($_POST['co6_po1'])){
                $co6_po1 = $_POST['co6_po1']; 
            }
            if(!empty($_POST['co6_po2'])){
                $co6_po2 = $_POST['co6_po2']; 
            }
            if(!empty($_POST['co6_po3'])){
                $co6_po3 = $_POST['co6_po3']; 
            }
            if(!empty($_POST['co6_po4'])){
                $co6_po4 = $_POST['co6_po4']; 
            }
            if(!empty($_POST['co6_po5'])){
                $co6_po5 = $_POST['co6_po5']; 
            }
            if(!empty($_POST['co6_po6'])){
                $co6_po6 = $_POST['co6_po6']; 
            }
            if(!empty($_POST['co6_po7'])){
                $co6_po7 = $_POST['co6_po7']; 
            }
            if(!empty($_POST['co6_po8'])){
                $co6_po8 = $_POST['co6_po8']; 
            }
            if(!empty($_POST['co6_po9'])){
                $co6_po9 = $_POST['co6_po9']; 
            }
            if(!empty($_POST['co6_po10'])){
                $co6_po10 = $_POST['co6_po10']; 
            }
            if(!empty($_POST['co6_po11'])){
                $co6_po11 = $_POST['co6_po11']; 
            }
            if(!empty($_POST['co6_po12'])){
                $co6_po12 = $_POST['co6_po12']; 
            }
            if(!empty($_POST['co6_pso1'])){
                $co6_pso1 = $_POST['co6_pso1']; 
            }
            if(!empty($_POST['co6_pso2'])){
                $co6_pso2 = $_POST['co6_pso2']; 
            }
            if(!empty($_POST['co6_pso3'])){
                $co6_pso3 = $_POST['co6_pso3']; 
            }
            if(!empty($_POST['co6_pso4'])){
                $co6_pso4 = $_POST['co6_pso4']; 
            }
//co7
            $co7_po1 = 0;
            $co7_po2 = 0;
            $co7_po3 = 0;
            $co7_po4 = 0;
            $co7_po5 = 0;
            $co7_po6 = 0;
            $co7_po7 = 0;
            $co7_po8 = 0;
            $co7_po9 = 0;
            $co7_po10 = 0;
            $co7_po11 = 0;
            $co7_po12 = 0;
            $co7_pso1 = 0;
            $co7_pso2 = 0;
            $co7_pso3 = 0;
            $co7_pso4 = 0;
            if(!empty($_POST['co7_po1'])){
                $co7_po1 = $_POST['co7_po1']; 
            }
            if(!empty($_POST['co7_po2'])){
                $co7_po2 = $_POST['co7_po2']; 
            }
            if(!empty($_POST['co7_po3'])){
                $co7_po3 = $_POST['co7_po3']; 
            }
            if(!empty($_POST['co7_po4'])){
                $co7_po4 = $_POST['co7_po4']; 
            }
            if(!empty($_POST['co7_po5'])){
                $co7_po5 = $_POST['co7_po5']; 
            }
            if(!empty($_POST['co7_po6'])){
                $co7_po6 = $_POST['co7_po6']; 
            }
            if(!empty($_POST['co7_po7'])){
                $co7_po7 = $_POST['co7_po7']; 
            }
            if(!empty($_POST['co7_po8'])){
                $co7_po8 = $_POST['co7_po8']; 
            }
            if(!empty($_POST['co7_po9'])){
                $co7_po9 = $_POST['co7_po9']; 
            }
            if(!empty($_POST['co7_po10'])){
                $co7_po10 = $_POST['co7_po10']; 
            }
            if(!empty($_POST['co7_po11'])){
                $co7_po11 = $_POST['co7_po11']; 
            }
            if(!empty($_POST['co7_po12'])){
                $co7_po12 = $_POST['co7_po12']; 
            }
            if(!empty($_POST['co7_pso1'])){
                $co7_pso1 = $_POST['co7_pso1']; 
            }
            if(!empty($_POST['co7_pso2'])){
                $co7_pso2 = $_POST['co7_pso2']; 
            }
            if(!empty($_POST['co7_pso3'])){
                $co7_pso3 = $_POST['co7_pso3']; 
            }
            if(!empty($_POST['co7_pso4'])){
                $co7_pso4 = $_POST['co7_pso4']; 
            }
            $sql1 = "INSERT INTO co1 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co1_po1','$co1_po2','$co1_po3','$co1_po4','$co1_po5','$co1_po6','$co1_po7','$co1_po8','$co1_po9','$co1_po10','$co1_po11','$co1_po12','$co1_pso1','$co1_pso2','$co1_pso3','$co1_pso4')";
            $sql2 = "INSERT INTO co2 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co2_po1','$co2_po2','$co2_po3','$co2_po4','$co2_po5','$co2_po6','$co2_po7','$co2_po8','$co2_po9','$co2_po10','$co2_po11','$co2_po12','$co2_pso1','$co2_pso2','$co2_pso3','$co2_pso4')";
            $sql3 = "INSERT INTO co3 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co3_po1','$co3_po2','$co3_po3','$co3_po4','$co3_po5','$co3_po6','$co3_po7','$co3_po8','$co3_po9','$co3_po10','$co3_po11','$co3_po12','$co3_pso1','$co3_pso2','$co3_pso3','$co3_pso4')";
            $sql4 = "INSERT INTO co4 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co4_po1','$co4_po2','$co4_po3','$co4_po4','$co4_po5','$co4_po6','$co4_po7','$co4_po8','$co4_po9','$co4_po10','$co4_po11','$co4_po12','$co4_pso1','$co4_pso2','$co4_pso3','$co4_pso4')";
            $sql5 = "INSERT INTO co5 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co5_po1','$co5_po2','$co5_po3','$co5_po4','$co5_po5','$co5_po6','$co5_po7','$co5_po8','$co5_po9','$co5_po10','$co5_po11','$co5_po12','$co5_pso1','$co5_pso2','$co5_pso3','$co5_pso4')";
            $sql6 = "INSERT INTO co6 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co6_po1','$co6_po2','$co6_po3','$co6_po4','$co6_po5','$co6_po6','$co6_po7','$co6_po8','$co6_po9','$co6_po10','$co6_po11','$co6_po12','$co6_pso1','$co6_pso2','$co6_pso3','$co6_pso4')";
            $sql7 = "INSERT INTO co7 (subject, po1, po2, po3, po4, po5, po6, po7, po8, po9, po10, po11, po12, pso1, pso2, pso3, pso4) VALUES ('$sub','$co7_po1','$co7_po2','$co7_po3','$co7_po4','$co7_po5','$co7_po6','$co7_po7','$co7_po8','$co7_po9','$co7_po10','$co7_po11','$co7_po12','$co7_pso1','$co7_pso2','$co7_pso3','$co7_pso4')";
            
            $result1 = mysqli_query($conn, $sql1);
            $result2 = mysqli_query($conn, $sql2);
            $result3 = mysqli_query($conn, $sql3);
            $result4 = mysqli_query($conn, $sql4);
            $result5 = mysqli_query($conn, $sql5);
            $result6 = mysqli_query($conn, $sql6);
            $result7 = mysqli_query($conn, $sql7);

            $num = $_SESSION['num'];
            $sql_update = "INSERT INTO num_co (subject, number_co) VALUES('$sub','$num')";
            $result_update = mysqli_query($conn,$sql_update);
            header('location:mapping.php');
        }
                    
    ?>
</body>
</html>