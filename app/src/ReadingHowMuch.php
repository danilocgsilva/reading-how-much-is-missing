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
        $noSpaces = str_replace(" ", "", $this->fullText);
        return [ strlen($terms) / strlen($noSpaces) ];
    }

    private function checkException(): void
    {
        $fullTextInitialized = new ReflectionProperty($this, 'fullText');
        if (!$fullTextInitialized->isInitialized($this)) {
            throw new ReadingHowMuchException("The full text has not been setted.");
        }
    }
}
