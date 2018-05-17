    <?php
require __DIR__ . '/vendor/autoload.php';
use RapidApi\RapidApiConnect;
$rapid = new RapidApiConnect('default-application_5adf253de4b0b4824e5ac536', 'dc6004e0-4602-4c1c-b599-38838972f5ea');

$response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/search?diet=vegetarian&excludeIngredients=coconut&intolerances=egg%2C+gluten&number=10&offset=0&query=burger&type=main+course",
  array(
    "X-Mashape-Key" => "1kEqiAEoRFmshiBb6AVUoeX6KvFNp1u8cndjsnSFvVG8zg3A1o",
    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
  )
);

$parsed_json = json_encode($response);
echo $parsed_json;
//$parsed_json = $parsed_json['root']['body']['result'];
//pr($parsed_json);

//foreach($parsed_json as $key => $value)
//{
  // echo $value['id'] . '<br>';
   //echo $value['title'] . '<br>';
   // etc
//}


?>