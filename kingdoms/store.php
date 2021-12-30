<?php
require '../connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if (
        trim($request->data->name) === ''
        ||
        (int)$request->data->districts < 1
        ||
        (int)$request->data->unrest < 0
        ||
        (int)$request->data->hexfields < 1
        ||
        (int)$request->data->edictHolidaysTier < 0 && (int)$request->data->edictHolidaysTier > 4
        ||
        (int)$request->data->edictPromotionTier < 0 && (int)$request->data->edictPromotionTier > 4
        ||
        (int)$request->data->edictTaxationTier < 0 && (int)$request->data->edictTaxationTier > 4
    ) {
        return http_response_code(400);
    }

    // Sanitize.
    $name = mysqli_real_escape_string($con, trim($request->data->name));
    $bp = mysqli_real_escape_string($con, (int)$request->data->bp);
    $unrest = mysqli_real_escape_string($con, (int)$request->data->unrest);
    $districts = mysqli_real_escape_string($con, (int)$request->data->districts);
    $hexfields = mysqli_real_escape_string($con, (int)$request->data->hexfields);
    $edictHolidaysTier = mysqli_real_escape_string($con, (int)$request->data->edictHolidaysTier);
    $edictPromotionTier = mysqli_real_escape_string($con, (int)$request->data->edictPromotionTier);
    $edictTaxationTier = mysqli_real_escape_string($con, (int)$request->data->edictTaxationTier);


    // Store.
    $sql = "INSERT INTO `kingdoms`(`l_id`,`vc_name`,`i_bp`,`i_unrest`,`i_districts`,`i_hexfields`,`i_edict_holidays_tier`,`i_edict_promotion_tier`,`i_edict_promotion_tier`) VALUES (null,'{$name}','{$bp}','{$unrest}','{$districts}','{$hexfields}','{$edictHolidaysTier}','{$edictPromotionTier}','{$edictTaxationTier}')";

    if (mysqli_query($con, $sql)) {
        http_response_code(201);
        $kingdom = [
            'name' => $name,
            'bp' => $bp,
            'unrest' => $unrest,
            'districts' => $districts,
            'hexfields' => $hexfields,
            'i_edict_holidays_tier' => $edictHolidaysTier,
            'i_edict_promotion_tier' => $edictPromotionTier,
            'i_edict_promotion_tier' => $edictTaxationTier,
            'id'    => mysqli_insert_id($con)
        ];
        echo json_encode(['data' => $kingdom]);
    } else {
        http_response_code(422);
    }
}
