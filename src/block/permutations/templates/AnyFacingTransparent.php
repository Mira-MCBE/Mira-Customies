<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations\templates;

use pocketmine\block\Transparent;
use customiesdevs\customies\block\permutations\AnyFacingRotatableTrait;
use customiesdevs\customies\block\permutations\Permutable;

class AnyFacingTransparent extends Transparent implements Permutable {
    use AnyFacingRotatableTrait;
}