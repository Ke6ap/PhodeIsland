<?php
    session_start();
    require_once("connection.php");
    include("functions.php");
    date_default_timezone_set('Europe/Athens');

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="CSS/style_menu.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>
    </head>
    <body style="background-color: beige;">

        <nav class="navbar-custom navbar navbar-expand-md navbar-dark sticky-top" id="navig">
            <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img id="logo" src="CSS/images/LogoW.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="menu.php">Food Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="reservation_form.php">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                </div>
        </nav>


        <div class="wrapper col-12">
            <div class="title">
                <h4><span>fresh food for good health</span>our menu</h4>
            </div>
            <h2 class="title" id="maindish">Main dishes</h2>
            <div class="menu" >
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish1.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Beef with fried vegetables <span>35€</span><br><br></h4>
                        <p>Slices of wagyu beef served with fried tomatoes, zucchini and mushrooms.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish2.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Fried Chicken<span>25€</span><br><br></h4>
                        <p>Chicken breast bites with mixed cheese sause and mushrooms.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish3.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Capricciosa Pasta<span>25€</span><br><br></h4>
                        <p>Capricciosa pasta served with fried tomatos and garlic.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish4.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Spaghetti Napolitana<span>25€</span><br><br></h4>
                        <p>Spaghetti napolitana served with fresh tomatoes and chicken.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish5.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Lasagna<span>30€</span><br><br></h4>
                        <p>Homemade lasagna with grounded wagyu beef and paprika.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/maindish6.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Potato Soup<span>20€</span><br><br></h4>
                        <p>Potato cream soup with fresh onion and smoked bacon slices.</p>
                    </div>
                </div>
            </div>
            <h2 class="title" id="seaF">Sea Food</h2>
            <div class="menu" >
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/seafood1.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Sea Bream Fillet<span>35€</span><br><br></h4>
                        <p>Sea bream fillet served with yogurt sauce and beans .</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/SEAFOOD2.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Stripped bass with Vegetables<span>45€</span><br><br></h4>
                        <p>Stripped bass bites served with colorful peppers peppers and orange sause.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/seafood3.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Salmon Canapes<span>35€</span><br><br></h4>
                        <p>Salmon canapes with avocado served with mushed potatoes and vinegar sauce.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/seafood4.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Las Vegas Shushi Rolls<span>45€</span><br><br></h4>
                        <p>Deep fried shushi rolls with cream cheese, avocado, yamagobo, crab, and assorted fish inside.</p>
                    </div>
                </div>
            </div>
            <h2 class="title" id="salad">Salads</h2>
            <div class="menu">
                <div class="single-menu ">
                    <img src="CSS/images/MenuItems/salad1.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Vegan Salad<span>10€</span><br><br></h4>
                        <p>Vegan salad with lettuce, mandarin , soy crouton and colorful peppers.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/salad2.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Green Salad <span>9€</span><br><br></h4>
                        <p>Salad with green vetables, lettuce, onion and fresh tomatos served with chicken fillet.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/salad3.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Country Salad<span>12€</span><br><br></h4>
                        <p>Salad with boiled eggs, green beans, corn, gresh tomatoes, cucamber and radicchio lettuce.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/salad4.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Tuna Salad<span>15€</span><br><br></h4>
                        <p>Tuna salad served with hard boiled eggs, lettuce, fresh tomato and vinegar.</p>
                    </div>
                </div>
            </div>

            <h2 class="title">Desserts</h2>
            <div class="menu">
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/desert1.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Chocolate Souffle<span>7€</span><br><br></h4>
                        <p>3 souffle's filled with milk and dark chocolate cream and caster sugar on top.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/desert2.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Raspberry Cheese Cake <span>7€</span><br><br></h4>
                        <p>Raspberry cheese cake with dark chocolate base and caramel syrup.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/desert3.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Pavlova <span>8€</span><br><br></h4>
                        <p>Pavlova with whipped cream and strawberry toppings.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/desert4.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Ice cream<span>6€</span><br><br></h4>
                        <p>3 ice cream scoops with vanilla, chocolate and bueno flavors.</p>
                    </div>
                </div>
            </div>

            <h2 class="title">Drinks</h2>
            <div class="menu">
                <div class="single-menu ">
                    <img src="CSS/images/MenuItems/drinks1.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Whiskey <span>12€</span><br><br></h4>
                        <p>Brands: Jack Daniels, Chivas Regal, Cardhu, Lagavulin and Balvenie.</p>
                    </div>
                </div>
                <div class="single-menu ">
                    <img src="CSS/images/MenuItems/drinks2.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Wine <span>10€</span><br><br></h4>
                        <p>Brands: Château Lafite Rothschild (Bordeaux), Marchesi Antinori and Louis Roederer (Champagne).</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/drinks3.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Cocktails <span>15€</span> <br><br></h4>
                        <p>Negroni, Daiquiri, Dry Martini, Margarita, Manhattan, Mojito and Sazerac.</p>
                    </div>
                </div>
                <div class="single-menu">
                    <img src="CSS/images/MenuItems/drinks4.jpg" alt="error">
                    <div class="menu-content">
                        <h4>Smoothies<span>8€</span><br><br></h4>
                        <p>Banana-Berry Smoothie, Pineapple-Citrus Smoothie and Pomegranate-Berry Smoothie.</p>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>