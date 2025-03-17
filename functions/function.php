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