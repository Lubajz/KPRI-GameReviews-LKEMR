<?php
include 'prolog.php';
include 'html-begin.php';
include 'nav.php';
?>
<main style="flex: 1; display: flex; align-items: center; justify-content: center; border: 2px solid #add8e6;">
    <div class="login-container">
        <form id="login-form" action="login_action.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign In</button>
        </form>
    </div>
</main>
<?php
include 'html-end.php';
?>
