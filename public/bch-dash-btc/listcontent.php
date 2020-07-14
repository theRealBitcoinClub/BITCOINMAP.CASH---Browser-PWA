<?php
//header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

//$firstRun = true;

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
                     ' - - - ', //This is number 104 the no tag indicator, currently not used
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

$category = isset($_GET['category']) ? $_GET['category'] : '';
$param_id = isset($_GET['id']) ? $_GET['id'] : '';
$tagfilter = isset($_GET['tag']) ? $_GET['tag'] : '';
$param_location = isset($_GET['location']) ? $_GET['location'] : '';

if (isset($_GET['category']) || isset($_GET['id']) || isset($_GET['tag']) || isset($_GET['location'])) {
    $categories = array("restaurant","food","bar","super","shop","hotel");

    $hasPlaces = false;
    $counter = 1;

    printCurrentFilterSettings($category, $tagfilter, $param_location);
    $counter = printItemsFromThisJSONfile($tagText, "places.json", $counter, $category, $param_id, $tagfilter, $param_location, $categories, $hasPlaces);

    if ($counter === 1) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<strong>&nbsp;0 places found!</strong>";
        echo "<i>&nbsp;Please select a different category, tag or location!</i></div>";
    }
} else {
    echo "<div id='startupHint'><div class='alert alert-success' role='alert'>&nbsp;Please choose a filter from the top menu ↑</div><div style='padding:10px;'><h2 style='color:#ccc;'>Drink a coffee paid with Bitcoin today!</h2><h3 style='color:#ccc;'>Coinect with the Coimunity!</h3><h4 style='color:#ccc;'>Satoshi Nakamoto is alive!</h4><small style='color:#ccc;'>You passed the reading test!</small><br/><br/><b style='color:#ccc;'>Choose a filter from the top menu or click: <a href='http://coincoffee.club?category=restaurant&tag=Burger'><u>Best Bitcoin Burger Restaurants</u></a></div></div>";
}

function printItemsFromThisJSONfile($tagText, $fileName, $counter, $category, $param_id, $tagfilter, $param_location, $categories, $hasPlaces){
    $string = file_get_contents($fileName);
    $json = json_decode($string, true);

    foreach ($json as $key => $currentItem) {
        if (isset($_GET['category'])) {
            if ($category === "restaurant" && $currentItem['t'] !== "0") {
              continue;
            } else if ($category === "food" && $currentItem['t'] !== "1") {
              continue;
            } else if ($category === "bar" && $currentItem['t'] !== "2") {
              continue;
            } else if ($category === "super" && $currentItem['t'] !== "3") {
              continue;
            } else if ($category === "shop" && $currentItem['t'] !== "4") {
              continue;
            } else if ($category === "hotel" && $currentItem['t'] !== "5") {
              continue;
            }
        }

        $category = $categories[$currentItem['t']];

        $id = $currentItem['p'];
        $posx = $currentItem['x'];
        $posy = $currentItem['y'];

        if (isset($_GET['id']) && $param_id !== $id)
          continue;

        $type = $currentItem['t'];
        $name = $currentItem['n'];
        $discount = $currentItem['d'];
        $splitted = explode(",",$currentItem['a']);
        $tags = "";
        $tagsArray = array();
        foreach ($splitted as $s) {
           $tags .= "<a href='/?tag=" . $tagText[$s] . "'>" . $tagText[$s] . "</a>&nbsp;&nbsp;";
           array_push($tagsArray, $tagText[$s]);
        }
        $tags = substr($tags, 0, strlen($tags) - 6);
        $location = $currentItem['l'];
        $splittedLocation = explode(", ",$location);
        $stars = $currentItem['s'];
        $count = $currentItem['c'];

        if (isset($_GET['tag'])) {
          $containsTag = false;
          foreach ($tagsArray as $valueTag) {
            //if (strtolower($valueTag) === strtolower($tagfilter)) {
            //Also show similar tag results
            if (strpos(strtolower($valueTag), strtolower(substr($tagfilter, 0, -2))) !== false) {
              $containsTag = true;
            }
          }

          if (!$containsTag)
            continue;
        }

        if (isset($_GET['location'])) {
          $containsLocation = false;
          foreach ($splittedLocation as $valueLoc) {
            if (strtolower(trim($valueLoc)) === strtolower($param_location)) {
            //Also show similar location results
            //if (strpos(strtolower(trim($valueLoc)), strtolower(substr($param_location, 0, -2))) !== false) {
              $containsLocation = true;
            }
          }

          if (!$containsLocation)
            continue;
        }

        $directions = "https://google.com/maps/search/?api=1&query=" . $posx . "," . $posy;
        $directionsBMAP = "http://bmap.cash?x=" . $posx . "&y=" . $posy;

        echo "<div width='640' height='480' class='piccontainer'><img width='640' height='480' class='pic lazy' data-src='https://bitcoinmap.cash/img/app/$id.gif' /></div>";
        echo "<h3 class='name'>$counter)&nbsp;<a title='BMAP: $name' href='http://bmap.cash/place?id=$id'>$name</a></h3>";
        echo "<div class='secondrow'><span class='reviews'>⭐ $stars</span>";
        if (strlen($category) > 1)
          echo "<a href='/?category=$category'><img class='icon' alt='" . $category . "' src='img/icons/icon$type.png' /><a/>";
        else
          echo "<img class='icon' alt='icon" . $type . "' src='img/icons/icon$type.png' />";
        echo "<a class='location' href='/?location=" . urlencode($splittedLocation[0]) . "'>$splittedLocation[0]</a>";
        echo ", <a class='location' href='/?location=" . urlencode($splittedLocation[1]) . "'>$splittedLocation[1]</a>";
        echo ", <a class='location' href='/?location=" . urlencode($splittedLocation[2]) . "'>$splittedLocation[2]</a></div>";
        //echo "<h4 class='discount'>$discountText[$discount]</h4>";
        echo "<h4 class='tags'>$tags</h4>";
        echo "<div class='batschcontainer'><a target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fcoincoffee.club%3Fid%3D" . $id . "' target='_blank'><img class='socialicons' alt='Facebook' src='facebook-icon.png' /></a>";
        echo "<a target='_blank' href='https://twitter.com/share?url=http%3A%2F%2Fcoincoffee.club%3Fid%3D" . $id . "&via=BarrioBitcoin&text=Check%20this%20%23bitcoin%20place%20on%20%23CoinCoffeeClub%3A'><img class='socialicons' alt='Twitter' src='twitter2.png' /></a><a href='$directionsBMAP' target='_blank'><img class='socialicons' alt='Bitcoin Maps' src='bitcoinmap-icon-192x192.png' style='padding:0px;margin-right: 0.4%;' /></a><a href='$directions' target='_blank'><img class='batsch' alt='Google Maps Badge' src='img/badges/google-maps-badge564x168.png' /></a></div>";
        echo "<br />";
        echo "<br />";
        echo "<hr />";
        echo "<br />";
        echo "<br />";
        $counter++;
    }
    return $counter;
}

function printCurrentFilterSettings($category, $tagfilter, $param_location) {
    echo "<h5 style='color:#EEE;'>&nbsp;";

    if (isset($_GET['category'])) {
        $catType=-1;
        if ($category === "restaurant") {
          $catType=0;
        } else if ($category === "food") {
          $catType=1;
        } else if ($category === "bar") {
          $catType=2;
        } else if ($category === "super") {
          $catType=3;
        } else if ($category === "shop") {
          $catType=4;
        } else if ($category === "hotel") {
          $catType=5;
        }

        if ($catType !== -1)
        echo "<div class='btn-group' onclick='goToHome(1,\"category=" . $category . "\");'>";
          echo "<button type='button' class='btn btn-success'><a href='#'><img style='width:24px;height:24px;padding:0px;margin:0px;' class='icon' alt='" . $category . "' src='img/icons/icon$catType.png' /></a></button>";
          echo "<button type='button' class='btn btn-success'>";
            echo "<a href='#'><b style='font-size:larger;'>X</b></a>";
          echo "</button>";
        echo "</div>&nbsp;&nbsp;";
    }

    if (isset($_GET['tag'])) {
        echo "<div class='btn-group' onclick='goToHome(2,\"tag=" . $tagfilter . "\");'>";
          echo "<button type='button' class='btn btn-primary'><a href='#'><b>" . $tagfilter . "</b></a></button>";
          echo "<button type='button' class='btn btn-primary'>";
            echo "<a href='#'><b style='font-size:larger;'>X</b></a>";
          echo "</button>";
        echo "</div>&nbsp;&nbsp;";
    }

    if (isset($_GET['location'])) {
        echo "<div class='btn-group' onclick='goToHome(3,\"location=" . $param_location . "\");'>";
          echo "<button type='button' class='btn btn-info'><a href='#'><b>" . $param_location . "</b></a></button>";
          echo "<button type='button' class='btn btn-info'>";
            echo "<a href='#'><b style='font-size:larger;'>X</b></a>";
          echo "</button>";
        echo "</div>";
    }

    echo "</h5>";
}

?>
