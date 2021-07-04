<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
use models\Grade;

class StatisticController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);

        if ($this->guest) {
            $this->redirect('/');
        }
    }

    public function index()
    {
        $chartValues = $this->getGradesValues();
        $this->render('statistic.index', [
            'values' => $chartValues['values'],
            'promoted' => $chartValues['promoted'],
            'courses' => Course::all()
        ]);
    }

    public function getGradesValues($courseIds = [])
    {
        $values = [];
        $promoted = [
            'promoted' => 0,
            'unPromoted' => 0
        ];

        $grades = Grade::getAllOrdered($courseIds);

        foreach ($grades as $grade) {
            if (empty($values[$grade->value])) {
                $values[$grade->value] = 0;
            }

            $values[$grade->value]++;

            if ($grade->value >= 5) {
                $promoted['promoted']++;
            } else {
                $promoted['unPromoted']++;
            }
        }

        return [
            'values' => $values,
            'promoted' => $promoted
        ];
    }

    public function getStatistics($request)
    {
        echo json_encode($this->getGradesValues($request['courseIds'] ?? null));
    }
}
