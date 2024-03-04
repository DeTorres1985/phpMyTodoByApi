<?php
// 1
// Установите свой API ключ Todoist
$apiToken = '73c9a99c49718d9fcd29c6f61253b1c4b77af3e7';

// URL для получения списка проектов
$url = 'https://api.todoist.com/rest/v1/projects';

// Настройка запроса
$options = array(
    'http' => array(
        'header'  => "Authorization: Bearer " . $apiToken,
        'method'  => 'GET',
    ),
);

// Создание контекста запроса
$context  = stream_context_create($options);

// Выполнение запроса и получение ответа
$response = file_get_contents($url, false, $context);

// Преобразование ответа в массив
$projects = json_decode($response, true);

// Вывод списка проектов
if (!empty($projects)) {
    echo "Список проектов в Todoist:\n";
    foreach ($projects as $project) {
        echo "- {$project['name']}\n";
    }
} else {
    echo "Список проектов пуст\n";
}
