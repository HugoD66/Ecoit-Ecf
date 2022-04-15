<h1>•<i> PROJET ECO-IT</i></h1>


***
<h2>ECF Hugo DESSAUW</h2>
***
<h3>SOMMAIRE</h3>

<ul>
    <li>Introduction</li>
    <li>Manuel d'installation</li>
    <li>Manuel d'utilisation</li>
</ul>

Todo list du projet => 
<a href="https://trello.com/b/5sZAwfu7/conduite-de-projet-ecf"> Lien </a>

<h4>•<u>Introduction</u></h4>

C’est un fait, la crise écologique est devenue une urgence majeure.La 
sixième extinction massive a déjà commencé et le changement climatique
se fait de plus en plus ressentir au fil des années.
Eco-it, référence française pour les développeurs soucieux de leur
impact digital, désire lancer une plateforme de partage sur Internet
permettant à tout instructeur expert en accessibilité et en
éco-conception web de présenter des modules de cours, suite à un entre-
-tient face à Eco-it.
A la suite de cela, la formation sera à disposition de tous ceux qui 
veulent s'instruire et en connaitre plus sur leur empreinte numérique!

<h4>•<u>Manuel d'installation</u></h4>  

   Veuillez à suivre la bonne procédure pour avoir avoir accés au projet en local.

<ul>  
<li>Positionnez vous dans le repertoire où vous souhaitez implanter votre
application, puis tapez dans votre terminal:</li>

    git clone https://github.com/HugoD66/Ecoit-Ecf </br>
    cd ../dossier-choisi
    npm install
    npm start

<li>Veuillez tout de même avoir XAMPP ou WAMPP installé sur votre poste de 
travail, si vous ne le possedez pas , je vous invite à suivre ce tutoriel:</li>
    
    https://www.ionos.fr/digitalguide/serveur/outils/tutoriel-xampp-creer-un-serveur-de-test-local/
    
<li>Apres l'avoir installé , Activez dans le logiciel Apache et MySQL . 
Allez ensuite dans votre editeur, installez les dépendances : </li>

    composer install
      
<li>Configuez votre .env, afin d'avoir accés à la base de donnée. Pour cela,
je vous conseille de suivre cette vidéo :</li>

    https://www.youtube.com/watch?v=KGXniAm4Tec

<li>Allez ensuite dans votre terminal, et si vous avez installé Symfony, 
vous pourrez avoir accés à votre site en local:</li>

    symfony server:start

<li>Sinon utilisez Composer avec : </li>
    
    composer require symfony/web-server-bundle --dev
    php bin/console server:start
</ul>  

<h4>•<u>Manuel d'utilisation</u></h4>  






