<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class plant extends Model
{

    protected $table = "code_window";
    public $fillable = ['name','parent_id'];


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function childs() {
        return $this->hasMany('App\Models\plant','parent_id','id') ;
    }
}