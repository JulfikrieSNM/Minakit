<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../includes/functions.php';

class UserRegistrationTest extends TestCase
{
    private $dbh;

    protected function setUp(): void
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=minakit_db', 'root', '');
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Clean up potential test data
        $this->dbh->prepare("DELETE FROM tblusers WHERE EmailId IN ('test@example.com', 'duplicate@example.com')")->execute();
    }

    public function testUserCanRegister()
    {
        $fname = 'Test User';
        $mnumber = '0123456789';
        $email = 'test@example.com';
        $password = 'secret123';

        $lastInsertId = registerUser($this->dbh, $fname, $mnumber, $email, $password);

        $this->assertIsNumeric($lastInsertId);
        $this->assertGreaterThan(0, $lastInsertId);

        $stmt = $this->dbh->prepare("SELECT * FROM tblusers WHERE id = ?");
        $stmt->execute([$lastInsertId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals($email, $user['EmailId']);
        $this->assertEquals(md5($password), $user['Password']);
    }

    public function testDuplicateEmailRegistrationFails()
    {
        $email = 'duplicate@example.com';

        // First registration should succeed
        $this->assertIsNumeric(registerUser($this->dbh, 'First User', '0111111111', $email, 'pass123'));

        // Second registration with same email should fail (if UNIQUE constraint enforced)
        $this->expectException(PDOException::class);
        registerUser($this->dbh, 'Second User', '0222222222', $email, 'pass456');
    }

    public function testRegistrationWithEmptyInputFails()
    {
        $this->expectException(PDOException::class);
        registerUser($this->dbh, '', '', '', '');
    }

    protected function tearDown(): void
    {
        $this->dbh->prepare("DELETE FROM tblusers WHERE EmailId IN ('test@example.com', 'duplicate@example.com')")->execute();
    }
}
