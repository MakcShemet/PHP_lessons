<?php
function validateDate(string $date): bool
{
    $dateBlocks = explode("-", $date);

    if (count($dateBlocks) < 3) {
        return false;
    }

    if (isset($dateBlocks[0]) && $dateBlocks[0] > 31) {
        return false;
    }
    // В оригинальной функции в условии была ошибка (... && $dateBlocks[0] > 12)
    if (isset($dateBlocks[1]) && $dateBlocks[1] > 12) {
        return false;
    }

    if (isset($dateBlocks[2]) && $dateBlocks[2] > date('Y')) {
        return false;
    }
    // Проверяем корректность введенной пользователем даты по отношению к текущей
    if ($date > date('dd/MM/yyyy')) {
        return false;
    }

    return true;
}
