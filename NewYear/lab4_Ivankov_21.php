<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №4 — Варіант 21 (матриця B)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #222;
            margin: 40px;
        }
        h1, h2 { color: #2c3e9f; }
        .block {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            padding: 20px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            margin: 10px 0;
        }
        td {
            border: 1px solid #888;
            padding: 6px 10px;
            text-align: right;
            min-width: 50px;
        }
        .formula {
            text-align: center;
        }
        .formula img {
            background: #fff;
            border-radius: 10px;
            padding: 10px;
            width: 480px;
        }
        .info {
            border-top: 1px solid #ccc;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Лабораторна робота №4 (PHP — Матриці)</h1>
    <h2>Варіант 21</h2>

    <div class="block">
        <h3>Умова задачі</h3>
        <p>У матриці <b>B</b> обчислити суму квадратів додатних елементів. 
        Знайти кількість додатних і кількість від’ємних елементів у цій матриці. 
        Якщо сума квадратів додатних елементів більша від 20 і менша від 40, 
        то кожний елемент матриці B поділити на кількість від’ємних елементів, 
        в іншому випадку — на кількість додатних елементів. 
        У новій матриці обчислити добуток елементів першого та другого рядків, 
        а також кількість елементів, які більші від 10 і менші від 25.</p>
    </div>


    <div class="block">
        <h3>Розв’язок</h3>
        <?php
        $B = [
            [-1.2, 13.8, -5.2],
            [6.1, -3.2, 12.1],
            [2.2, -4.2, 7.1]
        ];

        echo "<p><strong>Початкова матриця B:</strong></p><table>";
        foreach ($B as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        $sum_sq = 0;
        $count_pos = 0;
        $count_neg = 0;
        foreach ($B as $row) {
            foreach ($row as $val) {
                if ($val > 0) {
                    $sum_sq += $val * $val;
                    $count_pos++;
                } elseif ($val < 0) {
                    $count_neg++;
                }
            }
        }

        echo "<p>Сума квадратів додатних елементів: <strong>" . round($sum_sq, 2) . "</strong></p>";
        echo "<p>Кількість додатних елементів: <strong>$count_pos</strong></p>";
        echo "<p>Кількість від’ємних елементів: <strong>$count_neg</strong></p>";

        $divisor = ($sum_sq > 20 && $sum_sq < 40) ? $count_neg : $count_pos;
        echo "<p>Ділимо всі елементи на: <strong>$divisor</strong></p>";

        $B_new = [];
        foreach ($B as $row) {
            $new_row = [];
            foreach ($row as $val) {
                $new_row[] = round($val / $divisor, 2);
            }
            $B_new[] = $new_row;
        }

        echo "<p><strong>Нова матриця B':</strong></p><table>";
        foreach ($B_new as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        $product_row1 = array_product($B_new[0]);
        $product_row2 = array_product($B_new[1]);

        echo "<p>Добуток елементів 1-го рядка: <strong>" . round($product_row1, 4) . "</strong></p>";
        echo "<p>Добуток елементів 2-го рядка: <strong>" . round($product_row2, 4) . "</strong></p>";

        $count_10_25 = 0;
        foreach ($B_new as $row) {
            foreach ($row as $val) {
                if ($val > 10 && $val < 25) $count_10_25++;
            }
        }
        echo "<p>Кількість елементів у новій матриці, більших від 10 і менших від 25: <strong>$count_10_25</strong></p>";
        ?>
    </div>

    <div class="block info">
        <p><strong>Розробник:</strong> студент групи СП-41, Іванков Артем Русланович</p>
        <p><strong>Дата створення документу:</strong> 25.10.2025</p>
        <p><strong>Поточна дата:</strong> <?php echo date("d.m.Y"); ?></p>
    </div>
</body>
</html>
