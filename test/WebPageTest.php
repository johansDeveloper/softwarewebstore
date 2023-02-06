<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once '../src/WebPage';

/**
 * Description of WebPageTest
 *
 * @author Johans Caicedo
 */
class WebPageTest extends TestCase {

    protected function webPageProvider(): WebPage {
        return new WebPage();
    }

    public function __setTitleTest(): void {

        $this->webPageProvider()->setTitle();
    }

    public function getMetadataTest(): void {
        
    }

    public function setWordLengthTest(): void {
        
    }

    public function setMetadataTest(): void {
        
    }

    public function check_web_contentTest(): void {
        
        
    }

    public function load_web_contenTest(): void {

        $expected = $this->webPageProvider()->load_web_content("src/template.php");
        $current = file("src/template.php");

        assertSame($expected, $current);
    }

}
