<?php
/**
 * Returns the list of kingdoms.
 */
require '../connect.php';
    
$kingdoms = [];
$sql = "SELECT l_id, vc_name, i_bp, i_unrest, i_districts, i_hexfields, i_edict_holidays_tier, i_edict_promotion_tier, i_edict_taxation_tier FROM kingdoms";

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
    $kingdoms[$cr]['hexfields'] = $row['i_hexfields'];
    $kingdoms[$cr]['edictHolidaysTier'] = $row['i_edict_holidays_tier'];
    $kingdoms[$cr]['edictPromotionTier'] = $row['i_edict_promotion_tier'];
    $kingdoms[$cr]['edictTaxationTier'] = $row['i_edict_taxation_tier'];
    $cr++;
  }
    
  echo json_encode(['data'=>$kingdoms]);
}
else
{
  http_response_code(404);
}