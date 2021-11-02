<?php
/**
 * Returns the list of baseValues.
 */
require 'connect.php';
    
$baseValues = [];
$sql = "SELECT l_id, vc_kingdom_name, i_bp, i_unrest, i_districts FROM base_values";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $baseValues[$cr]['id']    = $row['l_id'];
    $baseValues[$cr]['kingdom_name'] = $row['vc_kingdom_name'];
    $baseValues[$cr]['bp'] = $row['i_bp'];
    $baseValues[$cr]['unrest'] = $row['i_unrest'];
    $baseValues[$cr]['districts'] = $row['i_districts'];
    $cr++;
  }
    
  echo json_encode(['data'=>$baseValues]);
}
else
{
  http_response_code(404);
}