<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new User();

        $user->setFirstName('JiHoon');

        $this->assertEquals($user->getFirstName(), 'JiHoon');
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new User();

        $user->setLastName('Kim');

        $this->assertEquals($user->getLastName(), 'Kim');
    }

    public function testFullNameIsReturned()
    {
        $user = new User();
        $user->setFirstName('JiHoon');
        $user->setLastName('Kim');

        $this->assertEquals($user->getFullName(), 'JiHoon Kim');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new User();
        $user->setFirstName('   JiHoon ');
        $user->setLastName('Kim ');

        $this->assertEquals($user->getFullName(), 'JiHoon Kim');
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new User();
        $user->setEmail('shaul1991@gmail.com');

        $this->assertEquals($user->getEmail(), 'shaul1991@gmail.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new User();
        $user->setFirstName('Ji Hoon');
        $user->setLastName('Kim');
        $user->setEmail('shaul1991@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Ji Hoon Kim');
        $this->assertEquals($emailVariables['email'], 'shaul1991@gmail.com');
    }
}