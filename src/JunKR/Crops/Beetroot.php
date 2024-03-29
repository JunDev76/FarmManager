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

use JUNKR\ondo;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use function mt_rand;

class Beetroot extends Crops{

    protected $id = self::BEETROOT_BLOCK;

    public function __construct(int $meta = 0){
        $this->meta = $meta;
    }

    public function getName() : string{
        return "딸기";
    }

    public function onRandomTick() : void{
        $ondo = ondo::getondo($this->getLevel());
        $ondo = (int) abs($ondo);

        if(mt_rand(0, $ondo) < ($ondo / 2.8)){
            if($this->meta < 0x07){
                $block = clone $this;
                ++$block->meta;
                $ev = new BlockGrowEvent($this, $block);
                $ev->call();
                if(!$ev->isCancelled()){
                    $this->getLevelNonNull()->setBlock($this, $ev->getNewState(), true, true);
                }
            }
        }
    }

    public function getDropsForCompatibleTool(Item $item) : array{
        if($this->meta >= 0x07){
            return [
                ItemFactory::get(Item::BEETROOT),
                ItemFactory::get(Item::BEETROOT_SEEDS, 0, mt_rand(0, 3))
            ];
        }

        return [
            ItemFactory::get(Item::BEETROOT_SEEDS)
        ];
    }

    public function getPickedItem() : Item{
        return ItemFactory::get(Item::BEETROOT_SEEDS);
    }
}
