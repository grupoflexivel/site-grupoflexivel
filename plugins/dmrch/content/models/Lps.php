<?php namespace Dmrch\Content\Models;

use Model;

/**
 * Lps Model
 */
class Lps extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

     public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = ['name','text_1','text_2','text_3','text_4','text_5','text_6'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmrch_content_lp';

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
    protected $jsonable = ['products'];

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
        'img_1' => ['System\Models\File', 'delete' => true],
        'img_2' => ['System\Models\File', 'delete' => true],
        'bg_0' => ['System\Models\File', 'delete' => true],
        'bg_1' => ['System\Models\File', 'delete' => true],
        'bg_2' => ['System\Models\File', 'delete' => true],
        'bg_3' => ['System\Models\File', 'delete' => true],
        'bg_4' => ['System\Models\File', 'delete' => true],
        'bg_5' => ['System\Models\File', 'delete' => true],
        'bg_6' => ['System\Models\File', 'delete' => true],
        'video_1' => ['System\Models\File', 'delete' => true],
        'video_2' => ['System\Models\File', 'delete' => true],
    ];
    public $attachMany = [
        'gallery' => ['System\Models\File', 'delete' => true],
    ];


    public function  getProductsOptions() {


        $product = \Dmrch\Catalog\Models\Product::get();

        $return = array();
        foreach ($product as $p) {
            $return[$p->id] = $p->name;
        }

        return $return;
    }

    public function  getBlogOptions() {


        $product = \Rainlab\Blog\Models\Category::get();

        $return = array();
        foreach ($product as $p) {
            $return[$p->slug] = $p->name;
        }

        return $return;
    }
}
