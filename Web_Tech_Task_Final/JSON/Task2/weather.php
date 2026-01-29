<?php
header('Content-Type: application/json');

$city = isset($_GET['city']) ? $_GET['city'] : 'New York';

$weatherData = [
    "New York" => [
        ["date"=>"2024-12-30","temp_high"=>45,"temp_low"=>32,"condition"=>"Sunny","humidity"=>65,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2024-12-31","temp_high"=>42,"temp_low"=>30,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>12,"icon"=>"☁️"],
        ["date"=>"2025-01-01","temp_high"=>38,"temp_low"=>28,"condition"=>"Snow","humidity"=>80,"wind_speed"=>15,"icon"=>"❄️"],
        ["date"=>"2025-01-02","temp_high"=>40,"temp_low"=>30,"condition"=>"Rain","humidity"=>75,"wind_speed"=>10,"icon"=>"🌧️"],
        ["date"=>"2025-01-03","temp_high"=>44,"temp_low"=>33,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-04","temp_high"=>41,"temp_low"=>31,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>9,"icon"=>"☁️"],
        ["date"=>"2025-01-05","temp_high"=>39,"temp_low"=>29,"condition"=>"Snow","humidity"=>78,"wind_speed"=>12,"icon"=>"❄️"]
    ],
    "London" => [
        ["date"=>"2024-12-30","temp_high"=>50,"temp_low"=>40,"condition"=>"Rain","humidity"=>75,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2024-12-31","temp_high"=>48,"temp_low"=>38,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2025-01-01","temp_high"=>45,"temp_low"=>35,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-02","temp_high"=>46,"temp_low"=>36,"condition"=>"Rain","humidity"=>72,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2025-01-03","temp_high"=>44,"temp_low"=>34,"condition"=>"Snow","humidity"=>78,"wind_speed"=>15,"icon"=>"❄️"],
        ["date"=>"2025-01-04","temp_high"=>47,"temp_low"=>37,"condition"=>"Cloudy","humidity"=>68,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2025-01-05","temp_high"=>49,"temp_low"=>39,"condition"=>"Sunny","humidity"=>65,"wind_speed"=>8,"icon"=>"☀️"]
    ],
    "Tokyo" => [
        ["date"=>"2024-12-30","temp_high"=>55,"temp_low"=>45,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2024-12-31","temp_high"=>52,"temp_low"=>42,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>12,"icon"=>"☁️"],
        ["date"=>"2025-01-01","temp_high"=>50,"temp_low"=>40,"condition"=>"Rain","humidity"=>70,"wind_speed"=>15,"icon"=>"🌧️"],
        ["date"=>"2025-01-02","temp_high"=>53,"temp_low"=>43,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>10,"icon"=>"☀️"],
        ["date"=>"2025-01-03","temp_high"=>51,"temp_low"=>41,"condition"=>"Cloudy","humidity"=>65,"wind_speed"=>12,"icon"=>"☁️"],
        ["date"=>"2025-01-04","temp_high"=>54,"temp_low"=>44,"condition"=>"Rain","humidity"=>70,"wind_speed"=>10,"icon"=>"🌧️"],
        ["date"=>"2025-01-05","temp_high"=>56,"temp_low"=>46,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"]
    ],
    "Paris" => [
        ["date"=>"2024-12-30","temp_high"=>48,"temp_low"=>38,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2024-12-31","temp_high"=>50,"temp_low"=>40,"condition"=>"Sunny","humidity"=>65,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-01","temp_high"=>46,"temp_low"=>36,"condition"=>"Rain","humidity"=>75,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2025-01-02","temp_high"=>47,"temp_low"=>37,"condition"=>"Cloudy","humidity"=>70,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2025-01-03","temp_high"=>45,"temp_low"=>35,"condition"=>"Snow","humidity"=>80,"wind_speed"=>15,"icon"=>"❄️"],
        ["date"=>"2025-01-04","temp_high"=>49,"temp_low"=>39,"condition"=>"Sunny","humidity"=>60,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-05","temp_high"=>48,"temp_low"=>38,"condition"=>"Rain","humidity"=>70,"wind_speed"=>10,"icon"=>"🌧️"]
    ],
    "Sydney" => [
        ["date"=>"2024-12-30","temp_high"=>80,"temp_low"=>70,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2024-12-31","temp_high"=>78,"temp_low"=>68,"condition"=>"Cloudy","humidity"=>60,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2025-01-01","temp_high"=>76,"temp_low"=>66,"condition"=>"Rain","humidity"=>65,"wind_speed"=>12,"icon"=>"🌧️"],
        ["date"=>"2025-01-02","temp_high"=>79,"temp_low"=>69,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-03","temp_high"=>77,"temp_low"=>67,"condition"=>"Cloudy","humidity"=>60,"wind_speed"=>10,"icon"=>"☁️"],
        ["date"=>"2025-01-04","temp_high"=>81,"temp_low"=>71,"condition"=>"Sunny","humidity"=>55,"wind_speed"=>8,"icon"=>"☀️"],
        ["date"=>"2025-01-05","temp_high"=>79,"temp_low"=>69,"condition"=>"Rain","humidity"=>65,"wind_speed"=>12,"icon"=>"🌧️"]
    ]
];

$response = [
    "city" => $city,
    "forecast" => $weatherData[$city] ?? []
];

echo json_encode($response);
