�ios aplikacijos tikslas - teikti informacij� apie kompiuterin� "League of Legends" �aidim�, susijusias naujienas, didesn� d�m�s� skiriant Lietuvos rinkai.
Taip pat, vienyti �io �aidimo sek�j� bendruomen� ir skatinti tarpusavyje dalintis ��valgomis bei �iniomis. Aplikacija yra suskirstyta � kelias pagrindines dalis:

1. Forumas
Forumo �inutes gali skaityti visi lankytojai, ta�iau kurti temas, komentuoti bei ra�yti atsakymus yra prieinama tik registruotiems vartotojams. Vartotojas gali komentuoti ne tik
sukurtas temas, bet ir jose esan�ius komentarus. Be to, autentifikuotas vartotojas gali �vertinti komentarus paspausdamas "like" arba "dislike", o atitinkam� kiek� neigiam� komentar� surinkusios �inut�s turinys yra nerodomas vie�ai. Narys, kuris
praeityje teigiamai �vertino tam tikr� komentar�, gali dar kart� paspausti "like" ir taip jo �vertinimas bus pa�alinamas. Analogi�kai veikia neigiam� komentar� ("dislike") 
funkcionalumas. Kiekvienas vartotojas mato tik savo komentar� redagavimo ir trinimo funkcijas, be to, yra naudojama apsauga nuo meginimo pasiekti metod� per URL adres�.

2. Naujienos
�ia pateikiamos naujausios �inios apie Legend� Lygos �aidimo sfer� Lietuvoje. Tiek lankytojas, tiek registruotas vartotojas gali tik per�i�r�ti turin� ir yra atribojami
nuo modifikavimo galimybi�. Tai gali daryti tik �galinti vartotojai kaip "admin".

3. Streamer'iai
�ioje skiltyje yra atvaizduojami �inomi Lietuvos twitch.tv nariai (ang. "Streamers", kurie gyvai transliuoja min�t�j� �aidim�). Paspaudus ant �ios skilties, yra parodomas 
nari� s�r��as ir b�sena t.y. ar jie transliuoja tuo metu. Paspaudus ant slapyvard�io, nar�ykl�je atidaromas pasirinkto twitch.tv streamer'io transliacijos langas. Kolkas 
nari� s�ra�as yra ribotas ir atrinktas testavimui, ta�iau ateityje bus nuolatos pildomas. Visiems vartotojams ir lankytojams yra prienama filtravimo funkcija, kur paspaudus
"Visi" bus parodomas pilnas s�ra�as, "Online" - parodys tuo metu gyvai transliuojan�ius streamerius, o atitinkamai "Offline" - neprisijungusiusiuos.

P.S. Visi aplikacijoje naudojami duomenys yra saugomi MySQL duomen� baz�je.


***Prisijungimas ir Registracija***
De�iniame navigacinio meniu lauke yra reigstracijos ir prisijungimo nuorodos. U�siregistraves, o v�liau ir prisijung�s vartotojas, toj pa�ioje vietoje gali rasti asmeninio
profilio modifikavimo nuoroda, kuria pasekus bus galima pakeisti vartotojo ikon�, slapyvard� bei elektronin� pa�t�.



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