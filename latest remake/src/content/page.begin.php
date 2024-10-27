<?php
    gn_print_pagestart('Rozpocznij przygodę', 'Gorciu.NET to miejsce gdzie możesz dzielić się swoimi przemyśleniami bez żadnej cenzury i bez naruszeń prywatności!');
?>
<h1 class="begintext-8sd8d">Rozpocznij przygodę z Gorciu.NET już teraz!</h1>
<p class="bigtext-63479c half60-fdzh79c">Dzięki naszym najnowszym funkcjom możesz komfortowo pisać i czytać posty bez cenzury oraz wchodzić w interakcję z różnymi nieznajomymi użytkownikami. I to wszystko <span class="changing-text-6fhvf7"></span>!</p>
<br>
<h2>Czytaj posty, pisz swoje myśli, reaguj!</h2>
<p class="bigtext-63479c half60-fdzh79c">Strona główna to dosłowny <span class="mig-98fg7sb">dom dla postów</span>. Możesz tworzyć swoje własne, oglądać posty innych, a nawet reagować na nie. Wyraź swoje opinie i odczucia na temat danego posta w komentarzach.</p>
<p>Przykładowe reakcje: <span class="textcolored-34nu">👍 Podoba mi się!</span> | <span class="textcolored-34n7">🤬 Nienawidzę tego!</span></p>
<br>
<h2>Rozwijaj swoje zainteresowania!</h2>
<p class="bigtext-63479c half60-fdzh79c">Na Gorciu.NET możesz znaleźć ludzi, którzy interesują się tym samym co ty! W dodatku, możesz pisać i wyrażać swoje opinie na różnych <span class="mig-98fg7sb">livechatach</span> dostępnych na portalu!</p>
<div class="sidebar-9fvh8">
    <h2>Przekonałem Cię?</h2>
    <p>Ten portal ma więcej do zaoferowania niż Ci się wydaje!</p>
    <br>
    <h3>Wracasz ponownie?</h3>
    <p>Użyj tego krótkiego formularzu, aby powrócić do swojej przygody.</p><br>
    <form action="/api/login.php" method="post">
        <input type="text" name="login" placeholder="Login"><br><br>
        <input type="password" name="password" placeholder="Hasło"><br><br>
        <button type="submit">Zaloguj się</button>
    </form>
    <br>
    <h3>Jesteś tu pierwszy raz?</h3>
    <p>Użyj tego krótkiego formularzu, aby powrócić do swojej przygody.</p><br>
    <form action="/api/register.php" method="post">
        <input type="text" name="login" placeholder="Username"><br>
        <p class="margined-8fvh7"><span class="textcolored-34n7">Wybierz ostrożnie!</span> Ten username będzie Twoim jedynym identyfikatorem i nie będzie możliwy do zmienienia.</p>
        <br>
        <input type="text" name="displayname" placeholder="Wyświetlana nazwa"><br><br>
        <input type="password" name="password" placeholder="Hasło"><br><br>
        <p class="margined-8fvh7"><input type="checkbox" name="accept"> Akceptuję warunki <a href="/tos">Terms Of Service</a> Gorciu.NET i zgadzam się na używanie cookies i podobnych technologii, aby móc zapewniać Ci dostęp do portalu i zapobiegać oszustwom zgodnie z <a href="/privacy">polityką prywatności</a>.</p><br>
        <button type="submit">Zaloguj się</button>
    </form>
</div>
<script src="/assets/begin.js"></script>
<?php
    gn_print_pageend();