<?php


    echo 'My first PHP script!';
    echo "Sodala, jetzt wird gelernt!";

    #So kann man kommentieren
    //So aber auch. Interessant...
    /*
        ...und so kann man über mehrere Zeilen kommentieren.
        Ich verstehe...
        Fgidde!
    */
    
    #Mit $ kann man Variablen deklarieren

    $String = "Hallo";
    $Int = 4;
    $Float = 9.453;

    $Int += 2000;

    $Int = !$Int;

    #Irgendwie gehen Booleans aber anders...
    #Aha doch nicht.

    $Boolw = "true";

    echo $Float + $Int;

    print "Hello " . $Int . "So kann man also zeug kombinieren, mit einem Punkt.";

    $Arraytest[$String, $Int, $Float, $Boolw];

    // for $i in $Arraytest
    //   if (i.gettype() = "Boolean")
    //     print "yay"


    #Wenn man '' benutzt, werden Variablen ignoriert, wenn man "" benutzt nicht.



/*
    __________BASICS__________

    Man muss jedes Statement mit ; beenden!

    --Variablen--

    Variablen werden mit $ definiert. Bsp.: $x;
    Man kann einer variable später oder auch gleich beim definieren einen Wert zuweisen. Bsp.: $x = "Hallo";
    Es gibt folgende Variablentypen:
        Integer = Ganze Zahlen
        Float = Reelle Zahlen
        String = Text
        Boolean = Ja/Nein
        Array = Ansammlung an anderen Variablen

    ++ erhöht eine Variable um 1. Bsp.: $x++;
    +=, -=, *= und /= Setzen eine Variable auf sich selbst, verrechnet mit dem angegebenen Wert. Bsp.: $x *= 20;
    !$x ist genau das Gegenteil einer Boolean. True wird zu false und umgekehrt.
    Arrays werden mit [] befüllt. Bsp.: $x = ["y","z","a"];
    In einem Array können auch immer 2 Datenpakete pro Inhalt gespeichert werden. Bsp.: $x = ["y"=>1,"z"=>2]

    --Vergleichen--

    = wird zum Definieren benutzt, während == zum Vergleichen benutzt wird.
    Mit != wird überprüft, ob Dinge ungleich sind.
    Alternativ zu == und != gibt es auch >, <, >=, <=.
    Mit && kann man mehrere Statements gleichzeitig überprüfen.
    Mit || kann man überprüfen, ob mindestens 1 von mehreren Statements wahr/falsch/... ist.

    If-Statements sind folgendermaßen aufgebaut:

    if (x == y) {
        code;
    }

    Else-Statements werden aktiviert, wenn das vorherige If-Statement scheitert:

    if (1 == 2) {
        code1;
    }
    else {
        code2;
    }
    
    Elseif kann als Abkürzung für ein If-Statement nach einem Else-Statement dienen.
    Man kann Switch-Statements verwenden, um eine Menge If-Statements zu vermeiden.

    Switch-Statements sind folgendermaßen aufgebaut:

    switch ($x) {
        case Wert1:
            code1;
            break;

        case Wert2:
            code2;
            break;

        case Wert3:
            code3;
            break;
        
        default:
            code4;
            break;
    }
    
    Das break; markiert das Ende eines Falles. Default ist optional und führt code aus, falls alles andere falsch ist.

    --Schleifen--

    While-Schleifen sind folgendermaßen aufgebaut:

    while (x == y) {
        code;
        $i++;
    }

    Sie werden entweder beendet, indem sie nicht mehr wahr sind, oder indem man break; innerhalb der Schleife benutzt.
    Benutzt man continue; innerhalb einer Schleife, wird der Code danach übersprungen, und die While-schleife startet wieder von vorn.

    So ist eine "Wiederhole x-mal"-Schleife aufgebaut:

    $i = 0
    while ($i < 10) {
        code;
    }

    Do-While-Schleifen werden immer mindestens 1 mal ausgeführt, egal ob das Statement wahr oder falsch ist.

    So ist eine Do-While-Schleife aufgebaut:
    
    do {
        code;
    } while (x > y);

    For-Schleifen werden benutzt, um etwas basierend auf dem Ergebnis einer Rechnung oft zu machen.
    So ist eine For-Schleife aufgebaut:
    
    for ($i = 0; $i < 5; $i++) {
        code;
    }

    Im Endeffekt sind For-Schleifen somit Abkürzungen. Hier die unabgekürzte Version:
    
    $i = 0
    while ($i < 5) {
        code;
        $i++;
    }

    Foreach-Schleifen werden benutzt, um z.B. Arrays auszulesen. So sind sie aufgebaut:
    
    $colors["red","blue","green"]
    foreach ($colors as $x) {
        code
    }
    
    $x kann dann in dieser Schleife benutzt werden und nimmt den Wert von jeder Farbe einmal an.
    Werden Arrays mit => benutzt, kann das foreach so aussehen:     foreach ($colors as $x => $y)

    --Funktionen--

    So ist eine normale Funktion aufgebaut:

    function function_name(parameter_1, parameter_2) {
        return code
    }
    
    Funktionen können von überall im Code aufgerufen werden, indem man ihren Namen schreibt und passende Parameter einfüllt.
    Bsp.: $x = multiply(2,3);

    Der Wert, den $x nun hat, ist der, den die Funktion returnt. Returnt die Funktion nichts, ist dieses Statement falsch.
    Solche Funktionen kann man einfach so callen. Bsp.: set_brightness(100)








    GUT ZU WISSEN

    Mit "" werden Variablen beachtet, mit '' nicht.
    Wenn man vor einer Variable (Variablentyp) schreibt, wird sie konvertiert. Bsp.: $x = (string) 1.2;



    FUNKTIONSLISTE

    echo(x) druckt alles mögliche, mehrere Strings möglich.
    print(x) druckt alles mögliche, nur ein String möglich.
    strlen(String) sendet die Länge eines Strings.
    strtoupper(String) macht einen String UPPERCASE!!!
    strrev(String) dreht den String um.
    str_replace(zu Ersetzendes, Ersetztes, String) ersetzt bestimme Segmente eines Strings.
    substr(String, Startposition, Anzahl an Charakteren die du haben willst(Negative Zahlen um hinten anzufangen)(optional)) holt einen Teil eines Strings heraus.
    is_int(x) schaut, ob etwas ein Integer ist.
    intval(x) Konvertiert zu einem Integer.
    abs(Zahl) macht die Zahl positiv.
    sqrt(Zahl) rechnet die Quadratwurzel aus.
    define(Name, Wert) erstellt eine Konstante.












Arbeiten mit Bildern

Skalieren von Bildern benötigt immer 2 Bilder. 1 mal vorschau, 1 mal groß.
Bild wird hochgeladen.

1.Was ist der typ? wie groß ist es?

2. Was ist unsere Zielgröße? Leeres Bild erzeugen!

3. Bestehendes Bild in das neue, leere Bild kopieren!

4. Neues Bild speichern!
















*/
    

?>

<!DOCTYPE html>
<html lang = "de">
    <head>
        <meta charset="UTF-8" />
        <title>title</title>
        <link rel="stylesheet" href="styles.css">
        <script type="text/javascript" src="darkmode.js" defer></script>
    </head>
    <body>

    </body>
</html>