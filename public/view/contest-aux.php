<?php
function contest($filename)
{
  // Read JSON file
  $json = file_get_contents($filename);

  //Decode JSON
  $data = json_decode($json, true);
  $n =  count($data) - 1;
  $myarray = range(0, $n);
  // choose number of random orders to load
  $pm = array_rand($myarray, 50);
  $avgdays = array();
  $openOrders = array();
  foreach ($pm as $key => $value) {
    $dclose = new DateTime($data[$value]['dateClose']);
    $dopen = new DateTime($data[$value]['dateOpen']);
    $delta = $dopen->diff($dclose)->format('%a');
    $delta *= 1;
    if ($delta > 0) {
      array_push($avgdays, $delta);
    } else {
      array_push($openOrders, $data[$value]);
    }
  }
  $a = array_filter($avgdays);
  $avg = array_sum($a) / count($a);
  $avgdays = round($avg, 2);
  $annualYield = (1 + 0.10) ** (365 / $avgdays) - 1;
  $annualYield = round($annualYield * 100, 2);
  $dic = array(
    "avgdays" => $avgdays,
    "annualYield" => $annualYield,
    "openOrders" => $openOrders
  );
  return $dic;
}
