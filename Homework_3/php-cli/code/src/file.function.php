<?php

// function readAllFunction(string $address) : string {
function readAllFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");

        $contents = '';

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }

        fclose($file);
        return $contents;
    } else {
        return handleError("Файл не существует");
    }
}

// function addFunction(string $address) : string {
function addFunction(array $config): string
{
    $address = $config['storage']['address'];

    $name = readline("Введите имя: ");
    $date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");
    if (!validateDate($date)) {
        return handleError("Неверный формат даты");
    }

    $data = $name . ", " . $date . PHP_EOL;

    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        return "Запись $data добавлена в файл $address";
    } else {
        return handleError("Произошла ошибка записи. Данные не сохранены");
    }
}

// function serchFunction(string $address) : string {
function serchFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "r");

        $contents = '';

        $variant = trim(readline("Выберите параметр поиска: по имени('N'), по дате('D')" . PHP_EOL));
        if (mb_strtoupper($variant) == "N") {
            $name = trim(readline("Введите имя: "));
        } else if (mb_strtoupper($variant) == "D") {
            $date = trim(readline("Введите дату в формате ДД-ММ-ГГГГ: "));
            if (!validateDate($date)) {
                return handleError("Неверный формат даты");
            }
        } else {
            return handleError("Выбран неверный формат данных для поиска");
        }

        while (!feof($file)) {
            $fstr = fgets($file);
            if (strlen($fstr) !== 0) {
                if ((!empty($name) && str_contains(mb_strtolower($fstr), $name)) || (!empty($date) && trim(str_contains($fstr, $date)))) {
                    $contents .= $fstr;
                }
            }
        }

        fclose($file);
        if ($contents !== '') {
            return $contents;
        } else {
            return handleWarning("По вашему запросу ничего не найдено");
        }
    } else {
        return handleError("Файл не существует");
    }
}

// function birthdayFunction(array $address): string
function birthdayFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "r");

        $contents = '';

        while (!feof($file)) {
            $fstr = fgets($file);
            if (strlen($fstr) !== 0) {
                $dateBlock = explode(",", $fstr);
                $birthday =  explode('-', $dateBlock[1]);
            }
            if (($birthday[0] == date('d') || $birthday[0] <= (date('d') + 3) && $birthday[0] >= date('d'))  && $birthday[1] == date('m'))
                $contents .= $fstr;
        }
        fclose($file);
        if ($contents !== '') {
            return "Поздравить с Днем рождения: " . PHP_EOL . $contents;
        } else {
            return "В ближайшее время ни у кого нет Дня рождения";
        }
    } else {
        return handleError("Файл не существует");
    }
}

// function serchFunction(string $address) : string {
function deleteFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "r");

        $variant = trim(readline("Выберите строку для удаления: по имени('N'), по дате('D')" . PHP_EOL));
        if (mb_strtoupper($variant) == "N") {
            $name = trim(readline("Введите имя: "));
        } else if (mb_strtoupper($variant) == "D") {
            $date = trim(readline("Введите дату в формате ДД-ММ-ГГГГ: "));
            if (!validateDate($date)) {
                return handleError("Неверный формат даты");
            }
        } else {
            return handleError("Выбран неверный формат данных для поиска");
        }

        $contents = '';
        $fstrDel = '';
        while (!feof($file)) {
            $fstr = fgets($file);
            if (strlen($fstr) !== 0) {
                if ((!empty($name) && str_contains($fstr, $name)) || (!empty($date) && trim(str_contains($fstr, $date)))) {
                    $fstrDel .= $fstr;
                    continue;
                }
                $contents .= $fstr;
            }
        }
        fclose($file);

        $file = fopen($address, "w");
        fwrite($file, $contents);
        fclose($file);

        if ($fstrDel !== '') {
            return handleSuccess("Строка успешно удалена!");
        } else {
            return handleWarning("Такой строки в файле не найдено");
        }
    } else {
        return handleError("Файл не существует");
    }
}


// function clearFunction(string $address) : string {
function clearFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "w");

        fwrite($file, '');

        fclose($file);
        return "Файл очищен";
    } else {
        return handleError("Файл не существует");
    }
}

function helpFunction()
{
    return handleHelp();
}

function readConfig(string $configAddress): array|false
{
    return parse_ini_file($configAddress, true);
}

function readProfilesDirectory(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!is_dir($profilesDirectoryAddress)) {
        mkdir($profilesDirectoryAddress);
    }

    $files = scandir($profilesDirectoryAddress);

    $result = "";

    if (count($files) > 2) {
        foreach ($files as $file) {
            if (in_array($file, ['.', '..']))
                continue;

            $result .= $file . PHP_EOL;
        }
    } else {
        $result .= "Директория пуста \r\n";
    }

    return $result;
}

function readProfile(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!isset($_SERVER['argv'][2])) {
        return handleError("Не указан файл профиля");
    }

    $profileFileName = $profilesDirectoryAddress . $_SERVER['argv'][2] . ".json";

    if (!file_exists($profileFileName)) {
        return handleError("Файл $profileFileName не существует");
    }

    $contentJson = file_get_contents($profileFileName);
    $contentArray = json_decode($contentJson, true);

    $info = "Имя: " . $contentArray['name'] . "\r\n";
    $info .= "Фамилия: " . $contentArray['lastname'] . "\r\n";

    return $info;
}
