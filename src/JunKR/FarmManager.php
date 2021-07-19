<?php

namespace JunKR;

use ifteam\Farms\Farms;
use JunKR\Crops\Beetroot;
use JunKR\Crops\Carrot;
use JunKR\Crops\MelonStem;
use JunKR\Crops\Potato;
use JunKR\Crops\PumpkinStem;
use JunKR\Crops\Wheat;
use pocketmine\block\BlockFactory;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\utils\Internet;
use pocketmine\utils\SingletonTrait;

class FarmManager extends PluginBase{

    public function onEnable(){
        BlockFactory::registerBlock(new Beetroot(), true);
        BlockFactory::registerBlock(new Carrot(), true);
        BlockFactory::registerBlock(new Potato(), true);
        BlockFactory::registerBlock(new PumpkinStem(), true);
        BlockFactory::registerBlock(new MelonStem(), true);
        BlockFactory::registerBlock(new Wheat(), true);
    }

}
