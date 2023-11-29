<?php
include("header.php");
// Checking is User Logged In
if(isset($_SESSION['authentication']))
{
  ?>
  <h3 class="mt-2 col-6">Contest 5 years, target: 10% </h3>
  <div class="text-center">
    <button type="button" class="btn btn-success col-2 mb-3" onClick="window.location.reload();">Try Again</button>
  </div>
  <div class="row">
    <table border="1" class="table table-striped table-dark">
        <thead>
          <tr style="text-align: left;">
            <th class="header">Ticker</th>
            <th class="header">Avg Days</th>
            <th class="header">Annual Yield</th>
            <th class="header">Open Orders</th>
          </tr>
        </thead>
        <tbody>
  <?php
  include('contest-aux.php');
  $ticker  = array("aapl","msft","spy");
  $openOrders = array();
  foreach ($ticker as $key => $value) {
    $dic = contest("db/" . $value . ".json");
    echo "<tr>";
    echo "<td>" . strtoupper($value) . "</td>" . "\n" .
    "<td>" . $dic['avgdays'] . "</td>" . "\n" . 
    "<td>" . $dic['annualYield'] . "</td>" . "\n" . 
    "<td>" . count($dic['openOrders']) . "</td>" . "\n";
    echo "</tr>";
    $a = array("ticker" => $value, 
              "data" => $dic['openOrders']);
    
    array_push($openOrders, $a);
  }
  ?>
  </tbody>
  </table>

  <div class="alert alert-danger">
    <p><strong>Open Orders</strong> </p>
    <?php
    foreach($openOrders as $key => $value) {
      echo strtoupper($value['ticker']) . ": ";
      if(count($value['data']) == 0) {
        echo "No Open Orders";
      }else{
        foreach($value["data"] as $key => $item){
          echo "<br>";
          echo $item['dateOpen'] . " $" . $item['open'];
        }
        echo "<br>";  
      }
      echo "<br>"; 
    }
    ?>
  </div>
  <?php
}
?>

<?php 
    if(!isset($_SESSION['authentication']))
    {
        ?>
        <a href="./login" class="btn btn-primary mt-3">LogIN</a>
        <?php
    }
?>

</div>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>