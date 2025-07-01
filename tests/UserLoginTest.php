<?php
// tests/UserLoginTest.php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/config.php';


class UserLoginTest extends TestCase
{
    private $dbh;
    private $testEmail = "testuser@example.com";
    private $testPassword = "password123";

    protected function setUp(): void
    {
        $this->dbh = getDBConnection();

        // Clean up any previous test data
        $this->dbh->prepare("DELETE FROM tblusers WHERE EmailId = :email")
            ->execute(['email' => $this->testEmail]);

        // Register test user
        registerUser($this->dbh, "Test User", "0123456789", $this->testEmail, $this->testPassword);
    }

    public function testUserLoginSuccess()
    {
        $result = userLogin($this->dbh, $this->testEmail, $this->testPassword);
        $this->assertIsArray($result);
        $this->assertEquals($this->testEmail, $result['EmailId']);
    }

    public function testUserLoginFailWrongPassword()
    {
        $result = userLogin($this->dbh, $this->testEmail, "wrongpassword");
        $this->assertFalse($result);
    }

    public function testUserLoginFailNoUser()
    {
        $result = userLogin($this->dbh, "nonexist@example.com", "password123");
        $this->assertFalse($result);
    }
}
