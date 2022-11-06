<?php

namespace Danilocgsilvame\HowMuchIsStillMissing;

use ReflectionProperty;

class ReadingHowMuch
{
    private string $fullText;
    
    public function setFullText(string $fullText): self
    {
        $this->fullText = $fullText;
        return $this;
    }

    public function getHowMuch(string $terms): array
    {
        $this->checkException();
        $results = [];

        $analysingSection = $this->fullText;
        $backStringCount = 0;
        while (($iterationSearchPosition = strpos($analysingSection, $terms)) !== false) {
            $cutAnalisingPosition = strlen($terms) + $iterationSearchPosition;
            $results[] = ($backStringCount + $cutAnalisingPosition) / strlen($this->fullText);
            $analysingSection = substr($analysingSection, $cutAnalisingPosition);
            $backStringCount += $iterationSearchPosition + strlen($terms);
        }

        return $results;
    }

    private function checkException(): void
    {
        $fullTextInitialized = new ReflectionProperty($this, 'fullText');
        if (!$fullTextInitialized->isInitialized($this)) {
            throw new ReadingHowMuchException("The full text has not been setted.");
        }
    }
}
