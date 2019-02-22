<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php 
        $dates = array(
                    ['DOM_DD'=>0, 'DOM_MM'=>0, 'DOM_YY'=>0],
                    ['DOE_DD'=>0, 'DOE_MM'=>0, 'DOE_YY'=>0],
                    ['DOR_DD'=>0, 'DOR_MM'=>0, 'DOR_YY'=>0]
                    );

        // Form Processing
        if(isset($_POST['submit'])){
            for($i=0; $i<3; $i++){
                foreach($dates[$i] as $key=>$value){
                    $dates[$i][$key] = $_POST[$key];
                }
            }   
        }


    ?>
    <form action='index.php' method='post'>
    <table border=1 style='min-width:50pt'>
        <!-- Headers -->
        <tr>
            <th>Cateogry</th>
            <th>Day</th>
            <th>Month</th>
            <th>Year</th>
        </tr>
        
        
        <?php
            // <!-- Date of Manufactured row --> 
            $DOM_DD = $dates[0]['DOM_DD'];
            $DOM_MM = $dates[0]['DOM_MM'];
            $DOM_YY = $dates[0]['DOM_YY'];
            echo "<tr>";
            echo "<th>DOM</th>";
            echo "<th><input type='number' value=$DOM_DD name='DOM_DD' min=1 max=31></th>";
            echo "<th><input type='number' value=$DOM_MM name='DOM_MM' min=1 max=12></th>";
            echo "<th><input type='number' value=$DOM_YY name='DOM_YY' min=1000></th>";
            echo "</tr>";

            // <!-- Date of Expiry row -->
            $DOE_DD = $dates[1]['DOE_DD'];
            $DOE_MM = $dates[1]['DOE_MM'];
            $DOE_YY = $dates[1]['DOE_YY'];
            echo "<tr>";
            echo "<th>DOE</th>";
            echo "<th><input type='number' value=$DOE_DD name='DOE_DD' min=1 max=31></th>";
            echo "<th><input type='number' value=$DOE_MM name='DOE_MM' min=1 max=12></th>";
            echo "<th><input type='number' value=$DOE_YY name='DOE_YY' min=1000></th>";
            echo "</tr>";

            // <!-- Date of Recieved row -->
            $DOR_DD = $dates[2]['DOR_DD'];
            $DOR_MM = $dates[2]['DOR_MM'];
            $DOR_YY = $dates[2]['DOR_YY'];
            echo "<tr>";
            echo "<th>DOR</th>";
            echo "<th><input type='number' value=$DOR_DD name='DOR_DD' min=1 max=31></th>";
            echo "<th><input type='number' value=$DOR_MM name='DOR_MM' min=1 max=12></th>";
            echo "<th><input type='number' value=$DOR_YY name='DOR_YY' min=1000></th>";
            echo "</tr>";
        ?>
        
        <tr><th colspan=4><input type='submit' name='submit'></th></tr>
    </table>
        
    </form>

    <?php
                //Calculations
                $DOM = 0;
                $DOM += $dates[0]['DOM_DD'];
                $DOM += $dates[0]['DOM_MM']*30;
                $DOM += $dates[0]['DOM_YY']*365;
                // echo "<h1>DOM: $DOM</h1>";
        
                $DOE = 0;
                $DOE += $dates[1]['DOE_DD'];
                $DOE += $dates[1]['DOE_MM']*30;
                $DOE += $dates[1]['DOE_YY']*365;
                // echo "<h3>DOE: $DOE</h3>";
        
                $DOR = 0;
                $DOR += $dates[2]['DOR_DD'];
                $DOR += $dates[2]['DOR_MM']*30;
                $DOR += $dates[2]['DOR_YY']*365;
                // echo "<h1>DOR: $DOR</h1>";
        
                $total_shelfLife = $DOE - $DOM;
                echo "<h3>Total Shelf Life: $total_shelfLife Days</h3>";

                $shelfLife = $total_shelfLife - ($DOR - $DOM);
                echo "<h3>Shelf Life: $shelfLife Days</h3>";


        var_dump($dates);
    ?>
    
</body>
</html>