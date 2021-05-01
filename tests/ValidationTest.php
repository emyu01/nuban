<?php

namespace Emyu\Nuban\Tests;

use PHPUnit\Framework\TestCase;
use Emyu\Nuban\Nuban;

/**
 * @covers \Emyu\Nuban\Validation
 */
class ValidationTest extends TestCase
{

    public function testValidationDMB()
    {
        $valid = Nuban::validate("011", '0000014579');
        $this->assertSame('Valid', $valid);
    }

    public function testValidationOFI()
    {
        $valid = Nuban::validate("50547", '0000214579');
        $this->assertSame('Valid', $valid);
    }
}