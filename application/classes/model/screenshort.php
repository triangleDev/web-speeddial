<?php defined('SYSPATH') or die('No direct script access.');

class Model_Screenshorts extends Model
{
    const STATUS_NEED_SCREENSHORT = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_GENERATED = 2;
    const STATUS_FAIL = 3;

    const TYPE_THUMB = 0; // the smallest image
    const TYPE_OTHER = 1;

    public static function demon_task()
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

    public static function demon_sucess($params)
    {
        Db::update('screenshorts')
            ->set(array(
                'status' => self::STATUS_GENERATED,
                'file' => $params['file'],
            ))
            ->where('screenshorts.id', '=', $params['id'])->execute();
    }

    public static function demon_failure($id)
    {
        Db::update('screenshorts')
            ->set(array(
            'status' => self::STATUS_FAIL,
        ))
            ->where('screenshorts.id', '=', $id)->execute();
    }
}