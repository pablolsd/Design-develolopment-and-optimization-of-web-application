<?php
if (isset($_POST['country_id'])) {
    $countryId = $_POST['country_id'];
    $regions = [
        1 => ["Регион 1.1", "Регион 1.2"],
        2 => ["Регион 2.1", "Регион 2.2"]
    ];

    $output = '<option value="">Выберите регион</option>';
    foreach ($regions[$countryId] as $region) {
        $output .= '<option value="' . $region . '">' . $region . '</option>';
    }

    echo $output;
}

if (isset($_POST['region_id'])) {
    $regionId = $_POST['region_id'];
    $cities = [
        1 => [
            "Регион 1.1" => ["Город 1.1.1", "Город 1.1.2"],
            "Регион 1.2" => ["Город 1.2.1", "Город 1.2.2"]
        ],
        2 => [
            "Регион 2.1" => ["Город 2.1.1", "Город 2.1.2"],
            "Регион 2.2" => ["Город 2.2.1", "Город 2.2.2"]
        ]
    ];

    $output = '<option value="">Выберите город</option>';
    foreach ($cities[$regionId] as $city) {
        foreach ($city as $c) {
            $output .= '<option value="' . $c . '">' . $c . '</option>';
        }
    }

    echo $output;
}
?>
