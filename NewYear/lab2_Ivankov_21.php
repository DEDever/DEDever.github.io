<?php

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Лабораторна — Варіант 21. Табулювання y</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.4; padding: 20px; background: #f7f7f7; }
        h1, h2 { margin: 0 0 10px 0; }
        .meta { margin: 10px 0 20px 0; padding: 10px; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
        .section { margin: 18px 0; padding: 12px; background: #fff; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
        .blocks { display:flex; flex-wrap:wrap; gap:10px; padding:10px 0; align-items:flex-start; }
        .block { display:flex; align-items:center; justify-content:center; color:#111; font-weight:600; border-radius:6px; box-sizing: border-box; }
        .legend { font-size:0.95rem; color:#333; margin-bottom:8px; }
        .formula-img { border:1px solid #ddd; display:inline-block; padding:6px; background:#fff; border-radius:6px; }
        .loop-title { margin: 6px 0; font-weight:700; color:#222; }
        .note { font-size:0.9rem; color:#444; margin-top:8px; }
    </style>
</head>
<body>
    <h1>Лабораторна робота — Варіант 21</h1>
    <div class="meta">
        <p><strong>Тема:</strong> Цикли (while, do-while, for) — табулювання функції</p>
        <p><strong>Розробник:</strong> Група СП-41, Іванков Артем Русланович</p>
        <p><strong>Дата створення документа:</strong> 08.10.2025</p>
        <p><strong>Поточна дата:</strong> <?= date("d.m.Y") ?></p>
    </div>

    <div class="section">
        <h2>Формула (виведена у вигляді рисунка)</h2>
        <?php
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="820" height="60">
            <rect width="100%" height="100%" fill="#ffffff"/>
            <text x="10" y="32" font-family="DejaVu Sans, Arial, sans-serif" font-size="20" fill="#111">
                y = mod(a, b) / c^3 / x - (lg b)^3 + max(a, b)
            </text>
        </svg>';
        $dataUri = 'data:image/svg+xml;base64,' . base64_encode($svg);
        ?>
        <div class="formula-img"><img src="<?= $dataUri ?>" alt="formula"></div>
        <p class="note">Інтерпретація: <em>lg</em> = логарифм за основою 10; операція mod — це залишок від ділення (a % b).</p>
    </div>

    <?php
    $A = [1,3,5,7,9,11,13,15,17,19];
    $B = [2,6,10,14,18,22,26,30,34,38];
    $C = [46,41,36,31,26,21,16,11,6,1];
    $X = [4,7,10,13,16,19,22,25,28,31];

    $variant = 21;

    $base_height = $variant * 3; // px
    $base_width  = $variant * 5; // px
    $baseColor = $variant * 4; // 84
    if ($baseColor > 255) $baseColor = $variant; 

    function rgb_from_val($v) {
        $cl = max(0, min(255, (int)$v));
        return "rgb($cl,$cl,$cl)";
    }

    function compute_y($a, $b, $c, $x) {
        if ($b == 0) $b = 1e-9;
        if ($c == 0) $c = 1e-9;
        if ($x == 0) $x = 1e-9;
        $mod = $a % $b;
        $term1 = $mod / pow($c, 3) / $x;
        $term2 = pow(log10($b), 3);
        $mx = max($a, $b);
        return $term1 - $term2 + $mx;
    }
    ?>

    <?php
    $loops = [
        ['id'=>'while', 'title'=>'Цикл while (звичайний)'],
        ['id'=>'while_alt', 'title'=>'Цикл while (альтернативний синтаксис)'],
        ['id'=>'do_while', 'title'=>'Цикл do-while'],
        ['id'=>'for', 'title'=>'Цикл for (звичайний)'],
        ['id'=>'for_alt', 'title'=>'Цикл for (альтернативний синтаксис)'],
    ];

    foreach ($loops as $loop) {
        echo '<div class="section">';
        echo '<div class="loop-title">' . htmlspecialchars($loop['title']) . '</div>';
        echo '<div class="legend">Кожен блок відповідає одній ітерації (позиції масивів A,B,C,X). Розміри та кольори змінюються згідно умови.</div>';
        echo '<div class="blocks">';


        $n = count($A);

        if ($loop['id'] === 'while') {
            $i = 0;
            while ($i < $n) {
                $a = $A[$i]; $b = $B[$i]; $c = $C[$i]; $x = $X[$i];
                $y = compute_y($a,$b,$c,$x);
                $iter = $i + 1;             
                $colorVal = min(255, $baseColor + ($iter - 1) * 7);
                $bg = rgb_from_val($colorVal);
                $border = rgb_from_val($colorVal); 
                $w = $base_width + ($iter - 1) * 10;
                $h = $base_height + ($iter - 1) * 5;
                echo "<div class='block' style='width:{$w}px;height:{$h}px;background:{$bg};border:2px solid {$border};'>#{$iter}<br>" . number_format($y,4,'.',',') . "</div>";
                $i++;
            }
        } elseif ($loop['id'] === 'while_alt') {
            $i = 0;
            while ($i < $n):
                $a = $A[$i]; $b = $B[$i]; $c = $C[$i]; $x = $X[$i];
                $y = compute_y($a,$b,$c,$x);
                $iter = $i + 1;
                $colorVal = min(255, $baseColor + ($iter - 1) * 7);
                $bg = rgb_from_val($colorVal);
                $border = rgb_from_val($colorVal);
                $w = $base_width + ($iter - 1) * 10;
                $h = $base_height + ($iter - 1) * 5;
                echo "<div class='block' style='width:{$w}px;height:{$h}px;background:{$bg};border:2px solid {$border};'>#{$iter}<br>" . number_format($y,4,'.',',') . "</div>";
                $i++;
            endwhile;
        } elseif ($loop['id'] === 'do_while') {
            $i = 0;
            do {
                $a = $A[$i]; $b = $B[$i]; $c = $C[$i]; $x = $X[$i];
                $y = compute_y($a,$b,$c,$x);
                $iter = $i + 1;
                $colorVal = min(255, $baseColor + ($iter - 1) * 7);
                $bg = rgb_from_val($colorVal);
                $border = rgb_from_val($colorVal);
                $w = $base_width + ($iter - 1) * 10;
                $h = $base_height + ($iter - 1) * 5;
                echo "<div class='block' style='width:{$w}px;height:{$h}px;background:{$bg};border:2px solid {$border};'>#{$iter}<br>" . number_format($y,4,'.',',') . "</div>";
                $i++;
            } while ($i < $n);
        } elseif ($loop['id'] === 'for') {
            for ($i = 0; $i < $n; $i++) {
                $a = $A[$i]; $b = $B[$i]; $c = $C[$i]; $x = $X[$i];
                $y = compute_y($a,$b,$c,$x);
                $iter = $i + 1;
                $colorVal = min(255, $baseColor + ($iter - 1) * 7);
                $bg = rgb_from_val($colorVal);
                $border = rgb_from_val($colorVal);
                $w = $base_width + ($iter - 1) * 10;
                $h = $base_height + ($iter - 1) * 5;
                echo "<div class='block' style='width:{$w}px;height:{$h}px;background:{$bg};border:2px solid {$border};'>#{$iter}<br>" . number_format($y,4,'.',',') . "</div>";
            }
        } elseif ($loop['id'] === 'for_alt') {
            for ($i = 0; $i < $n; $i++):
                $a = $A[$i]; $b = $B[$i]; $c = $C[$i]; $x = $X[$i];
                $y = compute_y($a,$b,$c,$x);
                $iter = $i + 1;
                $colorVal = min(255, $baseColor + ($iter - 1) * 7);
                $bg = rgb_from_val($colorVal);
                $border = rgb_from_val($colorVal);
                $w = $base_width + ($iter - 1) * 10;
                $h = $base_height + ($iter - 1) * 5;
                echo "<div class='block' style='width:{$w}px;height:{$h}px;background:{$bg};border:2px solid {$border};'>#{$iter}<br>" . number_format($y,4,'.',',') . "</div>";
            endfor;
        }

        echo '</div>'; 
        echo '</div>'; 
    }
    ?>

    

</body>
</html>
