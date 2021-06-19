<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
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

        $this->render('teacher.course.access', [
            'students' => $students,
            'usersFormatted' => $usersFormatted,
            'course' => $course
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
            'course' => $course
        ]);
    }
}
