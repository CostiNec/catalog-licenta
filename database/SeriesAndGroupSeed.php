<?php

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\','/',$class_name);
    if(file_exists(__DIR__.'/../'.$class_name.'.php')) {
        require __DIR__.'/../'.$class_name.'.php';
    }
});

use core\Helper;
use models\Serie;
use models\Group;

$series = ['AA', 'AB', 'AC', 'CA', 'CB', 'CC', 'CD', 'A', 'B',
    'C1', 'C2', 'C3', 'C4', 'AAC', 'ABD', 'E-GOV', 'GMRV', 'AI', 'ISI', 'MTI',
    'SRIC', 'SCPD', 'SSA', 'CASTR', 'SIC', 'TADSS', 'AOSI', 'AII', 'MPI', 'PCSAMP',
    'SEM', 'SIM', 'SII'];

foreach ($series as $serie) {
    $serie = new Serie([
        'name' => $serie
    ]);

    $serie->save();
}

$groups = ['311','312','313','314','315','321', '322','323','324','325',
           '331','332','333','334','335','341','342','343','345'];

foreach ($groups as $group) {
    $group = new Group([
        'name' => $group
    ]);

    $group->save();
}
