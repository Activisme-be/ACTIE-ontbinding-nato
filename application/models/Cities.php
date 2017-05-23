<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['city_name', 'lat_num', 'lng_num', 'province_id', 'postal_code'];

    public function region()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }
}