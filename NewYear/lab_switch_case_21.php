<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота № — Оператор switch-case</title>
</head>
<body>
    <h2>Лабораторна робота: Оператор вибору switch-case</h2>
    <h3>Варіант 21 — За першою буквою з назви міста вивести країну</h3>

    <form method="post">
        Введіть назву міста: <input type="text" name="city" required>
        <input type="submit" value="Визначити країну">
    </form>

    <?php
    // Виведення інформації про розробника
    echo "<hr>";
    echo "<p><b>Розробник:</b> Студент групи КН-123, Іваненко Іван Іванович</p>";
    echo "<p><b>Дата створення документа:</b> 08.10.2025</p>";
    echo "<p><b>Поточна дата:</b> " . date("d.m.Y") . "</p>";
    echo "<hr>";

    if (isset($_POST['city'])) {
        $city = trim($_POST['city']);
        $firstLetter = mb_strtoupper(mb_substr($city, 0, 1)); // перша літера (у верхньому регістрі)
        echo "<h4>Ви ввели місто: $city</h4>";

        echo "<h3>Класичний синтаксис switch-case</h3>";

        // === КЛАСИЧНИЙ СИНТАКСИС SWITCH ===
        switch ($firstLetter) {
            case 'К':
                echo "Можливі міста: Київ, Касабланка → <b>Україна або Марокко</b>";
                break;
            case 'Х':
                echo "Можливе місто: Харків → <b>Україна</b>";
                break;
            case 'П':
                echo "Можливе місто: Париж → <b>Франція</b>";
                break;
            case 'Л':
                echo "Можливі міста: Ліон, Лондон → <b>Франція або Велика Британія</b>";
                break;
            case 'Г':
                echo "Можливе місто: Генуя → <b>Італія</b>";
                break;
            case 'Р':
                echo "Можливе місто: Рівне → <b>Україна</b>";
                break;
            case 'В':
                echo "Можливе місто: Венеція → <b>Італія</b>";
                break;
            case 'О':
                echo "Можливе місто: Одеса → <b>Україна</b>";
                break;
            case 'Н':
                echo "Можливе місто: Нью-Йорк → <b>США</b>";
                break;
            default:
                echo "Невідома перша літера або місто не в базі.";
        }

        echo "<hr><h3>Альтернативний синтаксис switch-case</h3>";

        // === АЛЬТЕРНАТИВНИЙ СИНТАКСИС SWITCH ===
        switch ($firstLetter):
            case 'К':
                echo "Можливі міста: Київ, Касабланка → <b>Україна або Марокко</b>";
                break;
            case 'Х':
                echo "Можливе місто: Харків → <b>Україна</b>";
                break;
            case 'П':
                echo "Можливе місто: Париж → <b>Франція</b>";
                break;
            case 'Л':
                echo "Можливі міста: Ліон, Лондон → <b>Франція або Велика Британія</b>";
                break;
            case 'Г':
                echo "Можливе місто: Генуя → <b>Італія</b>";
                break;
            case 'Р':
                echo "Можливе місто: Рівне → <b>Україна</b>";
                break;
            case 'В':
                echo "Можливе місто: Венеція → <b>Італія</b>";
                break;
            case 'О':
                echo "Можливе місто: Одеса → <b>Україна</b>";
                break;
            case 'Н':
                echo "Можливе місто: Нью-Йорк → <b>США</b>";
                break;
            default:
                echo "Невідома перша літера або місто не в базі.";
        endswitch;
    }
    ?>
</body>
</html>
