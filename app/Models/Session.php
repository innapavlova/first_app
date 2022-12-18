<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'id';

    /**
     * Scope to detect the latest session for a logged in user
     *
     * @param Model $query model query
     * @param int $user_id user id
     * @param string $agent user agent
     * @param string $ip_address currect ip address
     *
     * @return mixed
     */
    public function scopeCurrent($query, $user_id, $agent, $ip_address)
    {
        return $query->where('user_id', '=', $user_id)
            ->where('user_agent', '=', $agent)
            ->where('ip_address', '=', $ip_address)
            ->orderBy('last_activity', 'desc');
    }
}
