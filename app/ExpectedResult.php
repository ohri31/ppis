<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpectedResult extends Model
{
    protected $table = "expected_results";

    protected $primaryKey = "id";

    protected $fillable = [
        'description', 'unit', 'testrequest_id', 'min_result', 'max_result'
    ];

    public function testrequest()
    {
        return $this->belongsTo('App\TestRequest', 'testrequest_id');
    }

    public function testCase()
    {
        return $this->hasOne('App\TestCase', 'expected_result_id', 'id');
    }
}
