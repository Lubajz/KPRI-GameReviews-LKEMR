<?php
include 'prolog.php';
include 'upload_action.php';
include 'html-begin.php';
include 'nav.php';
?>
<main>
    <div class="upload-container">
        <h2>Upload XML Reviews</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Review" name="submit">
        </form>
    </div>

    <div class="toast-overlay" id="toast-overlay"></div>

</main>

<?php
include 'html-end.php';
?>