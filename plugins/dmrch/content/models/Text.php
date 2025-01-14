<?php namespace Dmrch\Content\Models;

use Model;

/**
 * Text Model
 */
class Text extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmrch_content_texts';

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['text_1','text_2','missao','visao','valores','linha_tempo', 'politica_qualidade'];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['linha_tempo', 'text_3'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'politica_qualidade' => ['System\Models\File', 'delete' => true],
        'politica_qualidade_en' => ['System\Models\File', 'delete' => true],
        'politica_qualidade_es' => ['System\Models\File', 'delete' => true],
    ];
    public $attachMany = [
        'galeria' => ['System\Models\File', 'delete' => true],
    ];
}
