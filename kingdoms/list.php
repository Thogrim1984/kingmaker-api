<?php
/**
 * Returns the list of kingdoms.
 */
require '../connect.php';
    
$kingdoms = [];
$sql = "SELECT l_id, vc_name, i_bp, i_unrest, i_districts FROM kingdoms";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $kingdoms[$cr]['id']    = $row['l_id'];
    $kingdoms[$cr]['name'] = $row['vc_name'];
    $kingdoms[$cr]['bp'] = $row['i_bp'];
    $kingdoms[$cr]['unrest'] = $row['i_unrest'];
    $kingdoms[$cr]['districts'] = $row['i_districts'];
    $cr++;
  }
    
  echo json_encode(['data'=>$kingdoms]);
}
else
{
  http_response_code(404);
}