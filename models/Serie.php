<?php
namespace models;

use core\Model;

/**
 * const PRIMARYKEY = 'ID';
 * const TABLE = 'table_name';(default is strtolower(model_name).'s' ex Example => articles
 */

class Serie extends Model
{
    protected $columns = ['name', 'id'];
}
