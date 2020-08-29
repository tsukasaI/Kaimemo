<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * 状態の定義
     */
    const STATUS = [
        1 => ['label' => 'すぐに必要', 'class' => 'label-danger'],
        2 => ['label' => '見つけたら買う', 'class' => 'label-info'],
        3 => ['label' => '安かったら買う', 'class' => ''],
    ];

    /**
     * 状態のラベル
     */

    public function getStatusLabelAttribute()
    {
        //状態の値
        $status = $this->attributes['status'];

        //定義されてない場合は空文字
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        //状態の値
        $status = $this->attributes['status'];

        //定義されてない場合は空文字
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

}
