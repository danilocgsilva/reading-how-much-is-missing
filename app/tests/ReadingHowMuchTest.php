<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Danilocgsilvame\HowMuchIsStillMissing\{ReadingHowMuch, ReadingHowMuchException};

class ReadingHowMuchTest extends TestCase
{
    private ReadingHowMuch $readingHowMuch;
    
    public function setUp(): void
    {
        $this->readingHowMuch = new ReadingHowMuch();
    }
    
    public function testGetHowMuch(): void
    {
        $text = "a";
        $search = "a";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(1, $result[0]);
    }

    public function testGetHowMuch2(): void
    {
        $text = "dan";
        $search = "dan";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(1, $result[0]);
    }

    public function testGetHowMuch3(): void
    {
        $text = "John Dhoe";
        $search = "John";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(0.5, $result[0]);
    }

    public function testExceptionIfMissingFullText(): void
    {
        $this->expectException(ReadingHowMuchException::class);
        $search = "John";
        $this->readingHowMuch->getHowMuch($search);
    }

    public function testGetHowMuch4(): void
    {
        $text = "Hermes Lennon Mathians";
        $search = "Lenno";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(0.6, $result[0]);
    }
}
