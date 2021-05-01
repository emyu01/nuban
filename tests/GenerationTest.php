<?php

namespace Emyu\Nuban\Tests;

use PHPUnit\Framework\TestCase;
use Emyu\Nuban\Nuban;

/**
 * @covers \Emyu\Nuban\Generation
 */
class GenerationTest extends TestCase
{
    public function testGenerationDMB()
    {
        $accountNumber = Nuban::generate('011', '000001457');
        $this->assertSame('0000014579', $accountNumber);
    }

    public function testGenerationOFI()
    {
        $accountNumber = Nuban::generate('50547', '000021457');
        $this->assertSame('0000214579', $accountNumber);
    }
}