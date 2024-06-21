<?php require_once 'header.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neutraal Kieslab</title>
  <link rel="stylesheet" href="../css/index.css">
  <script src="project2.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
  <nav>
    <a href="index.php">home</a>
    <a href="partijen.php">partijen</a>
    <a href="nieuws.php">nieuws</a>
    <a href="stellingen.php">stellingen</a>
  </nav>

  <div class="DivContainer">
    <div class="fototest">
      <img id="imgPar" src="../Logos/stemming.jpg" alt="parlament">
    </div>

    <div class="titelGrid">
      <div class="titel">
        <h1>Doe de StemWijzer</h1>
      </div>

      <form action="start.php" id="form" method="POST">
        <button id="btStartWijzer" type="submit">Start</button>
       
      </form>
      
    </div>
    
    <article class="articleStem">
    <h1>Waarom zou ik stemmen?</h1>
    <p>Het is een unieke gelegenheid waarop we met z’n allen over de toekomst van de Europese Unie kunnen beslissen. Of het nu voor gemeentes, het nationale parlement of het Europees Parlement is, stemmen is altijd belangrijk. Het is een uitgelezen kans om je mening te geven over belangrijke onderwerpen.</p>
    <h1>Alle stemmen zijn Belangrijk</h1>
    <p>Bepaal je stem niet alleen op basis van wat goed is voor jezelf. Denk ook na over wat jij belangrijk vindt voor iedereen in onze samenleving. Bedenk je ook dat democratie niet vanzelfsprekend is. Vorige generaties hebben hard moeten vechten voor die democratie. Daarom gaan ouderen ook meer stemmen en worden hun belangen meer gehoord in de politiek.</p>
    <br>
    <h1>Waar kan ik stemmen?</h1>
    <p>Weet je niet waar je kunt? <br>
    klik<a href="https://waarismijnstemlokaal.nl/">hier</a>om je dichtsbijzijnde stem bureau te vinden
  
    </p>
    </article>

    <article class="articleWe">
          <h1>Neutral Kieslab</h1>
          <h2>wie zijn wij?</h2>
          <p>Wij zijn een kleine en heel ambitieus berdijf die snel door goeid op het oppervalkte van verkiezingen</p>
          <h2>Wat doen wij?</h2>
          <p>wij specialiseren zich in het StemWijzers maken voor de verkieiezingen zodat mensen kunnne uitzoeken op ze gaan stemmen en om partijen beter te leren kennen</p>
          <br>
          <img class="ictfoto" src="../Logos/verkiezingen.jpg" alt="ict">
    </article>

  
    
   
    
  </div>

   
  
  <?php require 'footer.php' ?>
</body>

</html>