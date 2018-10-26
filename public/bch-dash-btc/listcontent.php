<?php
//header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

$string = file_get_contents("places.json");
$json = json_decode($string, true);
$firstRun = true;

$discountText = array("10% discount on first BCH payment","20% discount on first BCH payment","Accepting Bitcoin payments soon","Trade Bitcoin here with 0.0% fee","DASH, BCH, BTC accepted here","Information from discoverdash.com");
$tagText = array("Bitcoin","Events","Trading","Organic","Vegetarian","Vegan","Healthy","Burger","Sandwich","Muffin","Brownie","Cake","Cookie","Tiramisu","Pizza","Salad","Smoothie","Fruit","IceCream","Raw","Handbag","Cosmetic","Tattoo","Piercing","Souvenir","Hatha","Vinyasa","Massage","Upcycled","Coffee","NoGluten","Cocktails","Beer","Music","Projects","Electro","Rock","LiveDJ","Terrace","Seeds","Grinder","Papers","Advice","Calzone","Suppli","MakeUp","Gifts","Tapas","Copas","Piadina","Herbs","Grains","Fashion","Fair","Women","Drinks","TV","Retro","Color","BW","BTC","BCH","Online","Booking","HotDog","Fast","Kosher","Sushi","Moto","Coche","Tablet","Chicken","Rabbit","Potatoe","DASH","ETH","ATM","Club","Dance","TakeAway","Meditation","Wine","Champagne","Alcohol","Booze","Hookers","Girls","Gay","Party","English","BnB","Haircut","Nails","Beauty","Miso","Teriyaki","Rice","Seafood","Hostel","Fries","Fish","Chips","Italian","Karaoke"," x x x ","Battery","Wheels","Men","Pasta","Dessert","Starter","BBQ","Noodle","Korean","Market","Bread","Bakery","Cafe","Games","Snacks","Elegant","Piano","Brunch","Nachos","Lunch","Breakfast","HappyHour","LateNight","Mexican","Burrito","Tortilla","Indonesian","Sports","Pastry","Bistro","Soup","Tea","Onion","Steak","Shakes","Empanadas","Dinner","Sweet","Fried","Omelette","Gin","Donut","Delivery","Cups","Filter","Juice","Vietnamese","Pie","Unagi","Greek","Japanese","Tacos","Kombucha","Indian","Nan","Club","Liquor","Pool","Hotel","Pork","Ribs","Kava","Chai","Izzy","Matcha","CBD","Latte");

$filter = isset($_GET['category']) ? $_GET['category'] : '';
$param_id = isset($_GET['id']) ? $_GET['id'] : '';
$tagfilter = isset($_GET['tag']) ? $_GET['tag'] : '';
$param_location = isset($_GET['location']) ? $_GET['location'] : '';

$categories = array("restaurant","food","bar","super","shop","hotel");

$isChrome = false;
//$isChrome = strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false;
$imageType = $isChrome ? 'webp' : 'gif';
//$imageType = 'gif';

echo "<br />";
echo "<br />";
echo "<br />";

foreach ($json as $key => $value) {
    if ($filter === "restaurant" && $value['t'] !== "0") {
      continue;
    } else if ($filter === "food" && $value['t'] !== "1") {
      continue;
    } else if ($filter === "bar" && $value['t'] !== "2") {
      continue;
    } else if ($filter === "super" && $value['t'] !== "3") {
      continue;
    } else if ($filter === "shop" && $value['t'] !== "4") {
      continue;
    } else if ($filter === "hotel" && $value['t'] !== "5") {
      continue;
    }
    $category = $categories[$value['t']];

    $id = $value['p'];

    if (isset($_GET['id']) && $param_id !== $id)
      continue;

    $type = $value['t'];
    $name = $value['n'];
    $discount = $value['d'];
    $splitted = explode(",",$value['a']);
    $tags = "";
    $tagsArray = array();
    foreach ($splitted as $s) {
      if ($s === "104") {
        $tags = "Write History -> Spend Bitcoin!!!";
        continue;
      }

       $tags .= "<a href='https://bitcoinmap.cash/bch-dash-btc/?tag=" . $tagText[$s] . "'>" . $tagText[$s] . "</a> - ";
       array_push($tagsArray, $tagText[$s]);
    }
    $tags = substr($tags, 0, strlen($tags) - 2);
    $location = $value['l'];
    $splittedLocation = explode(", ",$location);
    $stars = $value['s'];
    $count = $value['c'];

    if (isset($_GET['tag'])) {
      $containsTag = false;
      foreach ($tagsArray as $value) {
        if (strtolower($value) === strtolower($tagfilter)) {
          $containsTag = true;
        }
      }

      if (!$containsTag)
        continue;
    }

    if (isset($_GET['location'])) {
      $containsLocation = false;
      foreach ($splittedLocation as $value) {
        if (strtolower($value) === strtolower($param_location)) {
          $containsLocation = true;
        }
      }

      if (!$containsLocation)
        continue;
    }


    if (!$firstRun) {
      echo "<hr />";
    }
    $firstRun = false;

    echo "<div class='piccontainer'><img width='640' height='480' alt='" . $name . "' class='pic lazy' data-src='https://therealbitcoin.club/img/app/$id.$imageType' /></div>";
    echo "<h3 class='name'><a href='https://bitcoinmap.cash/bch-dash-btc/?id=$id'>$name</a></h3>";
    echo "<div class='secondrow'><span class='reviews'>Reviews: $stars ($count)</span>";
    if (strlen($category) > 1)
      echo "<a href='https://bitcoinmap.cash/bch-dash-btc/?category=$category'><img class='icon' alt='" . $category . "' src='img/icons/icon$type.png' /><a/>";
    else
      echo "<img class='icon'  alt='icon" . $type . "' src='img/icons/icon$type.png' />";
    echo "<a class='location' href='https://bitcoinmap.cash/bch-dash-btc/?location=$splittedLocation[0]'>$splittedLocation[0]</a>";
    echo ", <a class='location' href='https://bitcoinmap.cash/bch-dash-btc/?location=$splittedLocation[1]'>$splittedLocation[1]</a>";
    echo ", <a class='location' href='https://bitcoinmap.cash/bch-dash-btc/?location=$splittedLocation[2]'>$splittedLocation[2]</a></div>";
    echo "<h4 class='discount'>$discountText[$discount]</h4>";
    echo "<h4 class='tags'>$tags</h4>";
    echo "<div class='batschcontainer'><a href='https://therealbitcoin.club/$id'><img alt='Google Maps Badge' class='batsch' src='img/badges/google-maps-badge282x84.png' /></a>";
    echo "<a href='https://therealbitcoin.club/android'><img class='batsch' alt='Google Play Badge' src='img/badges/google-play-badge282x84.png' /></a></div>";
}
?>
