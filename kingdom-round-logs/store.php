<?php
require '../connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);


    // Validate.
    if ((int)$request->data->kingdomId < 1 || (int)$request->data->year < 1 || (int)$request->data->month < 1 || (int)$request->data->month > 12 || (int)$request->data->phase < 1 || (int)$request->data->month > 4 || (int)$request->data->step < 1 || (int)$request->data->step > 6) {
        return http_response_code(400);
    }

    // Sanitize.
    $kingdomId = mysqli_real_escape_string($con, (int)$request->data->kingdomId);
    $year = mysqli_real_escape_string($con, (int)$request->data->year);
    $month = mysqli_real_escape_string($con, (int)$request->data->month);
    $phase = mysqli_real_escape_string($con, (int)$request->data->phase);
    $step = mysqli_real_escape_string($con, (int)$request->data->step);
    $bpChanges = mysqli_real_escape_string($con, (int)$request->data->bpChanges);
    $unrestChanges = mysqli_real_escape_string($con, (int)$request->data->unrestChanges);
    $districtChanges = mysqli_real_escape_string($con, (int)$request->data->districtChanges);
    $hexfieldChanges = mysqli_real_escape_string($con, (int)$request->data->hexfieldChanges);
    $infos = mysqli_real_escape_string($con, trim($request->data->infos));


    // Store.
    $sql = "INSERT INTO `kingdoms`(`l_id`,`l_kingdom_id`,`i_year`,`i_month`,`i_phase`,`i_step`,`i_bp_changes`,`i_unrest_changes`,`i_district_changes`,`i_hexfield_changes`,`i_infos`) VALUES (null,'{$kingdomId}','{$year}','{$month}','{$phase}','{$step}','{$bpChanges}','{$unrestChanges}','{$districtChanges}','{$hexfieldChanges}','{$infos}')";

    if (mysqli_query($con, $sql)) {
        http_response_code(201);
        $logEntry = [
            'kingdomId' => $kingdomId,
            'year' => $year,
            'month' => $month,
            'phase' => $phase,
            'step' => $step,
            'bpChanges' => $bpChanges,
            'unrestChanges' => $unrestChanges,
            'districtChanges' => $districtChanges,
            'hexfieldChanges' => $hexfieldChanges,
            'infos' => $infos,
            'id'    => mysqli_insert_id($con)
        ];
        echo json_encode(['data' => $logEntry]);
    } else {
        http_response_code(422);
    }
}
