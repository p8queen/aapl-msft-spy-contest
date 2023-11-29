<?php
// Read JSON file
$json = file_get_contents($filename);

//Decode JSON
$data = json_decode($json, true);
$n =  count($data)-1;
$myarray = range(0,$n);
// choose number of random orders to load
$pm = array_rand($myarray,50);
$avgdays = array();
$openOrders = array();
foreach ($pm as $key => $value) {
  $dclose = new DateTime($data[$value]['dateClose']);
  $dopen = new DateTime($data[$value]['dateOpen']);
  $delta = $dopen->diff($dclose)->format('%a');
  $delta *= 1;
  if($delta>0){
    array_push($avgdays,$delta);
  }
}
$a = array_filter($avgdays);
$avg = array_sum($a) / count($a);
$avgdays = round($avg, 2);
$annualYield = (1+0.10)**(365/$avgdays) - 1;
$annualYield = round($annualYield*100, 2);
?>
<div id="avg" class="text-success bg-dark p-2 my-3 rounded fw-bold">Avg Days : 
<?php echo $avgdays . " annual yield : " . $annualYield; ?>
<button type="button" class="ms-5 btn btn-success" onClick="window.location.reload();">Try Again</button>
</div>
<table border="1" class="dataframe table table-striped table-dark">
  <thead>
    <tr style="text-align: left;">
      <th>Days</th>
      <th>RSI</th>
      <th>Open</th>
      <th>Price</th>
      <th>Close</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  foreach ($pm as $key => $value) {
    $dclose = new DateTime($data[$value]['dateClose']);
    $dopen = new DateTime($data[$value]['dateOpen']);
    $delta = $dopen->diff($dclose)->format('%a');
    
    if($delta*1>0){
      $row = "<tr>" . 
   "<td>". $delta . "</td>" . 
   "<td>". $data[$value]["rsi"] . "</td>" .
   "<td>". $data[$value]["dateOpen"] . "</td>" .
   "<td>". $data[$value]["open"] . "</td>" .
   "<td>". $data[$value]["dateClose"] . "</td>" .
   "<td>". $data[$value]["close"];
    echo $row;
    }
    if($delta*1==0){
      array_push($openOrders,$data[$value]);
    }
  }
  
?>
    
  </tbody>
</table>

<?php
$a = array_filter($openOrders);
if(count($a)>0) {
echo "<div class='alert alert-danger'>";
echo "Open Orders <br>";
foreach($openOrders as $key => $value) {
  echo $value["dateOpen"] . " $" . $value["open"] . 
  ", rsi: " . $value["rsi"] . "<br>"; 
 }
  echo "</div>";
}else{
  echo "<div class='alert alert-success'>";
  echo "No Open Orders";
  echo "</div>";}
?>
