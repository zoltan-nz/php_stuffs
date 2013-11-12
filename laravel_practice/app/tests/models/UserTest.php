<?php

class UserTest extends TestCase {

     /**
      * Username is required
      */

    public function testUsernameIsRequired()
    {
        // Create a new User
        $user = new User;
        $user->email = "something@test.com";
        $user->password = 'password';
        $user->password_confirmation = 'password';

        // Should not save
        $this->assertFalse($user->save());

        // Save the errors
        $errors = $user->errors()->all();

        // There should be 1 error
        $this->assertCount(1, $errors);

        // The username error should be set
        $this->assertEquals($errors[0], "The username field is required.");
    }
}