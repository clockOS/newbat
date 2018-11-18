<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'body',
        'title',
        'read'
    ];

    /**
     * һ��ֻ֪ͨ����һ���û�
     * A notification belongs to a user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
