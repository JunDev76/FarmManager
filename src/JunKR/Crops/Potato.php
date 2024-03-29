<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace JunKR\Crops;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use function mt_rand;

class Potato extends Crops{

    protected $id = self::POTATO_BLOCK;

    public function __construct(int $meta = 0){
        $this->meta = $meta;
    }

    public function getName() : string{
        return "고추";
    }

    public function getDropsForCompatibleTool(Item $item) : array{
        $result = [
            ItemFactory::get(Item::POTATO, 0, $this->getDamage() >= 0x07 ? mt_rand(1, 5) : 1)
        ];
        if($this->getDamage() >= 7 && mt_rand(0, 49) === 0){
            $result[] = ItemFactory::get(Item::POISONOUS_POTATO);
        }
        return $result;
    }

    public function getPickedItem() : Item{
        return ItemFactory::get(Item::POTATO);
    }
}
