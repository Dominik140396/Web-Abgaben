<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>PHP Ice</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="center">
    <img class="Eiswaffel" src="ice-cone.png" alt="Eiswaffel">
    <h1>
        Eis cream Laden um die Ecke
    </h1>
    <img class="Eiswaffel" src="ice-cone.png" alt="Eiswaffel">
</div>

<h2>Sagen sie uns wer Sie sind</h2>
<form action="Formularauswertung.php" method="post">

    <section class="flex">
        <label for="username">Ihr Name</label>
        <input type="text" id="username" name="username" required>
    </section>

    <section class="flex">
        <label for="userAdresse">Ihre Adresse</label>
        <input type="text" id="userAdresse" name="userAdresse" required>
    </section>

    <section class="flex">
        <label>Geschlecht</label>
        <div>
            <div class="radio">
                <label>
                    <input type="radio" name="Geschlecht" value="Mann">
                </label>
                Mann
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="Geschlecht" value="Frau">
                </label>
                Frau
            </div>
        </div>
    </section>

        <section>
        <div class="flex">
            <label for="Eis-Sorten">Unsere Sorten :</label>
            <select name="Eis-Sorten" id="Eis-Sorten">
                <option value="Schoko">Schoko</option>
                <option value="Vanille">Vanille</option>
                <option value="Zimt">Zimt</option>
                <option value="Fingernägel">Fingernägel</option>
                <option value="Zehennägel">Zehennägel</option>
                <option value="Haare">Haare</option>
            </select>
        </div>
    </section>

    <section class="flex">
        <div>
            <div class="checkboxen">
                <label>
                    <input type="checkbox" name="special01">
                </label>
                Zuckerstreusel
            </div>
            <div class="checkboxen">
                <label>
                    <input type="checkbox" name="special02">
                </label>
                Schoko-Waffel
            </div>
            <div class="checkboxen">
                <label>
                    <input type="checkbox" name="special03">
                </label>
                Hautschuppen
            </div>
            <div class="checkboxen">
                <label>
                    <input type="checkbox" name="special04">
                </label>
                Winterkirschen
            </div>
            <div class="checkboxen">
                <label>
                    <input type="checkbox" name="special05">
                </label>
                Sommerkirschen
            </div>
        </div>
    </section>

    <section class="flex">
        <button type="submit" class="btn btn-send">Absenden</button>
        <button type="reset" class="btn btn-cancle">Reset</button>
    </section>

</form>
    <img class="Eisbecher" src="ice-cream.png" alt="Eis">
</body>
</html>