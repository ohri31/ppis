<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'description', 'equipment_type_id'
  ];

  public function equipment_type()
      {
          return $this->belongsTo('App\EquipmentType', 'equipment_type_id');
      }
}
