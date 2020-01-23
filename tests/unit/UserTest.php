<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testThatWeCanGetTheFirstName()
    {
        $this->user->setFirstName('JiHoon');

        $this->assertEquals($this->user->getFirstName(), 'JiHoon');
    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Kim');

        $this->assertEquals($this->user->getLastName(), 'Kim');
    }

    public function testFullNameIsReturned()
    {
        $this->user->setFirstName('JiHoon');
        $this->user->setLastName('Kim');

        $this->assertEquals($this->user->getFullName(), 'JiHoon Kim');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $this->user->setFirstName('   JiHoon ');
        $this->user->setLastName('Kim ');

        $this->assertEquals($this->user->getFullName(), 'JiHoon Kim');
    }

    public function testEmailAddressCanBeSet()
    {
        $this->user->setEmail('shaul1991@gmail.com');

        $this->assertEquals($this->user->getEmail(), 'shaul1991@gmail.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $this->user->setFirstName('Ji Hoon');
        $this->user->setLastName('Kim');
        $this->user->setEmail('shaul1991@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Ji Hoon Kim');
        $this->assertEquals($emailVariables['email'], 'shaul1991@gmail.com');
    }
}