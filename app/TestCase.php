<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    //
    protected $table = "test_case";

    protected $primaryKey = "id";

    protected $fillable = ['name', 'steps', 'test_data', 'actual_results', 'notes', 'status', 'test_request_id', 'test_case_type_id', 'expected_result_id'];

    public function testRequest()
    {
        return $this->hasOne('App\TestRequest', 'id', 'test_request_id');
    }

    public function testCaseType()
    {
        return $this->hasOne('App\TestCaseType', 'id', 'test_case_type_id');
    }

    public function expectedResult()
    {
        return $this->hasOne('App\ExpectedResult', 'id', 'expected_result_id');
    }
}
