<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CalendarEvent
 * @package App
 */
class CalendarEvent extends Model
{

    protected $table = "calendar_events";

    /**
     * Fillables for the database
     *
     * @access protected
     * +m
     *
     * @var array $fillable
     */
    protected $fillable = array(
        'user_id',
        'title',
        'content',
        'contentFull',
        'start',
        'end',
        'recurring_date',
        'class',
    );

    /**
     * Protected Date
     *
     * @access protected
     * @var    array $dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}