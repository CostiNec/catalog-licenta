<?php
namespace models;

use core\Helper;
use core\Model;
use PDO;

/**
 * const PRIMARYKEY = 'ID';
 * const TABLE = 'table_name';(default is strtolower(model_name).'s' ex Example => articles
 */

class Course extends Model
{
    protected $columns = [
        'name',
        'id',
        'description'
    ];

    public function getAbbreviation()
    {
        $explodedName = explode(' ',$this->name);

        $abbreviation = '';

        foreach ($explodedName as $item) {
            $abbreviation .= strtoupper($item[0]);
        }

        return $abbreviation;
    }

    public static function getTeachersUserIds($courseId)
    {
        $results =  self::customPrepareQuery('SELECT user_id FROM catalog.courses_users cu
                                        LEFT JOiN catalog.users u on u.id = cu.user_id
                                        WHERE course_id=? AND u.role=?;',[$courseId, User::TEACHER])->fetchAll();

        $ids = [];

        foreach ($results as $result) {
            $ids[] = $result['user_id'];
        }

        return $ids;
    }

    public static function getStudentsUserForCourse($courseId)
    {
        $results =  self::customPrepareQuery('SELECT u.* FROM catalog.courses_users cu
                                        LEFT JOiN catalog.users u on u.id = cu.user_id
                                        WHERE course_id=? AND u.role=?;',[$courseId, User::STUDENT])->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($results as $result) {
            $users[] = new User($result);
        }

        return $users;
    }

    public static function getStudentsUserIds($courseId)
    {
        $results =  self::customPrepareQuery('SELECT user_id FROM catalog.courses_users cu
                                        LEFT JOiN catalog.users u on u.id = cu.user_id
                                        WHERE course_id=? AND u.role=?;',[$courseId, User::STUDENT])->fetchAll();

        $ids = [];

        foreach ($results as $result) {
            $ids[] = $result['user_id'];
        }

        return $ids;
    }

    public static function getCoursesByTeacherId($userId)
    {
        $results =  self::customPrepareQuery('SELECT c.* FROM catalog.courses c
                                                    LEFT JOiN catalog.courses_users cu on c.id = cu.course_id
                                                    WHERE cu.user_id=?;',[$userId])->fetchAll(PDO::FETCH_ASSOC);

        $courses = [];

        foreach ($results as $result) {
            $courses[] = new Course($result);
        }

        return $courses;
    }
}
