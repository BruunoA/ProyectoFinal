<?php

use App\Models\EventsModel;

function getCalendarData(): array
{
    $currentDate = new DateTime();
    $data['currentYear'] = $currentDate->format('Y');
    $data['currentMonth'] = $currentDate->format('n');
    $data['today'] = $currentDate->format('j');

    $data['year'] = isset($_GET['year']) ? (int)$_GET['year'] : $data['currentYear'];
    $data['month'] = isset($_GET['month']) ? (int)$_GET['month'] : $data['currentMonth'];

    if ($data['month'] < 1) {
        $data['month'] = 12;
        $data['year']--;
    } elseif ($data['month'] > 12) {
        $data['month'] = 1;
        $data['year']++;
    }

    $eventsModel = new EventsModel();
    $events = $eventsModel->where('YEAR(data)', $data['year'])
        ->where('MONTH(data)', $data['month'])
        ->where('estat', 'publicat')
        ->findAll();

    $data['eventDays'] = [];
    foreach ($events as $event) {
        $eventDay = date('j', strtotime($event['data']));
        $data['eventDays'][$eventDay][] = $event['nom'];
    }

    $data['mesesCatala'] = [
        1 => 'Gener',
        2 => 'Febrer',
        3 => 'Març',
        4 => 'Abril',
        5 => 'Maig',
        6 => 'Juny',
        7 => 'Juliol',
        8 => 'Agost',
        9 => 'Setembre',
        10 => 'Octubre',
        11 => 'Novembre',
        12 => 'Desembre'
    ];

    return $data;
}
