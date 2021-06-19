<?php
namespace models;

use core\Model;
use PDO;

/**
 * const PRIMARYKEY = 'ID';
 * const TABLE = 'table_name';(default is strtolower(model_name).'s' ex Example => articles
 */

class User extends Model
{
    const GENDERS = [
        'm' => 'Barbat',
        'f' => 'Femeie'
    ];

    const ROLES = [
        self::STUDENT => 'Student',
        self::TEACHER => 'Profesor',
        self::ADMIN => 'Admin'
    ];

    const STUDENT = 1;
    const TEACHER = 2;
    const ADMIN = 10;

    protected $columns = [
        'id',
        'first_name',
        'last_name',
        'password',
        'email',
        'gender',
        'birthday',
        'phone',
        'role',
        'group_name'
    ];

    public function fullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getAbbreviation()
    {
        return $this->last_name[0] . $this->first_name[0];
    }

    public function isTeacher()
    {
        return $this->role == self::TEACHER;
    }

    public function isStudent()
    {
        return $this->role == self::STUDENT;
    }

    public function isAdmin()
    {
        return $this->role == self::ADMIN;
    }

    public function userRoleName()
    {
        if ($this->isAdmin()) {
            return 'Admin';
        }

        if ($this->isTeacher()) {
            return 'Profesor';
        }

        return 'Student';
    }

    public function birthday()
    {
        $time = strtotime($this->birthday);

        return date('d-m-Y',$time);
    }

    public function gender()
    {
        if (in_array($this->gender,['m','M'])) {
            return 'Masculin';
        }

        if (in_array($this->gender,['f','F'])) {
            return 'Feminin';
        }
    }

    public static function getCoursesOfStudent($studentId)
    {
        $results =  self::customPrepareQuery('SELECT c.* FROM courses_users cu
                                        LEFT JOiN courses c on c.id = cu.course_id
                                        WHERE cu.user_id=?;',[$studentId])->fetchAll(PDO::FETCH_ASSOC);

        $courses = [];

        foreach ($results as $result) {
            $courses[] = new Course($result);
        }

        return $courses;
    }
}
