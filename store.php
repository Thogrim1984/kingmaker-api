<?php
require 'connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (trim($request->data->kingdom_name) === '' || (int)$request->data->districts < 1 || (int)$request->data->unrest < 0) {
        return http_response_code(400);
    }

    // Sanitize.
    $kingdom_name = mysqli_real_escape_string($con, trim($request->data->kingdom_name));
    $bp = mysqli_real_escape_string($con, (int)$request->data->bp);
    $unrest = mysqli_real_escape_string($con, (int)$request->data->unrest);
    $districts = mysqli_real_escape_string($con, (int)$request->data->districts);


    // Store.
    $sql = "INSERT INTO `base_values`(`l_id`,`vc_kingdom_name`,`i_bp`,`i_unrest`,`i_districts`) VALUES (null,'{$kingdom_name}','{$bp}','{$unrest}','{$districts}')";

    if (mysqli_query($con, $sql)) {
        http_response_code(201);
        $kingdom = [
            'kingdom_name' => $kingdom_name,
            'bp' => $bp,
            'unrest' => $unrest,
            'districts' => $districts,
            'id'    => mysqli_insert_id($con)
        ];
        echo json_encode(['data' => $kingdom]);
    } else {
        http_response_code(422);
    }
}
