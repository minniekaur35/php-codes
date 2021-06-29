<!DOCTYPE html>
<html>
  <head>

    <title>Order Form</title>

    <style type="text/css">
        table thead, tfoot{
            font-weight: italic;
            background-color: ivory;
        }
        table {
            border-collapse: collapse;
            background-color: ivory;
        }
        table td, th {
            text-align: center;
            border: 1px solid #ddd;
            background-color: ivory;
            padding: 15px;
        }
        td:empty {
            border: 0;
            background-color: ivory;
        }

    </style>
  </head>
  <body>

    <h1>Order Form</h1>

    <?php

if (! isset($_POST["blissqty"]) ||
    ! isset($_POST["purpletouchqty"]) ||
    ! isset($_POST["rosesqty"]))
    {
    ?>

<form method="post" action="<?php print $_SERVER["PHP_SELF"]; ?>">

     <table>
       <thead>
           <tr>
    		 <td>Bouquet</td>
    		 <td>Quantity</td>
    	   </tr>
       </thead>
       <tbody>
    	   <tr>
    		 <td>Pure Bliss Bouquet  </td>
    		 <td><input type="number" name="blissqty" value="0" min="0" max="99" /></td>
    	   </tr>
    	   <tr>
    		 <td>A purple touch Bouquet </td>
    		 <td><input type="number" name="purpletouchqty" value="0" min="0" max="99" /></td>
    	   </tr>
    	   <tr>
    		 <td>Bouquet of Six Roses</td>
    		 <td><input type="number" name="rosesqty" value="0" min="0" max="99"/></td>
    	   </tr>
    	   <tr>
                <td>
                <input type="submit" value="Submit Order" name="submit" />
                </td>
    	   </tr>
       </tbody>
	 </table>
    </form>

    <?php

        } else {
    $blissqty = $_POST['blissqty'];
    $purpletouchqty = $_POST['purpletouchqty'];
    $rosesqty = $_POST['rosesqty'];

    define('Tax', 0.13);
    define('Bprice', 47.95);
    define('ptPrice', 52.95);
    define('rPrice', 38.95);

    $bRate = Bprice * $blissqty;
    $pRate = ptPrice * $purpletouchqty;
    $rRate = rPrice * $rosesqty;

    $subTot = $rRate + $pRate + $bRate;
    $taxAmount = round($subTot * Tax);

    $totalAmount = $subTot + $taxAmount;
   ?>
    <h2>Invoice</h2>
    <hr/>
     <table>
       <thead>
           <tr>
    		 <td>Bouquet</td>
    		 <td>Quantity</td>
             <td>Total</td>
    	   </tr>
       </thead>
       <tbody>
    	   <tr>
    		 <td>Pure Bliss Bouquet </td>

    		 <td><?php print "$blissqty"; ?></td>
             <td><?php  echo "$$bRate"; ?></td>

    	   </tr>
    	   <tr>
    		 <td>A purple touch Bouquet </td>

             <td><?php  print "$purpletouchqty";    ?></td>
             <td><?php  echo "$$pRate";    ?></td>

    	   </tr>
    	   <tr>
    		 <td>Bouquet of Six Roses</td>

    		 <td><?php print "$rosesqty";     ?></td>
             <td><?php   echo "$$rRate";   ?></td>

    	   </tr>
       </tbody>
       <tfoot>
            <tr>
              <td></td>
              <td>Subtotal:</td>

              <td><?php  print "$$subTot";    ?></td>

            </tr>
            <tr>
              <td></td>
              <td>Tax:</td>

              <td><?php  print "$$taxAmount";    ?></td>

            </tr>
            <tr>
              <td></td>
              <td>Grand Total:</td>

              <td><?php print "$$totalAmount";     ?></td>

            </tr>
       </tfoot>
	 </table>

     <hr />

<p>Today is <?php print date("l F dS, Y");  ?>. Your delivery is expected to arrive on: <?php
       $expected_Time = new DateTime('+5 day');
       print $expected_Time ->format("l F dS, Y") ;

    ?></p>

    <?php
        }
    ?>
  </body>
</html>
