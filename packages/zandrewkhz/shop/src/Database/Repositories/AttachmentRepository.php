<?php


namespace Andrewkharzin\Database\Repositories;


use Andrewkharzin\Database\Models\Attachment;

class AttachmentRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }
}
