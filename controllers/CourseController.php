<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
use models\User;

class CourseController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
        if ($this->guest) {
            $this->redirect('/');
        }

        if (!$this->user->isAdmin()) {
            $this->redirect('/');
        }
    }

    public function index($request)
    {
        $courses = Course::all();
        $this->render('admin.course.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $users = User::where('role',User::TEACHER);

        $usersFormatted = [];

        foreach ($users as $userTmp) {
            $usersFormatted[$userTmp->id] = $userTmp->fullName();
        }

        $this->render('admin.course.create', [
            'usersFormatted' => $usersFormatted
        ]);
    }

    public function edit($request)
    {
        $users = User::where('role',User::TEACHER);

        $usersFormatted = [];

        foreach ($users as $userTmp) {
            $usersFormatted[$userTmp->id] = $userTmp->fullName();
        }

        $teacherSelected = Course::getTeachersUserIds($request['courseId']);

        $course = Course::find($request['courseId']);
        $this->render('admin.course.edit', [
            'course' => $course,
            'usersFormatted' => $usersFormatted,
            'teacherSelected' => $teacherSelected
        ]);
    }

    public function update($request)
    {
        $course = Course::find($request['courseId']);
        $course->name = $request['name'];
        $course->description = $request['description'];
        $course->save();

        Course::customPrepareQuery('DELETE FROM courses_users where course_id=?',[$course->id]);

        if (!empty($request['usersIds'])) {
            foreach ($request['usersIds'] as $usersId) {
                Course::customPrepareQuery('INSERT INTO courses_users (user_id,course_id) VALUES (?, ?)',[$usersId, $course->id]);
            }
        }

        $this->redirect('/admin-cursuri');
    }

    public function store($request)
    {
        $course = new Course([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        $course->save();

        if (!empty($request['usersIds'])) {
            foreach ($request['usersIds'] as $usersId) {
                Course::customPrepareQuery('INSERT INTO courses_users (user_id,course_id) VALUES (?, ?)',[$usersId, $course->id]);
            }
        }

        $this->redirect('/admin-cursuri');
    }

    public function delete($request)
    {
        $course = Course::find($request['courseId']);

        $course->delete();

        $this->redirect('/admin-cursuri');
    }
}
