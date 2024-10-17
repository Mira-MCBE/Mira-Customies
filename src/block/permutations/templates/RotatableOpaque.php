<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations\templates;

use pocketmine\block\Opaque;
use customiesdevs\customies\block\permutations\Permutable;
use customiesdevs\customies\block\permutations\RotatableTrait;

class RotatableOpaque extends Opaque implements Permutable {
    use RotatableTrait;
}