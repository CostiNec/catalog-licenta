<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
use models\Serie;
use models\User;

class TeacherController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);

        if ($this->guest) {
            $this->redirect('/');
        }

        if (!$this->user->isTeacher()) {
            $this->redirect('/');
        }
    }

    public function indexCourses()
    {
        $courses = Course::getCoursesByTeacherId($this->user->id);

        $this->render('teacher.course.index', [
            'courses' => $courses
        ]);
    }

    public function accessCourses($request)
    {
        $users = User::where('role',User::STUDENT);

        $usersFormatted = [];

        foreach ($users as $userTmp) {
            $usersFormatted[$userTmp->id] = $userTmp->fullName();
        }

        $course = Course::find($request['courseId']);

        $students = Course::getStudentsUserIds($request['courseId']);

        $series = Course::getSeriesOfCourse($request['courseId']);

        $seriesFormatted = [];

        foreach ($series as $serie) {
            $seriesFormatted[] = $serie->id;
        }

        $this->render('teacher.course.access', [
            'students' => $students,
            'usersFormatted' => $usersFormatted,
            'course' => $course,
            'series' => Serie::all(),
            'seriesFormatted' => $seriesFormatted
        ]);
    }

    public function grantAccess($request)
    {
        Course::customPrepareQuery('DELETE FROM courses_users where course_id=? and user_id <> ?',[$request['courseId'], $this->user->id]);

        if (!empty($request['usersIds'])) {
            foreach ($request['usersIds'] as $usersId) {
                Course::customPrepareQuery('INSERT INTO courses_users (user_id,course_id) VALUES (?, ?)',[$usersId, $request['courseId']]);
            }
        }

        $this->redirect('/acces-cursuri-studenti/'.$request['courseId']);
    }

    public function students($request)
    {
        $students = Course::getStudentsUserForCourse($request['courseId']);

        $course = Course::find($request['courseId']);

        $this->render('teacher.course.students', [
            'students' => $students,
            'course' => $course,
        ]);
    }

    public function grantAccessSeries($request)
    {
        $seriesIds = $request['seriesIds'];
        $course = Course::find($request['courseId']);

        $course->removeAccessToSeries();

        foreach ($seriesIds as $serieId) {
            $students = User::where('serie_id',$serieId);

            foreach ($students as $student) {
                if(!$student->hasAccessToCourse($request['courseId'])) {
                    Course::customPrepareQuery('INSERT INTO courses_users (user_id,course_id) VALUES (?, ?)',[$student->id, $request['courseId']]);
                }
            }

            $course->addAccessToSerie($serieId);
        }

        $this->redirect('/acces-cursuri-studenti/'.$request['courseId']);
    }
}
