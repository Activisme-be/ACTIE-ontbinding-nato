<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signatures extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'signatures';

    protected $fillable = ['city', 'name', 'country', 'email', 'publish'];

    public function county()
    {
        return $this->belongsTo(Countries::class, 'country');
    }

    public function cities()
    {
        return $this->belongsTo(Cities::class, 'city');
    }
}