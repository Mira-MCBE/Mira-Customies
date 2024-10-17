<?php
declare(strict_types=1);

namespace customiesdevs\customies\block\permutations;

use pocketmine\block\Block;
use pocketmine\block\utils\HorizontalFacingTrait;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

/**
 * Can be used to make sculk vein for example.
 *
 * Here we don't just use horizontal facing.
 */
trait AnyFacingRotatableTrait {
    use HorizontalFacingTrait;

    private int $anyFacing = Facing::UP; // default facings : up (block facing)

    private function getPropertyName(): string {
        return "customies:any_facing";
    }

    /**
     * @return BlockProperty[]
     */
    public function getBlockProperties(): array {
        return [
            new BlockProperty($this->getPropertyName(), [0, 1, 2, 3, 4, 5]),
        ];
    }

    /**
     * @return Permutation[]
     */
    public function getPermutations(): array {
        $property = $this->getPropertyName();

        // TODO rotation values
        return [
            (new Permutation("q.block_property('$property') == 0"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 0)
                    ->setInt("RZ", 2)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
            (new Permutation("q.block_property('$property') == 1"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 0)
                    ->setInt("RZ", 0)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
            (new Permutation("q.block_property('$property') == 2"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 0)
                    ->setInt("RZ", 0)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
            (new Permutation("q.block_property('$property') == 3"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 2)
                    ->setInt("RZ", 0)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
            (new Permutation("q.block_property('$property') == 4"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 1)
                    ->setInt("RZ", 0)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
            (new Permutation("q.block_property('$property') == 5"))
                ->withComponent("minecraft:transformation", CompoundTag::create()
                    ->setInt("RX", 0)
                    ->setInt("RY", 3)
                    ->setInt("RZ", 0)
                    ->setFloat("SX", 1.0)
                    ->setFloat("SY", 1.0)
                    ->setFloat("SZ", 1.0)
                    ->setFloat("TX", 0.0)
                    ->setFloat("TY", 0.0)
                    ->setFloat("TZ", 0.0)),
        ];
    }

    public function getCurrentBlockProperties(): array {
        return [$this->anyFacing];
    }

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool {
        $this->anyFacing = $face;
        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }

    public function serializeState(BlockStateWriter $out): void {
        $out->writeInt($this->getPropertyName(), $this->anyFacing);
    }

    public function deserializeState(BlockStateReader $in): void {
        $this->anyFacing = $in->readInt($this->getPropertyName());
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->facing($this->anyFacing);
    }
}