<?php

namespace controllers;

use core\Controller;
use core\Helper;
use models\Course;
use models\Group;
use models\Serie;
use models\User;

class UserController extends Controller
{
    private $page = 1;
    const NR_ON_PAGE = 16;

    public function __construct($request)
    {
        if (!empty($_GET['page'])) {
            $this->page = $_GET['page'];
        }

        parent::__construct($request);
        if ($this->guest) {
            $this->redirect('/');
        }

    }

    public function details($request)
    {
        $this->render('user.details');
    }

    public function logout()
    {
        session_destroy();

        $this->redirect('/');
    }

    public function index()
    {
        $usersWithCounts = User::allWithPaginationCustom($this->page,self::NR_ON_PAGE,$this->user->id);

        $users = $usersWithCounts['models'];
        $pages  = $usersWithCounts['pages'];

        $this->render('admin.user.index', [
            'users' => $users,
            'pages' => $pages
        ]);
    }

    public function delete($request)
    {
        $userTmp = User::find($request['userId']);

        $userTmp->delete();

        $this->redirect('/admin-utilizatori');
    }

    public function create($request)
    {
        $this->render('admin.user.create', [
            'series' => Serie::all(),
            'groups' => Group::all()
        ]);
    }

    public function store($request)
    {
        $userData = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'group_id' => !empty($request['group_id']) ? $request['group_id'] : null,
            'serie_id' => !empty($request['serie_id']) ? $request['serie_id'] : null,
            'birthday' => date('Y-m-d', strtotime($request['birthday'])),
            'email' => $request['email'],
            'password' => md5($request['password']),
            'role' => $request['role'],
            'phone' => $request['phone'],
            'gender' => $request['gender']
        ];

        $user = new User($userData);

        $user->save();

        $this->redirect('/admin-utilizatori');
    }

    public function edit($request)
    {
        $userTmp = User::find($request['userId']);

        $this->render('admin.user.edit', [
            'userTmp' => $userTmp,
            'series' => Serie::all(),
            'groups' => Group::all()
        ]);
    }

    public function update($request)
    {
        $userTmp = User::find($request['userId']);

        if ($request['email'] != $userTmp->email) {
            if (!empty(User::find($request['email'],'email'))) {
                $this->redirect('/admin-utilizatori/editeaza/'.$userTmp->id.'?email=invalid');
            }
        }

        $userTmp->first_name = $request['first_name'];
        $userTmp->last_name = $request['last_name'];
        $userTmp->group_id = !empty($request['group_id']) ? $request['group_id'] : null;
        $userTmp->serie_id = !empty($request['serie_id']) ? $request['serie_id'] : null;
        $userTmp->birthday = date('Y-m-d', strtotime($request['birthday']));
        $userTmp->email = $request['email'];
        $userTmp->role = $request['role'];
        $userTmp->phone = $request['phone'];
        $userTmp->gender = $request['gender'];

        if (!empty($request['password'])) {
            $userTmp->password = md5($request['password']);
        }

        $userTmp->save();

        $this->redirect('/admin-utilizatori');
    }
}
