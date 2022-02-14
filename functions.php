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

function checkbox(array $valeurs, string $name, $methode){

    $text = '';
    if (count($valeurs) > 0){
        foreach ($valeurs  as $key => $value){
            $attribut = '';
            if (isset($methode) && isset($methode[$name])){
                if (in_array($value,$methode[$name])){
                    $attribut = 'checked';
                }
            }
            $text.= <<<HTML
        <input type="checkbox" name="{$name}[{$key}]" value="$value" $attribut> $key - $value €<br>
HTML;
        }
        return $text;
    }
}

function radio(array $valeurs, string $name, $methode){
    $text = '';

    if (count($valeurs) > 0){
        foreach ($valeurs  as $key => $value){
            $attribut = '';
            if (isset($methode) && isset($methode[$name])){
//                var_dump($methode[$name], $value);
                if ($value == $methode[$name]){
                    $attribut = 'checked';
                }
            }
            $text.=  <<<HTML
        <input type="radio" name="$name" value="$value" $attribut> $key - $value €<br>

HTML;
        }
        return $text;
    }
}

function dataGlace($glace,$bases){

    $prix = null;
    $ingredients = null;
    if (isset($glace)){
        foreach ($glace as $key => $element){
            if (gettype($element) == "array"){
                foreach ($element as $keyElem => $valueElem){
                    $ingredients.=  <<<HTML
        <li>$keyElem</li>
HTML;
                    $prix+= (float)$valueElem;
                }
            }else{
                $test = array_search($element, $bases);
                $ingredients.=  <<<HTML
        <li>$test </li>
HTML;
                $prix+=(float)$element;
            }
        }
    }
    return [$ingredients, number_format($prix, 2, ',', '.')." €"];
}

function dump($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux, $jours){
    $phrase = [];
    for ($x = 0; count($creneaux) > $x; $x++){
        $attribut = '';

        if((date('N')  )== $x +1){
        $attribut = " style='color: green;'";
        }
        $text = '<li'.$attribut.'><strong>'.$jours[$x].'</strong> : ';

        if($x <5){
            $text .= "Ouvert";
            for ($y = 0; count($creneaux[$x]) > $y; $y++){
                $text .= " de ".$creneaux[$x][$y][0]."h à ".$creneaux[$x][$y][1]."h";
                if ((count($creneaux[$x]) -1) > $y){
                    $text.= " et ";
                }
            }
        }else{
            $text .= " Fermé";
        }

        $phrase[]= $text.'</li>';
    }
    return '<small><ul>'.implode( $phrase).'</ul></small>';
}

function in_creneau ($heureNow,$creneaux,$semaine){
    $response = false;
            foreach ($creneaux[$semaine] as $cle => $value){
                if ((($value[0]*100) < $heureNow) &&(($value[1]*100) > $heureNow)){
                    $response =  true;
                }
            }
    return $response;
}

function alert_html($bool){
    $text = null;
    if ($bool){
        $text = <<<HTML
    <div class="alert alert-success" role="alert">
      Le magasin est ouvert!
    </div>
HTML;

    }else{
        $text = <<<HTML
    <div class="alert alert-danger" role="alert">
      Le magasin est fermé!
    </div>
HTML;

    }
    return $text;
}