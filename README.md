Ein leeres Grundgerüst für einen Text Parser
========================

Es fehlt die Implementierung des eigentlichen Parsers.

Commands
===

- composer install :) 
- php console.php parse-input "foo bar"
- phpunit (oder ./vendor/bin/phpunit)

Aufgabenbeschreibung
===

Bestimmte Merkmale des Textes sollen erkannt und automatisch herausgefiltert werden.
Hierfür soll eine Datenstruktur und eine entsprechende Verarbeitung erstellt werden.
Folgende Eingaben sollen erkannt werden:

#### Zeitliche Merkmale
```
"Morgen Kaffee kaufen": {
    text: "Kaffee kaufen",
    merkmale: {
        date: 26.09.2018,
    }
}
"Kaffee kaufen übermorgen": {
    text: "Kaffee kaufen",
    merkmale: {
        date: 27.09.2018,
    }
}
"Oma Geburtstag 15.02.1940": {
    text: "Oma Geburtstag",
    merkmale: {
        date: 15.02.1940,
    }
}
"Fussballspiel gestern gewonnen": {
    text: "Fussballspiel gewonnen",
    merkmale: {
        date: 24.09.2018,
    }
}
```
#### Einfache Tags
```
"Wir machen einen Ausflug #juhu": {
    text: "Wir machen einen Ausflug",
    merkmale: {
        tags: [juhu],
    }
}
"#tagssindtoll Wir machen einen #achtung Ausflug #juhu": {
    text: "Wir machen einen Ausflug",
    merkmale: {
        tags: [tagssindtoll, achtung, juhu],
    }
}
```

#### Prioritäten
```
"Käse einkaufen !p1": {
    text: "Käse einkaufen",
    merkmale: {
        priorität: 1,
    }
}
"!p2 Wurst einkaufen": {
    text: "Wurst einkaufen",
    merkmale: {
        priorität: 2,
    }
}
"Brot !p3 einkaufen": {
    text: "Brot einkaufen",
    merkmale: {
        priorität: 3,
    }
}
```

Alle Merkmale sollen zudem auch in Kombination funktionieren. Beispiel

```
"Morgen Käse #ichmagkäse einkaufen !p1": {
    text: "Käse einkaufen",
    merkmale: {
        priorität: 1,
        date: 26.09.2018,
        tags: [ichmagkäse],
    }
}
```

Have fun!
