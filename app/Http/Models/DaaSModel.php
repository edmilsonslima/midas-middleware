<?php

/**
 * Created by GT-Nuvem.
 * User: maires
 * Date: 04/12/16
 * Time: 17:19
 */

namespace App\Http\Models;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class DaaSModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'dataset';


    public function get_provider_api($dataset_id)
    {
        $query = self::select('provider.domain', 'api.dataset_param', 'api.search_path', 'api.query_param', 'api.sort_param', 'api.limit_param', 'api.records_param', 'api.fields_param')
                       ->join('provider', 'provider.id', '=', 'dataset.id_provider')
                       ->join('api', 'api.id', '=', 'provider.id_api')
                       ->where('dataset.id', $dataset_id)->get();

        return $query;
    }
}
