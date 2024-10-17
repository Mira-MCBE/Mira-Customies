<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations\templates;

use pocketmine\block\Transparent;
use customiesdevs\customies\block\permutations\Permutable;
use customiesdevs\customies\block\permutations\RotatableTrait;

class RotatableTransparent extends Transparent implements Permutable {
    use RotatableTrait;
}