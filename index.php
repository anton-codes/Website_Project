<!DOCTYPE html>
<html lang="en">

<?php

    include 'header.php';
    include 'menuItem.php';

    // Setting timezone
    date_default_timezone_set ( 'US/Eastern' );

    // Initializing two objects that will be added to today's specials
        $object1 = new menuItem("The WP Burger", "Freshly made all-beef patty served up with homefries", 14);
        $object2 = new menuItem("WP Kebabs", "Tender cuts of beef and chicken, served with your choice of side", 17);

        // Populating today's specials.
        $name1 = $object1->getItemName();
        $description1 = $object1->getDescription();
        $price1 = $object1->getPrice();
        $name2 = $object2->getItemName();
        $description2 = $object2->getDescription();
        $price2 = $object2->getPrice();

?>
<body>
    <div>

<aside>
    <h2><?php  echo date('l').'\'s' ?> Specials</h2>
    <hr>
    <img src="images/burger_small.jpg" alt="Burger"
         title="Monday's Special - Burger">
    <h3><?php echo $name1; ?></h3>
    <p><?php echo $description1; ?> - $<?php echo $price1; ?></p>
    <hr>
    <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
    <h3><?php echo $name2; ?></h3>
    <p><?php echo $description2; ?> - $<?php echo $price2; ?></p>
    <hr>
</aside>

            <div id="content" class="clearfix">

                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
            <?php include 'footer.php'; ?>
        </div><!-- End Wrapper -->
    </body>
</html>
