<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>

    <?php

    # Створіть файл 'test.txt' , запишіть у нього рядок 'Hello Palmo''.

    $file = fopen(filename: "./storage/test.txt", mode: "w");
    fwrite($file, data: "Hello, Palmo");

    # Відобразіть вміст файлу на сторінці

    $file = fopen(filename: "./storage/test.txt", mode: "r");
    $contents = fread($file, filesize(filename: "./storage/test.txt"));
    echo $contents;
    fclose($file);

    # Відобразіть розмір файлу на сторінці (У байтах, мегабайтах, гігабайтах)

    $filename = "./storage/test.txt";
    echo "<br> Розмір файлу $filename: " . filesize($filename) . ' байт';
    echo "<br> Розмір файлу $filename: " . filesize($filename) * 0.000001 . ' мегабайт';
    echo "<br> Розмір файлу $filename: " . filesize($filename) * (1 * pow(10, -9)) . ' гігабайт';

    # Створіть файл 'test2.txt'

    $file = fopen(filename: "./storage/test2.txt", mode: "a");
    fwrite($file, "Hello, World");

    # Видаліть 'test.2.txt'

    unlink(filename: "./storage/test2.txt");

    # Створіть папку TestDir

    mkdir('TestDir');

    # Дано масив ['test1','test2','test3'], створіть у папці Test папки, назвами яких слугують рядки масиву 

    $array = ['test1', 'test2', 'test3'];

    for ($i = 0; $i < count($array); $i++) {
        mkdir("./TestDir/$array[$i]");
    }

    # Створіть у кожній вкладеній у TestDir папці, файл Hello.txt, у кожен із них запишіть рядок "Hello world", виведіть на екран вміст усіх файлів.

    for ($i = 1; $i <= 3; $i++) {

        $filename = "./TestDir/test$i/Hello.txt";

        $file = fopen($filename, mode: "w+");
        fwrite($file, data: "Hello, World");

        $contents = fread($file, filesize($filename));

        echo '<br>' . file_get_contents($filename);
        fclose($file);
    }


    # Напишіть функцію, яка приймає назву файлу або папки і перевіряє, чи є передане значення файлом або папкою (повернути рядок)

    function checkFileDir(string $file)
    {
        $string = '';

        if (is_file($file) == true) {
            $string = 'Передане значення є існуючим файлом';

            return "$file: " . $string;
        } else if (is_dir($file) == true) {
            $string = 'Передане значення є існуючою директорією';

            return "$file: " . $string;
        }
        $string = 'Передане значення не є існуючим файлом або директорією';

        return "$file: " . $string;
    }

    $data = "./TestDir/test1/Hello.txt";
    echo '<br>' . checkFileDir($data);


    # Timestamp: time та mktime. 
    # Для вирішення завдань цього блоку вам знадобляться такі функції: time, mktime.

    # Виведіть поточний час у форматі timestamp.

    echo '<br>' . time();

    # Виведіть 1 березня 2025 року у форматі timestamp

    echo '<br>' . mktime(0, 0, 0, 3, 1, 2025);

    # Виведіть 31 грудня поточного року у форматі timestamp. Скрипт повинен працювати незалежно від року, коли він запущен

    $year = date('Y');

    echo '<br>' . mktime(0, 0, 0, 12, 31, $year);

    # Знайдіть кількість секунд, що пройшли з 13:12:59 15 березня 2000 року до теперішнього часу

    $start_timestamp = mktime(13, 12, 59, 3, 15, 2000);

    $now_timestamp = time();

    $seconds_diff = $now_timestamp - $start_timestamp;

    echo "<br> Пройшло $seconds_diff секунд з 13:12:59 15 березня 2000 року до теперішнього часу.";

    # Знайдіть кількість годин, що пройшли з 7:23:48 поточного дня до цього часу.

    $current_year = date('Y');
    $current_month = date('m');
    $current_day = date('d');

    $start_timestamp = mktime(7, 23, 48, $current_month, $current_day, $current_year);

    $now_timestamp = time();

    $seconds_diff = $now_timestamp - $start_timestamp;
    $hours_diff = round(($seconds_diff / 3600), 2);

    echo "<br> Пройшло $hours_diff годин з 7:23:48 поточного дня до цього часу";


    # Функція date
    # Для вирішення завдань цього блоку вам знадобляться такі функції: date.

    # Виведіть на екран поточний рік, місяць, день, годину, хвилину, секунду.

    echo '<br>' . date('Y.m.d H:i:s');

    # Виведіть поточну дату-час у форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.

    echo '<br>' . date('Y-m-d');
    echo '<br>' . date('d.m.Y');
    echo '<br>' . date('d.m.y');
    echo '<br>' . date('H:i:s');

    # За допомогою функцій mktime та date виведіть 12 лютого 2025 року у форматі '12.02.2025'.

    echo '<br>' . date("d.m.Y", mktime(0, 0, 0, 2, 12, 2025));

    # Створіть масив днів тижня $week. Виведіть на екран назву поточного дня тижня за допомогою масиву $week та функції date. 
    # Дізнайтеся, який день тижня був 06.06.2006, у ваш день народження.

    $week = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    echo '<br> Today is: ' . $week[date("w")] . '<br>';

    $dates = ['2006-06-06', '2003-08-02'];

    foreach ($dates as $d) {
        print_r([
            'date' => $d,
            'dayOfWeek' => $week[date("w", strtotime($d))]
        ]);
    }

    # Створіть масив місяців $month. Виведіть на екран назву поточного місяця за допомогою масиву $month та функції date.

    $months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];

    echo '<br> Now is: ' . $months[date("n") - 1];


    # Знайдіть кількість днів у поточному місяці. Скрипт повинен працювати незалежно від місяця, коли він запущений.

    echo '<br> Кількість днів у поточному місяці: ' . date('t');

    ?>

    <!-- Зробіть поле введення, в яке користувач вводить рік (4 цифри), а скрипт визначає чи високосний рік. -->

    <form action="index.php" method="post">
        <input type="year" name="year">
        <div>
            <input type="submit" value="Check Leap">
        </div>
    </form>

    <?php

    if (isset($_POST['year'])) {
        $year = $_POST['year'];

        if (strlen($year) == 4) {
            if ($year % 4 == 0) {
                echo "Ви ввели високосний рік";
            }
            echo "Ви ввели не високосний рік";
        }
        echo "Будь ласка, введіть рік.";
    }
    ?>


    <!-- Зробіть форму, яка запитує дату у форматі '31.12.2025'. За допомогою mktime та explode переведіть цю дату у формат timestamp. Дізнайтесь день тижня (словом) за введену дату. -->

    <form action="index.php" method="post">
        <input type="text" name="date" placeholder="DD.MM.YYYY" required><br>
        <div>
            <input type="submit" value="to timestamp">
        </div>
    </form>

    <?php

    if (isset($_POST['date'])) {
        $date = $_POST['date'];

        if (preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $date)) {

            list($day, $month, $year) = explode('.', $date);

            if (checkdate($month, $day, $year)) {

                $timestamp = mktime(0, 0, 0, $month, $day, $year);

                $dayOfWeek = date("l", $timestamp);

                echo '<br> Timestamp: ' . $timestamp;
                echo '<br> Day of the week: ' . $dayOfWeek;
            }
            echo '<br>Введена дата некоректна.';
        }
        echo '<br> Будь ласка, введіть дату у форматі DD.MM.YYYY.';
    }

    ?>

    <!-- Зробіть форму, яка запитує дату у форматі '2025-12-31'. За допомогою mktime та explode переведіть цю дату у формат timestamp. Дізнайтесь місяць (словом) за введену дату. -->

    <form action="index.php" method="post">
        <input type="text" name="dateYear" placeholder="YYYY-MM-DD" required><br>
        <div>
            <input type="submit" value="to timestamp">
        </div>
    </form>

    <?php

    if (isset($_POST['dateYear'])) {
        $date = $_POST['dateYear'];

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {

            list($year, $month, $day) = explode('-', $date);

            if (checkdate($month, $day, $year)) {

                $timestamp = mktime(0, 0, 0, $month, $day, $year);

                $monthName = date("F", $timestamp);

                echo '<br>Timestamp: ' . $timestamp;
                echo '<br>Назва місяця: ' . $monthName;
            }
            echo '<br>Введена дата некоректна.';
        }
        echo '<br>Будь ласка, введіть дату у форматі YYYY-MM-DD.';
    }
    ?>

    <!-- Порівняння дат -->
    <!-- Зробіть форму, яка запитує дві дати у форматі '2025-12-31'. Першу дату запишіть у змінну $date1, а другу в $date2. Порівняйте, яка із введених дат більше. Виведіть її на екран. -->
    <div>
        <form action="index.php" method="post">
            <input type="text" name="date1" placeholder="YYYY-MM-DD" required><br>
            <input type="text" name="date2" placeholder="YYYY-MM-DD" required><br>
            <input type="submit" value="Порівняти дати">
        </form>
    </div>

    <?php
    if (isset($_POST['date1']) && isset($_POST['date2'])) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date1) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date2)) {

            $timestamp1 = strtotime($date1);
            $timestamp2 = strtotime($date2);

            if ($timestamp1 > $timestamp2) {
                echo '<br>Дата 1: ' . $date1 . ' більша за дату 2: ' . $date2;
            } elseif ($timestamp1 < $timestamp2) {
                echo '<br>Дата 2: ' . $date2 . ' більша за дату 1: ' . $date1;
            }
            echo '<br>Обидві дати однакові: ' . $date1;
        }
        echo '<br>Будь ласка, введіть дати у форматі YYYY-MM-DD.';
    }

    ?>


    <?php

    # На strtotime
    # Для вирішення завдань цього блоку вам знадобляться такі функції: strtotime.

    # Дана дата у форматі '2025-12-31'. За допомогою функції strtotime та date перетворіть її на формат '31-12-2025'.

    $date = date('Y-m-d');

    $timestamp = strtotime($date);

    $formatDate = date('d-m-Y', $timestamp);

    echo '<br>' . $formatDate;
    ?>

    <!-- Зробіть форму, яка запитує дату-час у форматі '2025-12-31T12:13:59'. За допомогою функції strtotime та функції date перетворіть її на формат '12:13:59 31.12.2025'. -->

    <form action="index.php" method="post">
        <input type="text" name="datetime" placeholder="YYYY-MM-DDTHH:MM:SS" required>
        <div>
            <input type="submit" value="Перетворити">
        </div>
    </form>

    <?php

    if (isset($_POST['datetime'])) {
        $datetimeString = $_POST['datetime'];

        $timestamp = strtotime($datetimeString);

        $formattedDateTime = date('H:i:s d.m.Y', $timestamp);

        echo '<br>' . $formattedDateTime;
    }

    ?>

    <?php

    # Додаток та забирання дат
    # Для вирішення завдань цього блоку вам знадобляться такі функції: date_create, date_modify, date_format.

    # У змінній $date лежить дата у форматі '2025-12-31'. Додайте до цієї дати 2 дні, 1 місяць та 3 дні, 1 рік. Заберіть від цієї дати 3 дні.

    $date = date('Y-m-d');
    $date = date_create($date);
    date_modify($date, "2 days");
    date_modify($date, "1 month 3 days");
    date_modify($date, "1 year");
    date_modify($date, "-3 day");
    echo '<br>' . date_format($date, "Y-m-d");

    # Завдання
    # Дізнайтеся, скільки днів залишилося до Нового Року. Скрипт має працювати у будь-якому році.

    function days($date)
    {
        $now = strtotime(date('Y-m-d'));
        $date = strtotime($date);
        $countdown = ($date - $now) / (60 * 60 * 24);

        return $countdown;
    }

    $year = date("Y") + 1;

    echo '<br>' . days("$year-01-01");

    ?>

    <!-- Зробіть форму з одним полем введення, яке користувач вводить рік. Знайдіть усі п'ятниці 13-те цього року. Результат виведіть у вигляді масиву дат. -->

    <form action="index.php" method="post">
        <input type="number" name="year" placeholder="Введіть рік" required>
        <div>
            <input type="submit" value="Знайти п'ятниці 13-те">
        </div>
    </form>

    <?php

    if (isset($_POST['year'])) {
        $year = intval($_POST['year']);
        $fridays13 = [];

        for ($month = 1; $month <= 12; $month++) {

            $date = mktime(0, 0, 0, $month, 13, $year);

            if (date("w", $date) == 5) {

                $fridays13[] = date("Y-m-d", $date);
            }
        }

        if (!empty($fridays13)) {
            echo '<br> П\'ятниці 13-те в році ' . $year . ':';
            echo '<pre>' . print_r($fridays13, true) . '</pre>';
        }
        echo '<br> У році ' . $year . ' немає п\'ятниць 13-те.';
    }
    ?>

    <?php

    # Дізнайтеся, який день тижня був 100 днів тому.

    $date = new DateTime();

    $date->modify('-100 days');

    echo '<br>' . $date->format('l');

    ?>
</body>

</html>