<?php

function handleError(string $errorText): string
{
    return "\033[31m" . $errorText . " \r\n \033[97m";
}

function handleWarning(string $warningText): string
{
    return "\033[33m" . $warningText . " \r\n \033[97m";
}

function handleSuccess(string $successText): string
{
    return "\033[32m" . $successText . " \r\n \033[96m";
}

function handleHelp(): string
{
    $help = "Программа работы с файловым хранилищем \r\n";

    $help .= "Порядок вызова\r\n\r\n";

    $help .= "php /code/app.php [COMMAND] \r\n\r\n";

    $help .= "Доступные команды: \r\n";
    $help .= "read-all - чтение всего файла \r\n";
    $help .= "add - добавление записи \r\n";
    $help .= "serch - поиск записи по заданным параметрам \r\n";
    $help .= "birthday - ближайшие Дни рождения \r\n";
    $help .= "delete - удалить запись \r\n";
    $help .= "clear - очистка файла \r\n";
    $help .= "read-profiles - вывести список профилей пользователей \r\n";
    $help .= "read-profile - вывести профиль выбранного пользователя \r\n";
    $help .= "help - помощь \r\n";

    return $help;
}
