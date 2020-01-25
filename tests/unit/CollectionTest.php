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
        $this->assertInstanceOf(
            ArrayIterator::class,
            $collection->getIterator()
        );
    }

    /** @test */
    public function collectionCanBeMergedWithAnotherCollection()
    {
        $collection1 = new Collection(['one', 'two', 'three']);
        $collection2 = new Collection(['four', 'five', 'six']);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
    }

    /** @test */
    public function canAddToExistingCollection()
    {
        $collection = new Collection(['one', 'two']);
        $collection->add(['three']);

        $this->assertEquals(3, $collection->count());
        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function returnedJsonEncodedItems()
    {
        $collection = new Collection(
            [
                ['username' => 'kim'],
                ['username' => 'jihoon'],
            ]
        );

        $this->assertIsString($collection->toJson());
        $this->assertEquals(
            '[{"username":"kim"},{"username":"jihoon"}]',
            $collection->toJson()
        );
    }

    /** @test */
    public function jsonEncodingACollectionObjectReturnsJson()
    {
        $collection = new Collection(
            [
                ['username' => 'kim'],
                ['username' => 'jihoon'],
            ]
        );

        $encoded = json_encode($collection);

        $this->assertIsString($encoded);
        $this->assertEquals(
            '[{"username":"kim"},{"username":"jihoon"}]',
            $encoded
        );
    }
}