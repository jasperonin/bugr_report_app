<?php


$server = str_replace("/public_html_2", "", $_SERVER['REQUEST_URI']);

    switch ($server) {
        case "/":
            require "./assets/front_end/login.php";
            break;
        case "/home_page":
            require './assets/front_end/home_page.php';
            break;
        case "/new_ticket":
            require './assets/front_end/create_new_ticket.php';
            break;
        case "/ticket":
            require './assets/front_end/tickets.php';
            break;
        case "/account":
            require './assets/front_end/create_user.php';
            break;
        case "/reset":
            require './assets/front_end/reset.php';
            break;            
        default:
            // Default case can handle 404 or redirect to a default page
            // require './assets/front_end/404.php';
            break;
    }
?>