<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
use models\Grade;
use models\User;

class GradeController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);

        if ($this->guest) {
            $this->redirect('/');
        }
    }

    public function index($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $grades = Grade::gradesOfCourseAndStudent($request['studentId'],$request['courseId']);

        $this->render('grades.index', [
            'grades' => $grades,
            'student' => User::find($request['studentId']),
            'course' => Course::find($request['courseId'])
        ]);
    }

    public function create($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $this->render('grades.create',[
            'student' => User::find($request['studentId']),
            'course' => Course::find($request['courseId'])
        ]);
    }

    public function store($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $grade = new Grade([
            'course_id' => $request['courseId'],
            'student_id' => $request['studentId'],
            'feedback' => $request['feedback'],
            'value' => $request['value'],
            'teacher_id' => $this->user->id,
            'name' => $request['name']
        ]);

        $grade->save();

        $this->redirect('/note/'.$request['courseId'].'/'.$request['studentId']);
    }

    public function edit($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $grade = Grade::find($request['gradeId']);

        $this->render('grades.update',[
            'student' => User::find($grade->student_id),
            'course' => Course::find($grade->course_id),
            'grade' => $grade
        ]);
    }

    public function update($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $grade = Grade::find($request['gradeId']);

        $grade->name = $request['name'];
        $grade->value = $request['value'];
        $grade->feedback = $request['feedback'];

        $grade->save();

        $this->redirect('/note/'.$grade->course_id.'/'.$grade->student_id);
    }

    public function delete($request)
    {
        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }

        $grade = Grade::find($request['gradeId']);
        $courseId = $grade->course_id;
        $studentId = $grade->student_id;
        $grade->delete();

        $this->redirect('/note/'.$courseId.'/'.$studentId);
    }
}
