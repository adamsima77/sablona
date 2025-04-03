<?php include_once "parts/header.php"?>
<?php include "parts/nav.php" ?>
<?php include_once "class/qna.php"; ?>
<?php use otazkyodpovede\Qna?>

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
  
       
        <?php 
              //Vytvorenie nového objektu a volanie metód
              $qna = new Qna();
              $qna->insertQnA();
              $otazky_odpovede = $qna->vypisQna()
        ?>
        
       
        <?php
        //Výpis otázok a odpovedí
        foreach($otazky_odpovede as $a):?>
        <div class="accordion">            
        <div class="question"><?php echo $a['otazka'];?></div>           
        <div class="answer"><?php echo $a['odpoved'] ?></div>     
        
       </div>    
       <?php endforeach; ?>
       
      </section>

    </section>
  </div>
  </main>
  <?php include_once "parts/footer.php"?>