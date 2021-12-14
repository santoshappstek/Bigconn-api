<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailAttachments extends Model
{
    protected $table = 'mail_attachments';
	protected $primaryKey = 'attachment_id'; 
	protected $fillable = ['messageid','attachment'];

	public function mail_attachments($attachment_id)
    {
        $mail_attachments=mail_attachments::find($attachment_id);
        return $mail_attachments;
    }
}
