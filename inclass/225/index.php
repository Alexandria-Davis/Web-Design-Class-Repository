<!DOCTYPE html>
<html lang="en">
    <head>
        
    </head>
    <body>
        <?php
            $n = 20943;
            $n = number_format($n,2);
            echo $n  . "<br><br>";
            
            $n = rand(5,15);   
            echo $n  . "<br><br>";
            
            $n = 0;
            for (;;)
            {
                $n++;
                if ($n > 7)
                {
                    break;
                }
            }
            echo $n  . "<br><br>";
            
            $n = "hElLo WoRlD!";
            echo strtoupper($n)  .  "<br><br>";

        ?>
        <hr></hr>
        <table>
            <?php $n = array(); $sum = 0; ?>
            <?php for ($i = 0; $i < 9; $i++): ?>
            <tr>
                <td> <?php 
                
                $j = rand()%1000;
                echo $j; 
                $n[$i] = $j;
                $sum+=$j;
                ?> </td>
                <td> <?php if ($j%2 == 0) { echo "Even"; } else {echo "Odd";} ?> </td>
            </tr>
                <?php endfor; ?>
            <tr><td>
                <?php
                echo "Sum: ".$sum;
                echo "</td></tr><tr><td>";
                echo "Average: ".$sum/9;?>
            </td></tr>
        </table>
        <hr></hr>
        <?php
        $weekdays = array();
        $weekdays[] = "M";
        $weekdays[] = "T";
        array_push($weekdays,"W");
        echo "Displaying values using var_dump:";
        var_dump($weekdays);
        echo "<br><br>";
        echo "Displaying values using print_r:";
        print_r($weekdays);
        ?>
        
        
        
    </body>

</html>