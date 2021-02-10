<?php

declare(strict_types=1);

namespace fuyutsuki\ConfigTester;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

/**
 * Class Main
 * @package fuyutsuki\ConfigTester
 */
class Main extends PluginBase {

    public function onLoad() {
        // plugin_data/ConfigTester/data.jsonが存在しなければ
        // resourcesフォルダ内のファイルをplugin_data/[プラグイン名]フォルダに保存する
        // すでに決まったフォーマットがあるならこれを使うと便利
        $this->saveResource("data.json");
        // plugin_dataフォルダに保存したdata.jsonを読み込む
        $data = new Config($this->getDataFolder() . "data.json", Config::JSON);

        $data->set("player_name", "Steve");// "player_name"のキーに"Steve"をセット
        $data->save();// 上記の変更内容をファイルに書き込み

        $data->remove("player_name");// "player_name"のキーがあれば削除
        $data->save();// 上記の変更内容をファイルに書き込み

        $data->setAll([
            "player_name" => "Steve",
            "xuid" => "484651231548678",
            "device_os" => 7,
        ]);// data.jsonのデータをこれに置き換える
        $data->save();// 上記の変更内容をファイルに書き込み
    }

    public function onEnable() {
        $playerData = PlayerData::jsonUnserialize($this->getDataFolder() . "data.json");
        var_dump($playerData);
    }

}
