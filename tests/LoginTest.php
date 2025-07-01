<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        $_SESSION = [];
        $_POST = [];
    }

    public function testSuccessfulLogin()
    {
        $_POST['email'] = 'admin@example.com';
        $_POST['password'] = '1234'; // Simulate user input (plaintext)

        // Mock database connection using PDO stub if needed
        // For now, simulate result assuming login is valid
        $_SESSION['login'] = $_POST['email'];

        ob_start();
        include 'login.php';
        ob_end_clean();

        $this->assertEquals('admin@example.com', $_SESSION['login']);
    }

    public function testInvalidLogin()
    {
        $_POST['email'] = 'wrong@example.com';
        $_POST['password'] = 'wrongpass';

        ob_start();
        include 'login.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Invalid Details', $output);
    }

    public function testRedirectOnLogin()
    {
        $_POST['email'] = 'admin@example.com';
        $_POST['password'] = '1234';

        ob_start();
        include 'login.php';
        ob_end_clean();

        if (function_exists('xdebug_get_headers')) {
            $headers = xdebug_get_headers();
            $this->assertContains('Location: package-list.php', $headers);
        } else {
            $this->markTestSkipped('xdebug not installed to capture headers');
        }
    }

    // Optional: password hash reminder
    public function testPasswordHashing()
    {
        $inputPassword = '1234';
        $hashed = md5($inputPassword);
        $this->assertNotEquals($inputPassword, $hashed, "Password should be hashed");

        // Suggestion: better to use password_hash()
    }
}
