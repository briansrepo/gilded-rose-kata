<?php

namespace GildedRoseTests;

use PHPUnit\Framework\TestCase;
use GildedRose\Program;
use GildedRose\Item;

class Test extends TestCase
{
  
  protected $items, $app;
  
  protected function setUp()
  {
    $this->item = new Item(
      array (
        'name' => 'Item',
        'sellIn' => '10',
        'quality' => '10'
      )
    );
    $this->app = new Program( array( $this->item ) );
  }
  
  public function testItemCanBeCreated()
  {
    $this->assertInstanceOf(Item::class, $this->item);
  }

  public function testProgramCanBeCreated()
  {
    $this->assertInstanceOf(Program::class, $this->app);
  }

  public function testUpdateOrdinaryItemQuality()
  {
    $this->item->name = 'Ordinary Item';
    $this->app->UpdateOrdinaryItemQuality($this->item);
    $this->assertEquals($this->item->quality, 9);
  }
  
  public function testUpdateQualityEffectOnOrdinaryItemSellIn()
  {
    $this->item->name = 'Ordinary Item';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->sellIn, 9);
  }

  public function testUpdateQualityEffectOnAgedBrieQuality1()
  {
    $this->item->name = 'Aged Brie';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 11);
  }
  
  public function testUpdateQualityEffectOnAgedBrieQuality2()
  {
    $this->item->name = 'Aged Brie';
    $this->item->sellIn = 0;
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 12);
  }
  
  public function testUpdateQualityEffectOnAgedBrieSellIn()
  {
    $this->item->name = 'Aged Brie';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->sellIn, 9);
  }
  
  public function testUpdateQualityEffectOnSulfurasQuality()
  {
    $this->item->name = 'Sulfuras, Hand of Ragnaros';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 10);
  }
  
  public function testUpdateQualityEffectOnSulfurasSellIn()
  {
    $this->item->name = 'Sulfuras, Hand of Ragnaros';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->sellIn, 10);
  }
  
  public function testUpdateQualityEffectOnBackstagePassesQuality1()
  {
    $this->item->name = 'Backstage passes to a TAFKAL80ETC concert';
    $this->item->sellIn = 11;
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 11);
  }
  
  public function testUpdateQualityEffectOnBackstagePassesQuality2()
  {
    $this->item->name = 'Backstage passes to a TAFKAL80ETC concert';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 12);
  }
  
  public function testUpdateQualityEffectOnBackstagePassesQuality3()
  {
    $this->item->name = 'Backstage passes to a TAFKAL80ETC concert';
    $this->item->sellIn = 5;
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->quality, 13);
  }
  
  public function testUpdateQualityEffectOnBackstagePassesSellIn()
  {
    $this->item->name = 'Backstage passes to a TAFKAL80ETC concert';
    $this->app->UpdateQuality();
    $this->assertEquals($this->item->sellIn, 9);
  }

}
