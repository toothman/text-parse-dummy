An empty sceleton for a text parser
========================

If you want to solve the problem in PHP, this repo contains an already prepared sceleton for a
php app. If you want to use a different language, feel free to do so. 

Commands to make php run
===

- composer install :) 
- php console.php parse-input "foo bar"
- "phpunit" for unit testing

Work Description
===

A text input can contain certain patterns that we want to detect and filter out. 
Think of a todo list app, that automatically detects certain things out of your given 
text input. Your task is to model a system that is capable of doing so and that would also
be easily maintainable and extensible. 
Three default detectors should be implemented on the way:
The expected input => output is shown as a JSON here, but can be printed in any flavor you want.

#### Temporal Tags
```
"Buy some coffee tomorrow": {
    text: "Buy some coffee",
    features: {
        date: 25.11.2022, // the date of tomorrow
    }
}
"Remind me to buy shoes in two days": {
    text: "Remind be to buy shoes",
    features: {
        date: 27.11.2022, // in two days from now,
    }
}
"Grammys birthday 15.02.1940": {
    text: "Grammys birthday",
    features: {
        date: 15.02.1940,
    }
}
"Soccer game won yesterday": {
    text: "Soccer game won yesterday",
    features: {
        date: 24.119.2022, // yesterday from now
    }
}

```
#### Simple Tags
```
"Let's do a vacation #yay": {
    text: "Let's do a vacation",
    features: {
        tags: [yay],
    }
}
"#iliketags lets do a #attention vacation #yay": {
    text: "lets do a vacation",
    features: {
        tags: [iliketags, attention, yay],
    }
}

```

#### Priority tag
```
"Buy cheese !p1": {
    text: "buy cheese",
    features: {
        priority: 1,
    }
}
"!p2 Buy sausages": {
    text: "Buy sausages",
    features: {
        priority: 2,
    }
}
```

All features should be combinable!

```
"Buy some #ilikecheese cheese tomorrow !p1": {
    text: "buy some cheese",
    features: {
        priority: 1,
        date: 26.09.2018,
        tags: [ilikecheese],
    }
}
```

Have fun!
