<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestRequest extends Model
{
    //
    protected $table = "test_request";

    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'description' ,'equipment_id', 'user_id', 'status_id', 'approved', 'approvedby_id'];

        public function equipment()
            {
                return $this->belongsTo('App\Equipment', 'equipment_id');
            }
            
        public function user()
            {
                return $this->belongsTo('App\User', 'user_id');
            }

        public function approvedby()
            {
                return $this->belongsTo('App\User', 'approvedby_id');
            }

        public function status()
            {
                return $this->belongsTo('App\TestRequestsStatus', 'status_id');
            }
}
