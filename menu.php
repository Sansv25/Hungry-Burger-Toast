<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://dummyjson.com/product",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "", // Disable automatic content decoding
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => [
        "Accept: */*",
        "Accept-Encoding: gzip, deflate", // Remove 'br' encoding
        "Connection: keep-alive",
        "User-Agent: EchoapiRuntime/1.1.0"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // Decode the JSON response to an associative array
    $data = json_decode($response, true);
    // print_r($data);
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&family=Handlee&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-cover bg-center h-screen" style="background-image: url('asset/bgmenu.jpg'); background-attachment: fixed;"></body>
<h2 class="text-5xl lg:text-7xl text-center font-Hanalei text-white mt-14" data-aos="fade-down">Hungry Burger & Toast</h2>
<div class="flex flex-wrap justify-center text-white font-Handlee">
    <?php foreach ($data["products"] as $product): ?>
        <div class="max-w-sm overflow-hidden mx-auto my-20" data-aos="fade-up">
            <h1 class="text-4xl text-center font-semFibold p-2"><?= $product["title"] ?></h1>
            <img class=" w-full h-72 object-contain" src="<?= $product["images"][0] ?>" alt="image">
            <p class="p-2 text-5xl text-center font-bold">Rp.<?= $product["price"] ?></p>
            <p class="p-2 text-xl text-center"><?= $product["description"] ?></p>
        </div>
    <?php endforeach; ?>
</div>
<script src="aos.js"></script>
<script>
        AOS.init();
    </script>
</body>

</html>
