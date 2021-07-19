<?php

namespace JunKR\Crops;

use JUNKR\ondo;
use pocketmine\event\block\BlockGrowEvent;

class Crops extends \pocketmine\block\Crops{

    public function onRandomTick() : void{
        $ondo = ondo::getondo($this->getLevel());
        $ondo = (int) abs($ondo);

        if(mt_rand(0, $ondo) < ($ondo / 2.3)){
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

}