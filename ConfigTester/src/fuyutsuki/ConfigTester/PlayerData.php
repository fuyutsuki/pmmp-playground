<?php


namespace fuyutsuki\ConfigTester;

use fuyutsuki\ConfigTester\utils\JsonUnserializable;
use JsonSerializable;
use pocketmine\utils\Config;

/**
 * Class PlayerData
 * @package fuyutsuki\ConfigTester
 */
class PlayerData implements JsonSerializable, JsonUnserializable {

    // PHP8の書き方
    public function __construct(
        private string $playerName,
        private string $xuid,
        private int $deviceOS
    ) {
        // なにか値に対して初期化処理が必要ならここに書く
    }

    public function getPlayerName(): string {
        return $this->playerName;
    }

    public function getXuid(): string {
        return $this->xuid;
    }

    public function getDeviceOS(): int {
        return $this->deviceOS;
    }

    public function jsonSerialize(): array {
        return [
            "player_name" => $this->playerName,
            "xuid" => $this->xuid,
            "device_os" => $this->deviceOS,
        ];
    }

    public static function jsonUnserialize(string $path): static {
        $data = new Config($path, Config::JSON);
        return new PlayerData(
            $data->get("player_name"),
            $data->get("xuid"),
            $data->get("device_os"),
        );
    }
}