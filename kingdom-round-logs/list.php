<?php
/**
 * Returns the list of logEntry.
 */
require '../connect.php';
    
$logEntry = [];
$sql = "SELECT l_id, l_kingdom_id, i_year, i_month, i_phase, i_step, i_bp_changes, i_unrest_changes, i_district_changes, i_hexfield_changes, t_infos FROM kingdom_round_log";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $logEntry[$cr]['id']    = $row['l_id'];
    $logEntry[$cr]['kingdomId'] = $row['l_kingdom_id'];
    $logEntry[$cr]['year'] = $row['i_year'];
    $logEntry[$cr]['month'] = $row['i_month'];
    $logEntry[$cr]['phase'] = $row['i_phase'];
    $logEntry[$cr]['step']    = $row['i_step'];
    $logEntry[$cr]['bpChanges'] = $row['i_bp_changes'];
    $logEntry[$cr]['unrestChanges'] = $row['i_unrest_changes'];
    $logEntry[$cr]['districtChanges'] = $row['i_district_changes'];
    $logEntry[$cr]['hexfieldChanges'] = $row['i_hexfield_changes'];
    $logEntry[$cr]['infos'] = $row['t_infos'];
    $cr++;
  }
    
  echo json_encode(['data'=>$logEntry]);
}
else
{
  http_response_code(404);
}