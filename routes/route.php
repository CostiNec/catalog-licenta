<?php

namespace routes;

require '../vendor/autoload.php';

use core\Helper;
use core\Route;

$route = new Route();

$route->get('/','HomeController','index');

/** Login routes */
$route->get('/conectare','LoginController','authenticate');
$route->post('/login','LoginController','login');
$route->get('/logout','UserController','logout');

/** My account */
$route->get('/detalii-cont','UserController','details');

/** Admin's routes */
$route->get('/admin-cursuri','CourseController','index');
$route->get('/admin-cursuri/creaza','CourseController','create');
$route->get('/admin-cursuri/editeaza/{courseId}','CourseController','edit');
$route->post('/admin/course/store','CourseController','store');
$route->post('/admin/course/update/{courseId}','CourseController','update');
$route->post('/admin/course/delete/{courseId}','CourseController','delete');

$route->get('/admin-utilizatori','UserController','index');
$route->get('/admin-utilizatori/creaza','UserController','create');
$route->get('/admin-utilizatori/editeaza/{userId}','UserController','edit');
$route->post('/admin/user/store','UserController','store');
$route->post('/admin/user/update/{userId}','UserController','update');
$route->post('/admin/user/delete/{userId}','UserController','delete');

/** Teacher's routes */
$route->get('/profesor-cursuri','TeacherController','indexCourses');
$route->get('/acces-cursuri-studenti/{courseId}','TeacherController','accessCourses');
$route->post('/grant-access/{courseId}','TeacherController','grantAccess');

$route->get('/stundenti/{courseId}','TeacherController','students');
$route->get('/note/{courseId}/{studentId}','GradeController','index');
$route->get('/nota/creaza/{courseId}/{studentId}','GradeController','create');
$route->get('/nota/editeaza/{gradeId}','GradeController','edit');
$route->post('/grade/update/{gradeId}','GradeController','update');
$route->post('/grade/delete/{gradeId}','GradeController','delete');


/** Student's routes */
$route->get('/cursurile-mele','StudentController','indexCourse');
$route->get('/notele-mele/{courseId}','StudentController','indexGrades');
