<?php
                           function getRecipe(){
                           $name = $_POST["name"];
                           $maxcalories = $_POST["maxCalories"];
                             require __DIR__ . '/vendor/autoload.php';
                                use RapidApi\RapidApiConnect;
                                $rapid = new RapidApiConnect('default-application_5adf253de4b0b4824e5ac536', 'dc6004e0-4602-4c1c-b599-38838972f5ea');

                                $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/searchComplex?query=".$name."&maxCalories=".$maxcalories,
                              array(
                                "X-Mashape-Key" => "1kEqiAEoRFmshiBb6AVUoeX6KvFNp1u8cndjsnSFvVG8zg3A1o",
                                "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
                              )
                                                              
                         );
                                $getResponseVal = $response->raw_body;
                                $getDecodeData = json_decode($getResponseVal, true);
                                //$getSpecificValue = $getDecodeData['results'][0]['title'];
                                
                                foreach($getDecodeData['results'] as $key=>$value) {
                                    if (empty($value)) {
                                        echo "<div class='panel-heading'>No recepts found </div>";
                                    } else {
                                        echo "<div class='panel-heading'>";
                                        echo "Recipe ".$key." : ".$value['title']." (Amount of calories): ".$value['calories']. "<br>";
                                        echo "</div>";
                                        }
                                }
                            }
?>