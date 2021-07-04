<?php
namespace models;

use core\Helper;
use core\Model;
use PDO;

/**
 * const PRIMARYKEY = 'ID';
 * const TABLE = 'table_name';(default is strtolower(model_name).'s' ex Example => articles
 */

class Grade extends Model
{
    protected $columns = [
        'id',
        'value',
        'student_id',
        'teacher_id',
        'course_id',
        'feedback',
        'name'
    ];

    public static function gradesOfCourseAndStudent($studentId, $courseId)
    {
        $results = self::customPrepareQuery('SELECT * FROM grades WHERE student_id=? AND course_id=?',[$studentId, $courseId])
                        ->fetchAll(PDO::FETCH_ASSOC);

        $grades = [];

        foreach ($results as $result) {
            $grade = new Grade($result);
            $grade->extra['teacher'] = User::find($grade->teacher_id);
            $grade->extra['student'] = User::find($grade->student_id);
            $grades[] = $grade;
        }

        return $grades;
    }

    public static function getAllOrdered($courseIds = [],$order = 'asc')
    {
        $sql = 'SELECT * FROM grades';

        if (!empty($courseIds)) {
            $sql .= ' WHERE course_id IN (' . implode(',',$courseIds) . ')';
        }

        $sql .= ' ORDER BY value '.$order;

        $results = self::customQuery($sql)
            ->fetchAll(PDO::FETCH_ASSOC);

        $grades = [];

        foreach ($results as $result) {
            $grade = new Grade($result);
            $grade->extra['teacher'] = User::find($grade->teacher_id);
            $grade->extra['student'] = User::find($grade->student_id);
            $grades[] = $grade;
        }

        return $grades;
    }
}
