<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_Documents extends Model
{
    protected $table = 'discount_documents';
	protected $primaryKey = 'discountdocument_id'; 
	protected $fillable = ['discountid','document_name'];

	public function discount_documents($discountdocument_id)
    {
        $discount_documents=discount_documents::find($discountdocument_id);
        return $discount_documents;
    }
}
