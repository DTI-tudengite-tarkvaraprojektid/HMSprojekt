# Enesejälgimispäevik
Hasartmängusõltlastele eneseseire tööriist

PILT

Projekti eesmärk on võimaldada hasartmängu- ja arvutisõltlastele keskkond, kus nad saavad igapäevaselt oma edusammudest ja tagasilöökidest päevikut pidada ja vajadusel sissekandeid otse oma nõustajale saata, et nõustamisel oleks hea ülevaade vahepealse perioodi toimumistest.

Projekt on tehtud TLU DTI informaatika eriala esimese kursuse tarkvaraarenduse aine raames.

Kasutatud tehnoloogiad:

Projektis osalesid:

Julika Maiste

Tanel Kuklane

Mihkel Jäe

Keskkond kasutab kahete SQL andmebaasi tabelit:

CREATE TABLE diary( id INT, type INT, date timestamp, answer1 INT, answer2 INT, answer3 INT, nswer4 INT, answer5 INT, answer61 VARCHAR(100), answer62 INT, answer7 VARCHAR(1000), answer8 INT );

CREATE TABLE userinfo( id INT AUTO_INCREMENT, username VARCHAR(50), email VARCHAR(128), password VARCHAR(128), status INT DEFAULT NULL );

MIT litsents:

