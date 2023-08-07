<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_widget',
        'title',
        'image',
        'content',
        'active',
    ];


    public static function getTitle(string $key)
    {
        $widget = TextWidget::query()->where('key_widget', '=', $key)->where('active', '=', 1)->first();

        if ($widget){
            return $widget->title;
        }

        return '';

    }

    public static function getContent(string $key)
    {
        $widget = TextWidget::query()->where('key_widget', '=', $key)->where('active', '=', 1)->first();

        if ($widget){
            return $widget->content;
        }

        return '';

    }
    
}
