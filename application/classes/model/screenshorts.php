<?php defined('SYSPATH') or die('No direct script access.');

class Model_Screenshorts extends Model
{
    const STATUS_NEED_SCREENSHORT = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_GENERATED = 2;

    const TYPE_THUMB = 0; // the smallest image
    const TYPE_OTHER = 1;

    public function demon_task()
    {
        $uniq = DB::select('url_id')
            ->from('screenshorts')
            ->where('screenshorts.status', '=', self::STATUS_NEED_SCREENSHORT)
            ->limit(1);
        
        $query = DB::select('screenshorts.*','sites.link')
            ->from('screenshorts')
            ->where('screenshorts.status', '=', self::STATUS_NEED_SCREENSHORT)
            ->and_where('screenshorts.url_id', '=',$uniq)
            ->join('sites')
            ->on('sites.id', '=', 'screenshorts.url_id')
            ->as_assoc()->execute();
        $result = $query->as_array();
        if ( ! $result)
            return $result;

        $ids = Arr::pluck($result, 'id');
        Db::update('screenshorts')
            ->set(array('status' => self::STATUS_IN_PROGRESS))
            ->where('screenshorts.id', 'in', $ids)->execute();
        return $result;
    }
}