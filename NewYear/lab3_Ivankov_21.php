<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №3 — Варіант 21</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #222;
            margin: 30px;
        }
        h1, h2 {
            color: #3a2ca0;
        }
        .block {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            padding: 20px;
            margin-bottom: 20px;
        }
        .info {
            font-size: 0.9em;
            color: #444;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Лабораторна робота №3 (PHP — Масиви)</h1>
    <h2>Варіант 21</h2>

    <div class="block">
        <h3>Умова задачі</h3>
        <p>У масиві <strong>E</strong> знайти максимальний елемент та його координату. 
        Знайти значення частки від ділення суми від’ємних елементів масиву E 
        на значення координати максимального елемента. 
        Обчислити новий масив, елементи якого дорівнюють відхиленням елементів масиву E від значення частки. 
        Знайти кількість додатних відхилень у новому масиві, значення яких більші від 0.5, 
        а також обчислити сумарне значення цих відхилень.</p>
    </div>

    

    <div class="block">
        <h3>Розв’язок (PHP)</h3>
        <?php
        $E = array(-3, 0, -2, 0, -6, 1, 0, -5, 0, 7);

        echo "<p><strong>Масив E:</strong> [" . implode(", ", $E) . "]</p>";

        $max_value = max($E);
        $max_index = array_search($max_value, $E); 
        $coord = $max_index + 1; 

        echo "<p>Максимальний елемент: <strong>$max_value</strong> (координата: $coord)</p>";

        $negative_sum = 0;
        foreach ($E as $val) {
            if ($val < 0) $negative_sum += $val;
        }

        echo "<p>Сума від’ємних елементів: <strong>$negative_sum</strong></p>";

        $q = $negative_sum / $coord;
        echo "<p>Частка (q): <strong>$q</strong></p>";

        $D = array();
        foreach ($E as $val) {
            $D[] = $val - $q;
        }

        echo "<p>Новий масив D = E - q:</p>";
        echo "<p>[" . implode(", ", array_map(fn($x) => round($x, 2), $D)) . "]</p>";

        $positive_count = 0;
        $positive_sum = 0;
        foreach ($D as $val) {
            if ($val > 0.5) {
                $positive_count++;
                $positive_sum += $val;
            }
        }

        echo "<p>Кількість додатних відхилень > 0.5: <strong>$positive_count</strong></p>";
        echo "<p>Сума таких відхилень: <strong>" . round($positive_sum, 2) . "</strong></p>";
        ?>
    </div>

    <div class="block info">
        <p><strong>Розробник:</strong> студент групи СП-41, Іванков Артем Русланович</p>
        <p><strong>Дата створення документу:</strong> 25.10.2025</p>
        <p><strong>Поточна дата:</strong> <?php echo date("d.m.Y"); ?></p>
    </div>
</body>
</html>
