<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCaseType extends Model
{
    //
    protected $table = "test_case_type";

    protected $primaryKey = "id";

    protected $fillable = ['name'];
}
