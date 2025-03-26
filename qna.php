<?php include_once "parts/header.php"?>
<?php include "parts/nav.php" ?>
  <main>
    <section class="banner">
      <div class="container_1 text-white">
        <h1>Q&A</h1>
      </div>
    </section>
    <section class="container">
      <div class="row">
        <div class="col-100 text-center">
          <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em></strong></p>
        </div>
      </div>
      <section class="container">  
      <?php include "otazky.php"; ?>    
      <?php for ($i = 0; $i < count($otazky); $i++) { 
        ?>     
        <div class="accordion">            
        <div class="question"><?php echo $otazky[$i]; ?></div>           
        <div class="answer"><?php echo $odpovede[$i]; ?></div>     
       </div>    <?php
        } ?>
       
      </section>

    </section>
  </div>
  </main>
  <?php include_once "parts/footer.php"?>