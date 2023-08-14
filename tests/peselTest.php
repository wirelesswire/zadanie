<?php
namespace App\Controller;
use PHPUnit\Framework\TestCase;
require_once   __DIR__ . '/../src/Controller/zad2/peselTester.php';
final class StackTest extends TestCase
{

    public function testValidPesel()
    {
        // Test a valid PESEL
        $this->assertSame("podany numer  jest poprawny ",peselTester::isOk("44051401458"));
    }

    public function testInvalidPesel()
    {
        // Test an invalid PESEL
        $this->assertSame("podany numer nie jest poprawny", peselTester::isOk("12345678901"));
    }

    public function testInvalidLength()
    {
        // Test input with incorrect length
        $this->assertSame("podany numer nie jest poprawny",peselTester::isOk("1234567890")); // Length < 11
        $this->assertSame("podany numer nie jest poprawny",peselTester::isOk("123456789012")); // Length > 11
    }
}
