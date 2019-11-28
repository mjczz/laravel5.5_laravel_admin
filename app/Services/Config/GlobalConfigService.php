<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2019/11/28
 * Time: 10:37
 */


namespace App\Services\Config;

use Encore\Admin\Config\ConfigModel;

class GlobalConfigService
{
    /**
     * 从数据库加载配置到缓存
     *
     * @throws \Exception
     */
    public static function loadAllConfig()
    {
        $cache_config = cache("config");

        if (empty($cache_config)) {
            $cache_config = ConfigModel::all(['name', 'value']);
            cache(["config" => $cache_config->toArray()], now()->addDay());
        }

        foreach ($cache_config as $config) {
            config([$config['name'] => $config['value']]);
        }
    }

}
