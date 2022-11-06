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
    
    public function testGetHowMuchSingleCharacter(): void
    {
        $text = "a";
        $search = "a";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(1, $result[0]);
    }

    public function testGetHowMuchThreeCharacters(): void
    {
        $text = "dan";
        $search = "dan";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(1, $result[0]);
    }

    public function testGetHowMuchJohnDoe(): void
    {
        $text = "Johny Dhoe";
        $search = "Johny";
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

    public function testGetHowMuch20Chars(): void
    {
        $text = "Hermes Lenno Mathias";
        $search = "Lenno";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame(0.6, $result[0]);
    }

    public function testGetHowMuchFox(): void
    {
        $text = "The smart red brown fox jump over the chicken. The fox them run to the montain.";
        $search = "fox";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame("0.29", substr($result[0], 0, 4));
        $this->assertSame("0.68", substr($result[1], 0, 4));
    }

    public function testGetHowMuchThreeSearchs(): void
    {
        $text = "The name is Louis. He is a politician. Louis is not a fair guy. He tried to manipulate instituitions. Louis is a corrupt one.";
        $search = "Louis";
        $this->readingHowMuch->setFullText($text);
        $result = $this->readingHowMuch->getHowMuch($search);
        $this->assertSame("0.13", substr($result[0], 0, 4));
        $this->assertSame("0.35", substr($result[1], 0, 4));
        $this->assertSame("0.85", substr($result[2], 0, 4));
    }
}
