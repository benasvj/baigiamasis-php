Ðios aplikacijos tikslas - teikti informacijà apie kompiuteriná "League of Legends" þaidimà, susijusias naujienas, didesná dëmësá skiriant Lietuvos rinkai.
Taip pat, vienyti ðio þaidimo sekëjø bendruomenæ ir skatinti tarpusavyje dalintis áþvalgomis bei þiniomis. Aplikacija yra suskirstyta á kelias pagrindines dalis:

1. Forumas
Forumo þinutes gali skaityti visi lankytojai, taèiau kurti temas, komentuoti bei raðyti atsakymus yra prieinama tik registruotiems vartotojams. Vartotojas gali komentuoti ne tik
sukurtas temas, bet ir jose esanèius komentarus. Be to, autentifikuotas vartotojas gali ávertinti komentarus paspausdamas "like" arba "dislike", o atitinkamà kieká neigiamø komentarø surinkusios þinutës turinys yra nerodomas vieðai. Narys, kuris
praeityje teigiamai ávertino tam tikrà komentarà, gali dar kartà paspausti "like" ir taip jo ávertinimas bus paðalinamas. Analogiðkai veikia neigiamø komentarø ("dislike") 
funkcionalumas. Kiekvienas vartotojas mato tik savo komentarø redagavimo ir trinimo funkcijas, be to, yra naudojama apsauga nuo meginimo pasiekti metodà per URL adresà.

2. Naujienos
Èia pateikiamos naujausios þinios apie Legendø Lygos þaidimo sferà Lietuvoje. Tiek lankytojas, tiek registruotas vartotojas gali tik perþiûrëti turiná ir yra atribojami
nuo modifikavimo galimybiø. Tai gali daryti tik ágalinti vartotojai kaip "admin".

3. Streamer'iai
Ðioje skiltyje yra atvaizduojami þinomi Lietuvos twitch.tv nariai (ang. "Streamers", kurie gyvai transliuoja minëtàjá þaidimà). Paspaudus ant ðios skilties, yra parodomas 
nariø sàràðas ir bûsena t.y. ar jie transliuoja tuo metu. Paspaudus ant slapyvardþio, narðyklëje atidaromas pasirinkto twitch.tv streamer'io transliacijos langas. Kolkas 
nariø sàraðas yra ribotas ir atrinktas testavimui, taèiau ateityje bus nuolatos pildomas. Visiems vartotojams ir lankytojams yra prienama filtravimo funkcija, kur paspaudus
"Visi" bus parodomas pilnas sàraðas, "Online" - parodys tuo metu gyvai transliuojanèius streamerius, o atitinkamai "Offline" - neprisijungusiusiuos.

P.S. Visi aplikacijoje naudojami duomenys yra saugomi MySQL duomenø bazëje.


***Prisijungimas ir Registracija***
Deðiniame navigacinio meniu lauke yra reigstracijos ir prisijungimo nuorodos. Uþsiregistraves, o vëliau ir prisijungæs vartotojas, toj paèioje vietoje gali rasti asmeninio
profilio modifikavimo nuoroda, kuria pasekus bus galima pakeisti vartotojo ikonà, slapyvardá bei elektroniná paðtà.



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