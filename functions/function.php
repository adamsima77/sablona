<?php
function portfolio($jsonFile) {
    
    $json = file_get_contents($jsonFile);
    $data = json_decode($json, true);
    
  
    echo '<section class="container">';
    
    $counter = 0;
    foreach ($data['portfolio'] as $index => $item) {
        if ($counter % 4 == 0) {
            if ($counter > 0) echo '</div>'; 
            echo '<div class="row">'; 
        }
        echo '<div class="col-25 portfolio text-white text-center" id="portfolio-' . ($index + 1) . '">';
        echo $item;
        echo '</div>';
        $counter++;
    }
    
    echo '</div>'; 
    echo '</section>';
}
?>
<?php
function obrazky($jsonFile) {

    $json = file_get_contents($jsonFile);
    $data = json_decode($json, true);
    echo '<section class="slides-container">';
    foreach ($data['obrazky'] as $item) {
        echo '<div class="slide fade">';
        echo '<a href="' . $item['url'] . '">';
        echo '<img src="' . $item['src'] . '" alt="' . $item['nazov'] . '">';
        echo '<div class="slide-text">';
        echo $item['nazov'];  
        echo '</div>';   
        echo '</a>';  
        echo '</div>'; 
    }
    echo '</section>';  
}
?>




<?php
/*Implementácia funkcie pre zmenu štýlu na tmavý
Pri zatlačení tlačidla sa vymenia štýly v header.php*/
function Zmenatemy(){

    $theme = isset($_GET['theme']) ? $_GET['theme'] : 'light';
    if($theme === 'dark'){

        echo '<link rel="stylesheet" type="text/css" href="css/dark.css">';


    } else{

      
        echo '<link rel="stylesheet" type="text/css" href="css/accordion.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/banner.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/form.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/portfolio.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/slider.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

    }


}


?>