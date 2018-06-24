<?php

date_default_timezone_set('Europe/Amsterdam');
$method = $_SERVER['REQUEST_METHOD'];

//Process only when method is POST
if($method == "POST"){
    $response = new \stdClass();
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);
    $conn = dbConnect();

    $action = $json->result->action;
    switch ($action) {
        case 'update':
            $variable = $json->result->parameters->variable;
            switch ($variable) {
                case 'weight':
                    $weight = $json->result->parameters->{'unit-weight'}->amount;
                    $unit = $json->result->parameters->{'unit-weight'}->unit;
                    $sql = "UPDATE User
                            SET weight=$weight
                            WHERE user_id=146;";
                    if (dbUpdate($conn, $sql)) {
                        $speech = "Alright, your weight is updated to $weight $unit";
                    } else {
                        $speech = "Something went wrong";
                    }
                    break;
                case 'length':
                    $length = $json->result->parameters->{'unit-length'}->amount;
                    $unit = $json->result->parameters->{'unit-length'}->unit;
                    $sql = "UPDATE User
                            SET length=$length
                            WHERE user_id=146;";
                    if (dbUpdate($conn, $sql)) {
                        $speech = "Alright, your length is updated to $length $unit";
                    } else {
                        $speech = "Something went wrong";
                    }
                    break;
                default:
                    $speech = "Please say a valid phrase";
                    break;
            }
            break;
        case 'insertFood':
            $type = $json->result->parameters->type;
            if (strcmp($type, "drank") === 0) {
                $isFood = "false";
            } elseif (strcmp($type, "ate") === 0) {
                $isFood = "true";
            }

            $food = $json->result->parameters->food;
            $amount = $json->result->parameters->amount;
            $datetime = $json->result->parameters->{'date-time'};

            if (strlen($datetime) == 20) { // 20 is the length of date with time
                // split datetime into date and time
                $date = substr($datetime, 0, 10);
                $time = substr($datetime, 11, 8);
                if ($date == date("Y-m-d")) { // date equals today
                    $day = "today";
                } elseif ($date == date("Y-m-d", time() - 60 * 60 * 24)) { // date equals yesterday
                    $day = "yesterday";
                } else {
                    echo "Invalid date";
                }
            } elseif (strlen($datetime) == 10) { // 10 is the length of only a date
                $date = $datetime;
                if ($date == date("Y-m-d")) { // date equals today
                    $day = "today";
                    $time = date("H:i:s"); // current time
                } elseif ($date == date("Y-m-d", time() - 60 * 60 * 24)) { // date equals yesterday
                    $day = "yesterday";
                    $time = "12:00:00"; // default time for yesterday
                } else {
                    echo "Invalid date";
                }
            }

            $foodID = getFoodID($food);
            list($calories, $carbohydrates, $fat, $saturatedFat, $sugar) = getNutrition($foodID, $type);
            $totalCalories = $calories * $amount;
            $totalCarbohydrates = $carbohydrates * $amount;
            $totalFat = $fat * $amount;
            $totalSaturatedFat = $saturatedFat * $amount;
            $totalSugar = $sugar * $amount;
            
            $product = ucfirst($food);
            $datetime = $date." ".$time;
            $sql = "INSERT INTO Food (food_int, timestamp, is_food, amount, product, calories, carbohydrates, fat, saturated_fat, sugar, user_id)
                    VALUES (null, '$datetime', $isFood, $amount, '$product', $totalCalories, $totalCarbohydrates, $totalFat, $totalSaturatedFat, $totalSugar, 146);";
            //$speech = "Datetime: $datetime Amount: $amount Product: $product Food ID: $foodID Calories: $totalCalories Carbohydrates: $totalCarbohydrates Fat: $totalFat Saturated Fat: $totalSaturatedFat Sugar: $totalSugar";
            //$speech = $sql;
            if (dbUpdate($conn, $sql)) {
                $speech = "Alright, I added $amount $food for $day";
            } else {
                $speech = "Something went wrong";
            }
            break;
        case 'searchRecipe':
            $requirement = $json->result->parameters->requirement;
            $searchExpression = $json->result->parameters->search_expression;

            if (strcmp($requirement, "low calorie") === 0) {
                $lowCalories = 300;
            } else {
                $lowCalories = null;
            }

            if ($lowCalories != null) {
                $amountCalories = 301; // Maximum allowed amount of calories, exclusive
                $searches = 0;
                while ($amountCalories > $lowCalories) {
                    $recipe = array();
                    $recipeID = searchRecipe($searchExpression, 0)[1];
                    $recipe = getRecipe($recipeID);
                    $amountCalories = $recipe[5]['calories'];
                    $searches++;
                    // $speech = "Random Page Number: $randomPageNumber Recipe ID: $recipeID Amount of calories: $amountCalories Searches: $searches";
                }
            } else {
                $recipeID = searchRecipe($searchExpression, 0)[1];
                $recipe = getRecipe($recipeID);
            }
            $recipeName = $recipe[0];
            $recipeDescription = $recipe[1];

            $directions = $recipe[2];
            // $firstStep = $directions[0]['direction_description'];
            // $secondStep = $directions[1]['direction_description'];
            $amountDirections = count($directions);

            $numberServings = $recipe[3];

            $ingredients = $recipe[4];
            $ingredientList = "Here are the ingredients: ";
            for ($i=0; $i < count($ingredients) - 1; $i++) { 
                $ingredientList .= $ingredients[$i]['ingredient_description'];
                $ingredientList .= ", ";
            }
            $ingredientList .= $ingredients[$i]['ingredient_description'];
            $ingredientList .= ".";

            $nutrition = $recipe[5];

            $recipeJson = [
                [
                    'name' => 'recipe-confirm',
                    'lifespan' => '5',
                    'parameters' => [
                        'id' => "$recipeID",
                        'ingredientList' => "$ingredientList",
                        'totalSteps' => "$amountDirections",
                        'stepCounter' => "0"
                    ]
                ]
            ];
            // Adds all step descriptions to the recipe JSON
            for ($i=0; $i < $amountDirections; $i++) {
                $recipeJson[0]['parameters'][$i+1] = $directions[$i]['direction_description'];
            }
            $response->contextOut = $recipeJson;
            //$response->recipeID = $recipeID;
            //$speech = "Requirement: $requirement Search Expression: $searchExpression Recipe ID: $recipeID";
            //$speech = "$amountCalories $searches $recipeID";
            $speech = "Would you like this recipe? $recipeName. Description: $recipeDescription It has ".$nutrition['calories']." calories.";
            break;
        case 'nextStep':
            break;
        case 'addCalories':
            $calories = $json->result->parameters->calories;
            $sql = "INSERT INTO Food (food_int, timestamp, is_food, amount, product, calories, carbohydrates, fat, saturated_fat, sugar, user_id)
                    VALUES (null, null, 'true', 1, 'Unknown', $calories, 0, 0, 0, 0, 146);";
            if (dbUpdate($conn, $sql)) {
                $speech = "Alright, I added $calories calories to your profile";
            } else {
                $speech = "Something went wrong";
            }
            break;
        case 'getCalories':
            $nutrition = $json->result->parameters->nutrition;
            if (strcmp($nutrition, "calorie") === 0) {
                $nutSql = "calories";
                $feedback = "calories";
            } elseif (strcmp($nutrition, "carbohydrate") === 0) {
                $nutSql = "carbohydrates";
                $feedback = "carbohydrates";
            } elseif (strcmp($nutrition, "fat") === 0) {
                $nutSql = "fat";
                $feedback = "grams of fat";
            } elseif (strcmp($nutrition, "saturated fat") === 0) {
                $nutSql = "saturated_fat";
                $feedback = "grams of saturated fat";
            } elseif (strcmp($nutrition, "sugar") === 0) {
                $nutSql = "sugar";
                $feedback = "grams of sugar";
            }
            $sql = "SELECT SUM($nutSql) AS total
                    FROM Food
                    WHERE user_id = 146
                    AND DATE(timestamp) = '2018-06-05';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $speech = "You have consumed ".$row["total"]." $feedback today";
                }
            } else {
                $speech = "Something went wrong";
            }
            break;
        default:
            $speech = "Please say a valid phrase";
            break;
    }

    $conn->close();

    
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    //$response->contextOut = $context;
    echo json_encode($response);

} else {
    echo "Method not allowed";
}

// Doesn't work yet
function getRandomPageNumber($searchExpression) {
    $maxResults = 50;
    $startPage = 0;
    $totalResults = searchRecipe($searchExpression, $startPage)[0];
    $totalPages = floor($totalResults / $maxResults);
    return rand($startPage, $totalPages);
}

function dbConnect() {
    $conn = new mysqli("oege.ie.hva.nl", "edep002", 'oMaIEqzNzZ$Fu/', "zedep002");

    if ($conn->connect_error) {
        die("ERROR: Unable to connect: " . $conn->connect_error);
    }

    return $conn;
}

function dbUpdate($conn, $sql) {
    return $conn->query($sql);
}

function getFoodID($food) {
    $httpMethod = "GET";
    $requestURL = "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api";

    $params = "format=json&";
    $params .= "method=foods.search&";
    $params .= "oauth_consumer_key=781d9b823910408d99d2294f1600dd02&";
    $params .= "oauth_nonce=memes&";
    $params .= "oauth_signature_method=HMAC-SHA1&";
    $params .= "oauth_timestamp=".time()."&";
    $params .= "oauth_version=1.0&";
    $params .= "search_expression=".rawurlencode($food);
    $params2 = rawurlencode($params);

    $sigBase = $httpMethod."&".$requestURL."&".$params2;

    $consumerSecret = "34c5751940bb4629bd3723c258eb7d42";
    $key = $consumerSecret."&";

    $algo = "sha1";
    $sig = base64_encode(hash_hmac($algo, $sigBase, $key, true));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 38a351ad-d6f1-4f94-bf61-ae491dc1be91"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $json = json_decode($response, true);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $json['foods']['food'][0]['food_id'];
    }
}

function getNutrition($foodID, $type) {
    $httpMethod = "GET";
    $requestURL = "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api";

    $params = "food_id=$foodID&";
    $params .= "format=json&";
    $params .= "method=food.get&";
    $params .= "oauth_consumer_key=781d9b823910408d99d2294f1600dd02&";
    $params .= "oauth_nonce=memes2&";
    $params .= "oauth_signature_method=HMAC-SHA1&";
    $params .= "oauth_timestamp=".time()."&";
    $params .= "oauth_version=1.0";
    $params2 = rawurlencode($params);

    $sigBase = $httpMethod."&".$requestURL."&".$params2;

    $consumerSecret = "34c5751940bb4629bd3723c258eb7d42";
    $key = $consumerSecret."&";

    $algo = "sha1";
    $sig = base64_encode(hash_hmac($algo, $sigBase, $key, true));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 38a351ad-d6f1-4f94-bf61-ae491dc1be91"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $json = json_decode($response, true);
    
    //find the correct serving index in the json
    for ($i=0; $i < 10; $i++) { 
        $mesDescription = $json['food']['servings']['serving'][$i]['measurement_description'];
        if (strpos($mesDescription, 'serving') !== false) {
            $servingFound = true;
            $servingIndex = $i;
        } elseif (strpos($mesDescription, 'small') !== false) {
            $smallFound = true;
            $smallIndex = $i;
        }
    }

    if (strcmp($type, "drank") === 0) {
        if ($smallFound) {
            $usedIndex = $smallIndex;
        } else {
            $usedIndex = $servingIndex;
        }
    } elseif (strcmp($type, "ate") === 0) {
        $usedIndex = $servingIndex;
    } else {
        return "error";
    }

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $calories = $json['food']['servings']['serving'][$usedIndex]['calories'];
        $carbohydrates = $json['food']['servings']['serving'][$usedIndex]['carbohydrate'];
        $fat = $json['food']['servings']['serving'][$usedIndex]['fat'];
        $saturatedFat = $json['food']['servings']['serving'][$usedIndex]['saturated_fat'];
        $sugar = $json['food']['servings']['serving'][$usedIndex]['sugar'];
        return array($calories, $carbohydrates, $fat, $saturatedFat, $sugar);
    }
}

function searchRecipe($searchExpression, $pageNumber) {
    $httpMethod = "GET";
    $requestURL = "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api";

    $params = "format=json&";
    $params .= "max_results=50&";
    $params .= "method=recipes.search&";
    $params .= "oauth_consumer_key=781d9b823910408d99d2294f1600dd02&";
    $params .= "oauth_nonce=memes3&";
    $params .= "oauth_signature_method=HMAC-SHA1&";
    $params .= "oauth_timestamp=".time()."&";
    $params .= "oauth_version=1.0&";
    $params .= "page_number=$pageNumber&";
    $params .= "recipe_type=main%20dish&";
    $params .= "search_expression=".($searchExpression);
    $params2 = rawurlencode($params);

    $sigBase = $httpMethod."&".$requestURL."&".$params2;

    $consumerSecret = "34c5751940bb4629bd3723c258eb7d42";
    $key = $consumerSecret."&";

    $algo = "sha1";
    $sig = base64_encode(hash_hmac($algo, $sigBase, $key, true));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 94020122-037a-4f29-ac33-ecfebb4e7946"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $json = json_decode($response, true);

    $min = 0;
    $max = 49;
    $random = rand($min, $max);

    return array(
        $json['recipes']['total_results'],
        $json['recipes']['recipe'][$random]['recipe_id']
    );
}

function getRecipe($recipeID) {
    $httpMethod = "GET";
    $requestURL = "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api";

    $params = "format=json&";
    $params .= "method=recipe.get&";
    $params .= "oauth_consumer_key=781d9b823910408d99d2294f1600dd02&";
    $params .= "oauth_nonce=memes4&";
    $params .= "oauth_signature_method=HMAC-SHA1&";
    $params .= "oauth_timestamp=".time()."&";
    $params .= "oauth_version=1.0&";
    $params .= "recipe_id=$recipeID";
    $params2 = rawurlencode($params);

    $sigBase = $httpMethod."&".$requestURL."&".$params2;

    $consumerSecret = "34c5751940bb4629bd3723c258eb7d42";
    $key = $consumerSecret."&";

    $algo = "sha1";
    $sig = base64_encode(hash_hmac($algo, $sigBase, $key, true));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 94020122-037a-4f29-ac33-ecfebb4e7946"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $json = json_decode($response, true);

    return array(
        $json['recipe']['recipe_name'],                 // Name
        $json['recipe']['recipe_description'],          // Description
        $json['recipe']['directions']['direction'],     // Cooking directions
        $json['recipe']['number_of_servings'],          // Number of servings
        $json['recipe']['ingredients']['ingredient'],   // Ingredients
        $json['recipe']['serving_sizes']['serving']     // Nutritional information
    );
}

// // Spoonacular API

// function parseIngredients($food) {
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/parseIngredients?includeNutrition=false",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "POST",
//         CURLOPT_POSTFIELDS => "ingredientList=$food&servings=1",
//         CURLOPT_HTTPHEADER => array(
//             "Accept: application/json",
//             "Cache-Control: no-cache",
//             "Content-Type: application/x-www-form-urlencoded",
//             "Postman-Token: dff45694-d620-4652-ae1d-9756ee1d63a0",
//             "X-Mashape-Key: kxbrvMd9pPmshBQzhGcUhVDIdsMap16CAEijsn0qLhyD251wlV"
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     $json = json_decode($response, true);

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         return $json[0]['id'];
//     }
// }

// function getFoodInfo($foodID, $amount) {
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/ingredients/$foodID/information?amount=$amount",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_POSTFIELDS => "ingredientList=Apple&servings=1",
//         CURLOPT_HTTPHEADER => array(
//             "Cache-Control: no-cache",
//             "Postman-Token: fa5c8c06-bb93-467c-b2ee-bf5a2427273c",
//             "X-Mashape-Key: kxbrvMd9pPmshBQzhGcUhVDIdsMap16CAEijsn0qLhyD251wlV"
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     $json = json_decode($response, true);

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         return $json['nutrition']['nutrients'][0]['amount'];
//     }
// }

?>