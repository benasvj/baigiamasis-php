# baigiamasis-php

ijos tikslas - teikti informaciją apie kompiuterinį "League of Legends" žaidimą, susijusias naujienas, didesnį dėmėsį skiriant Lietuvos rinkai.
Taip pat, vienyti šio žaidimo sekėjų bendruomenę ir skatinti tarpusavyje dalintis įžvalgomis bei žiniomis. Aplikacija yra suskirstyta į kelias pagrindines dalis:

1. Forumas
Forumo žinutes gali skaityti visi lankytojai, tačiau kurti temas, komentuoti bei rašyti atsakymus yra prieinama tik registruotiems vartotojams. Vartotojas gali komentuoti ne tik
sukurtas temas, bet ir jose esančius komentarus. Be to, autentifikuotas vartotojas gali įvertinti komentarus paspausdamas "like" arba "dislike", o atitinkamą kiekį neigiamų komentarų surinkusios žinutės turinys yra nerodomas viešai. Narys, kuris
praeityje teigiamai įvertino tam tikrą komentarą, gali dar kartą paspausti "like" ir taip jo įvertinimas bus pašalinamas. Analogiškai veikia neigiamų komentarų ("dislike") 
funkcionalumas. Kiekvienas vartotojas mato tik savo komentarų redagavimo ir trinimo funkcijas, be to, yra naudojama apsauga nuo meginimo pasiekti metodą per URL adresą.

2. Naujienos
Čia pateikiamos naujausios žinios apie Legendų Lygos žaidimo sferą Lietuvoje. Tiek lankytojas, tiek registruotas vartotojas gali tik peržiūrėti turinį ir yra atribojami
nuo modifikavimo galimybių. Tai gali daryti tik įgalinti vartotojai kaip "admin".

3. Streamer'iai
Šioje skiltyje yra atvaizduojami žinomi Lietuvos twitch.tv nariai (ang. "Streamers", kurie gyvai transliuoja minėtąjį žaidimą). Paspaudus ant šios skilties, yra parodomas 
narių sąrąšas ir būsena t.y. ar jie transliuoja tuo metu. Paspaudus ant slapyvardžio, naršyklėje atidaromas pasirinkto twitch.tv streamer'io transliacijos langas. Kolkas 
narių sąrašas yra ribotas ir atrinktas testavimui, tačiau ateityje bus nuolatos pildomas. Visiems vartotojams ir lankytojams yra prienama filtravimo funkcija, kur paspaudus
"Visi" bus parodomas pilnas sąrašas, "Online" - parodys tuo metu gyvai transliuojančius streamerius, o atitinkamai "Offline" - neprisijungusiusiuos.

P.S. Visi aplikacijoje naudojami duomenys yra saugomi MySQL duomenų bazėje.


***Prisijungimas ir Registracija***
Dešiniame navigacinio meniu lauke yra reigstracijos ir prisijungimo nuorodos. Užsiregistraves, o vėliau ir prisijungęs vartotojas, toj pačioje vietoje gali rasti asmeninio
profilio modifikavimo nuoroda, kuria pasekus bus galima pakeisti vartotojo ikoną, slapyvardį bei elektroninį paštą.



Naudojamos technologijos:

*Laravel Framework 5.6.13
*twitch.tv API (alternatyva: https://wind-bow.glitch.me/)
*Javascript ir jQuery 3.3.1
*Bootstrap 4 + papildomas stiliaus failas custom.css (resources/assets/sass)



Planuojami ateities vystymai:
*PM and notifications
*Live Chat
*Account's (of the game) historical measures, performance indicies, match info by using Riot Games API
*Guides creation tool
