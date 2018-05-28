<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestReport extends Model
{
    //
    protected $table = "test_report";

    protected $primaryKey = "id";

    protected $fillable = ["title", "description", "date", "tester_id", "request_id", "status", "approved_by_id", "approved"];

    public function tester()
    {
        return $this->hasOne('App\User', 'id', 'tester_id');
    }

    public function request()
    {
        return $this->belongsTo('App\TestRequest', 'request_id');
    }
    public function approvedby()
    {
        return $this->hasOne('App\User', 'id', 'approved_by_id');
    }

}
