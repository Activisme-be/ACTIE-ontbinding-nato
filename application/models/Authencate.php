<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Authencate extends Model
{
    /**
     * The database table for the model.
     *
     * @return string
     */
    protected $table = 'users';

    /**
     * Permissions data relation for the user.
     *
     * @return array|collection
     */
    public function permissions()
    {
        return $this->belongsToMany('Permissions', 'login_permissions', 'login_id', 'permissions_id')
            ->withTimestamps();
    }
    
    /**
     * Abiltiess data relation for the user.
     *
     * @return array|collection
     */
    public function abilities()
    {
        return $this->belongsToMany('Abilities', 'login_abilities', 'login_id', 'ability_id')
            ->withTimeStamps();
    }

    public function ban()
    {
        return $this->belongsTo('Ban', 'ban_id');
    }
}
