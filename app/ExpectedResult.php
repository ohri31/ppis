<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestRequest extends Model
{
    protected $table = "expected_results";

    protected $primaryKey = "id";

    protected $fillable = [
        'min_value', 'max_value' ,'unit', 'testrequest_id', 'description'
    ];

    public function testrequest()
    {
        return $this->belongsTo('App\TestRequest', 'testrequest_id');
    }
}
