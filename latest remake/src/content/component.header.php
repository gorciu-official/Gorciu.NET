<?php
    /** 
     * Gorciu.NET
     * A future social-media platform with superpowers.
     * (c) 2024 Gorciu
    */
?>
<header>
    <div class="first">
        <img src="/assets/favicon.ico" alt="Gorciu.NET icon" class="headericon-x56dfs">
    </div>
    <div class="second">
        <img src="/assets/usericon.jpg" alt="You" class="headericon-x8ffs">
    </div>
</header>
<div class="account-popup hidden">
    <?php if (!$user) { ?>
    <h2>Niezalogowany</h2>
    <p>Nie jesteś zalogowany do Gorciu.NET! Nie możesz przeglądać takich funkcji jak ustawienia, posty czy używać portalu w 100%!</p>
    <br>
    <a href="/login/">Zaloguj się</a>
    <?php } else { ?>
    <h2>Witaj @<?php echo $user; ?></h2>
    <?php } ?>
</div>
<main>