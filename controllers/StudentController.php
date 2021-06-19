<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Grade;
use models\User;

class StudentController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
    }

    public function indexCourse()
    {
        if (!$this->user->isStudent()) {
            $this->redirect('/');
        }
        $courses = User::getCoursesOfStudent($this->user->id);

        $this->render('student.course.index', [
            'courses' => $courses
        ]);
    }

    public function indexGrades($request)
    {
        if (!$this->user->isStudent()) {
            $this->redirect('/');
        }

        $grades = Grade::gradesOfCourseAndStudent($this->user->id,$request['courseId']);

        $this->render('student.grade.index', [
            'grades' => $grades
        ]);
    }
}
