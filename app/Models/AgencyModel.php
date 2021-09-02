<?php

namespace App\Models;

use CodeIgniter\Model;

class AgencyModel extends Model
{

    protected $table = 'tb_datasales';

    public function selectAgency()
    {
        return $this->select('agency')
            ->groupBy('agency')
            ->orderBy('agency','ASC')
            ->paginate(10, 'joinSalesLeft');
    }

}