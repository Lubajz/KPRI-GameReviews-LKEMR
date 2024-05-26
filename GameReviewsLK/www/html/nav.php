<button id="menu-toggle" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg hover:bg-gray-100">
    <i class="fa fa-bars fa-lg"></i>
</button>

<nav id="side-menu" class="fixed right-0 top-0 w-64 h-full bg-white shadow-md transform translate-x-full transition-transform">
    <ul class="font-medium flex flex-col mt-4 border border-gray-100 rounded-lg">
        <li>
            <a href="index.php" class="block p-2 rounded text-blue-700 hover:bg-gray-100">Home</a>
        </li>
        <li>
            <a href="reviews.php" class="block p-2 rounded text-blue-700 hover:bg-gray-100">Reviews</a>
        </li>
        <?php if (isUser()): ?>
        <li>
            <a href="upload.php" class="block p-2 rounded text-blue-700 hover:bg-gray-100">Upload Review</a>
        </li>
        <?php endif; ?>
        <?php if (isUser()): ?>
            <li>
                <a href="logout_action.php" class="block p-2 rounded text-blue-700 hover:bg-gray-100">Sign Out</a>
            </li>
        <?php else: ?>
            <li>
                <a href="login.php" class="block p-2 rounded text-blue-700 hover:bg-gray-100">Sign In</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
