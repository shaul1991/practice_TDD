<?php

use PHPUnit\Framework\TestCase;
use App\Support\Collection;

class CollectionTest extends TestCase
{
    /** @test */
    public function emptyInstantiatedCollectionReturnsNoItems()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function countIsCorrectForItemsPassedIn()
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function itemsReturnedMatchItemsPassedIn()
    {
        $collection = new Collection(['one', 'two']);

        $this->assertCount(2, $collection->get());
    }

    /** @test */
    public function collectionIsInstanceOfIteratorAggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collectionCanBeIterated()
    {
        $collection = new Collection(
            [
                'one',
                'two',
                'three',
            ]
        );

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
    }
}