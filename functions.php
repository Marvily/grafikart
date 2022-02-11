<?php
function nav_item(string $lien, string $titre,string $linkClass = ''):string{
//    $linkClass = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] === $lien){
        $linkClass .= " active";
    }

    return <<<HTML
        <li class="nav-item ">
            <a class="$linkClass" href="$lien">$titre</a>
        </li>
HTML;
}

function nav_menu(string $linkClass = ''):string{
    return
        nav_item('/grafikart/index.php', 'Accueil', $linkClass).
        nav_item('/grafikart/contact.php', 'Contact', $linkClass).
        nav_item('/grafikart/jeu.php', 'Jeu', $linkClass);
}