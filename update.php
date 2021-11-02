<?php
require 'connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);

    // Validate.

    if ((int)$request->data->id < 1 || trim($request->data->kingdom_name) == '' || (int)$request->data->unrest < 0 || (int)$request->data->districts < 1) {
        return http_response_code(400);
    }


    // Sanitize.
    $id    = mysqli_real_escape_string($con, (int)$request->data->id);
    $kingdom_name = mysqli_real_escape_string($con, trim($request->data->kingdom_name));
    $unrest = mysqli_real_escape_string($con, (int)$request->data->unrest);
    $bp = mysqli_real_escape_string($con, (int)$request->data->bp);
    $districts = mysqli_real_escape_string($con, (int)$request->data->districts);

    // Update.
    $sql = "UPDATE `base_values` SET `vc_kingdom_name`='$kingdom_name',`i_bp`='$bp',`i_unrest`='$unrest' ,`i_districts`='$districts'  WHERE `l_id` = '{$id}' LIMIT 1";

    if (mysqli_query($con, $sql)) {
        http_response_code(204);
    } else {
        return http_response_code(422);
    }
}