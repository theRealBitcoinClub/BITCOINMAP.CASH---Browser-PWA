<?php
//header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

$string = file_get_contents("places.json");
$json = json_decode($string, true);
$firstRun = true;

$discountText = array("10% discount on first BCH payment","20% discount on first BCH payment","Accepting Bitcoin payments soon","Trade Bitcoin here with 0.0% fee","DASH, BCH, BTC accepted here","Information from discoverdash.com");
$tagText = array('Spicy 🌶️',
                     'Salty 🥨',
                     'Sour 😜',
                     'Organic 🐵',
                     'Vegetarian 🥕',
                     'Vegan 🐮',
                     'Healthy 💓',
                     'Burger 🍔',
                     'Sandwich 🥪',
                     'Muffin 🧁', //The muffin icon is invisible
                     'Brownie 🥮', //Brownie is invisible too
                     'Cake 🎂',
                     'Cookie 🍪',
                     'Arabic 🥙',
                     'Pizza 🍕',
                     'Salad 🥗',
                     'Smoothie 🥤',
                     'Fruit 🍓',
                     'IceCream 🍦',
                     'Raw 🥦',
                     'Handbag 👜',
                     'Cosmetic 💅',
                     'Tattoo ♣',
                     'Piercing 🌀',
                     'Souvenir 🎁',
                     'Hatha 🧘',
                     'Vinyasa 🧘',
                     'Massage 💆',
                     'Upcycled 🌲',
                     'Coffee ☕',
                     'NoGluten 🌽',
                     'Cocktails 🍹',
                     'Beer 🍺',
                     'Music 🎵',
                     'Chinese 🍜',
                     'Duck 🍱',
                     'Rock 🎸',
                     'LiveDJ 🎧',
                     'Terrace ☀️',
                     'Seeds 🌱',
                     'Grinder 🍌',
                     'Papers 🚬',
                     'Advice 🌴',
                     'Calzone 🥟',
                     'Falafel 🥙',
                     'MakeUp 🤡',
                     'Gifts 🎁',
                     'Tapas 🍠',
                     'Copas 🍹',
                     'Piadina 🌮',
                     'Cheese 🧀',
                     'Grains 🌾',
                     'Fashion 👗',
                     'Fair 🤗',
                     'Women 👩',
                     'Drinks 🍹',
                     'TV 📺',
                     'Retro 🦄',
                     'Feta 🐐',
                     'DASH Ð',
                     'BTC ₿',
                     'BCH ₿',
                     'ANYPAY ₿️',
                     'ETH ₿',
                     'HotDog 🌭',
                     'Fast ⏩',
                     'Kosher 🦄',
                     'Sushi 🍣',
                     'Moto 🛵',
                     'Coche 🚘',
                     'GOCRYPTO ₿',
                     'Chicken 🐔',
                     'Rabbit 🐰',
                     'Potato 🥔',
                     'Kumpir 🥔',
                     'Kebap 🐄',
                     'ATM 🏦',
                     'Gyros 🐖',
                     'Coconut 🥥',
                     'ToGo 📦',
                     'Meditation 🧘',
                     'Wine 🍷',
                     'Champagne 🥂',
                     'Alcohol 🍾',
                     'Booze 🥃',
                     'Pancakes 🥞', //You cant remove because we use fixed indexes, but replace with another string that is unlikely to be typed in by the user
                     'Croissant 🥐',
                     'Popcorn 🍿',
                     'SoftIce 🍦',
                     'Dango 🍡',
                     'BnB 🛏️',
                     'Haircut ✂️',
                     'Candy 🍭',
                     'Beauty 💅',
                     'Miso 🍱',
                     'Chocolate 🍫',
                     'Rice 🍚',
                     'Seafood 🦀',
                     'Hostel 🛏️',
                     'Fries 🍟',
                     'Fish 🐟', //100
                     'Chips 🍟',
                     'Italian 🇮🇹',
                     'Whiskey 🥃',
                     ' - - - ', //This is number 104 the no tag indicator, currently not used //TODO hide this field from the suggestions
                     'Bourbon 🥃', //105
                     'Liquor 🥃',
                     'Men ♂️',
                     'Pasta 🍝',
                     'Dessert 🍬', //109
                     'Starter 🥠', //110
                     'BBQ 🍗',
                     'Noodle 🍜',
                     'Korean 🥟',
                     'Market 🧺', //invisible item
                     'Bread 🥖',
                     'Bakery 🥨',
                     'Cafe ☕',
                     'Games 🎮',
                     'Snacks 🍿',
                     'Elegant 🕴️',
                     'Piano 🎹',
                     'Brunch 🍱',
                     'Nachos 🌽',
                     'Lunch 🥡',
                     'Breakfast 🥐',
                     'HappyHour 🥳', //hidden item
                     'LateNight 🌜',
                     'Mexican 🇲🇽',
                     'Burrito 🌯',
                     'Tortilla 🌮',
                     'Indonesian 🇮🇩',
                     'Sports 🏆',
                     'Pastry 🥧',
                     'Bistro 🍲',
                     'Soup 🥣',
                     'Tea 🍵',
                     'Onion',
                     'Steak 🥩',
                     'Shakes 🥤',
                     'Empanadas 🥟',
                     'Dinner 🍽️',
                     'Sweet 🍭',
                     'Fried 🍳',
                     'Omelette 🥚',
                     'Gin 🍸',
                     'Donut 🍩',
                     'Delivery 🚚',
                     'Cups ☕',
                     'Filter',
                     'Juice 🍊',
                     'Vietnamese 🇻🇳',
                     'Pie 🥮', //invisible item
                     'Unagi 🐡',
                     'Greek 🇬🇷',
                     'Japanese 🇯🇵',
                     'Tacos 🌮',
                     'Kombucha 🍵',
                     'Indian 🇮🇳',
                     'Nan 🥪',
                     'Club 🎶',
                     'Honey 🍯',
                     'Pool 🎱',
                     'Hotel 🏨',
                     'Pork 🥓',
                     'Ribs 🍖',
                     'Kava 🍵',
                     'Chai 🍵',
                     'Izzy 🍵',
                     'Matcha 🍵',
                     'Oden 🍢',
                     'Latte ☕',
                     'DASHText Ð',
                     'CoinTigo ₿',
                     'CoinText ₿',
                     'Salamantex ₿',
                     'CryptoBuyer ₿',
                     'XPay ₿');

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

       $tags .= "<a href='/?tag=" . $tagText[$s] . "'>" . $tagText[$s] . "</a> - ";
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

    echo "<div class='piccontainer'><img width='640' height='480' alt='" . $name . "' class='pic lazy' data-src='https://bitcoinmap.cash/img/app/$id.gif' /></div>";
    echo "<h3 class='name'><a href='/?id=$id'>$name</a></h3>";
    echo "<div class='secondrow'><span class='reviews'>Reviews: $stars ($count)</span>";
    if (strlen($category) > 1)
      echo "<a href='/?category=$category'><img class='icon' alt='" . $category . "' src='img/icons/icon$type.png' /><a/>";
    else
      echo "<img class='icon'  alt='icon" . $type . "' src='img/icons/icon$type.png' />";
    echo "<a class='location' href='/?location=$splittedLocation[0]'>$splittedLocation[0]</a>";
    echo ", <a class='location' href='/?location=$splittedLocation[1]'>$splittedLocation[1]</a>";
    echo ", <a class='location' href='/?location=$splittedLocation[2]'>$splittedLocation[2]</a></div>";
    echo "<h4 class='discount'>$discountText[$discount]</h4>";
    echo "<h4 class='tags'>$tags</h4>";
    echo "<div class='batschcontainer'><a href='https://realbitcoinclub.epizy.com/$id'><img alt='Google Maps Badge' class='batsch' src='google-maps-badge282x84.png' /></a>";
    echo "<a href='https://bitcoinmap.cash/localbitcoinmap'><img class='batsch' alt='Google Play Badge' src='google-play-badge282x84.png' /></a></div>";
}
?>
