<?php
namespace models;

use core\Model;

/**
 * const PRIMARYKEY = 'ID';
 * const TABLE = 'table_name';(default is strtolower(model_name).'s' ex Example => articles
 */

class Group extends Model
{
    CONST TABLE = 'student_groups';
    protected $columns = ['name','id'];
}
