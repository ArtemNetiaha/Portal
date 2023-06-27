<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
class ContactExport implements FromCollection
{
    public function __construct(
        public $collection
    )
    {
    }

    public function collection()
    {
        return $this->collection;
    }
}