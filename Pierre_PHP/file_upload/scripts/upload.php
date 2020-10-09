<?php

if (!is_dir('uploads')) {
    mkdir('uploads');
}

if ($_POST) {
    if (isset($_POST['upTo']) && isset($_POST['upFrom']) && isset($_POST['upName']) && isset($_POST['upMessage'])) {
        $metaData = array(
            "recipient" => $_POST['upTo'],
            "sender" => $_POST['upFrom'],
            "name" => $_POST['upName'],
            "message" => $_POST['upMessage'],
            "headers" => "From: " . $_POST['upName'] . " <" . $_POST['upFrom'] . ">"
        );

        if (!array_search('', $metaData)) {
            if (mail($metaData['recipient'], $metaData['name'] . " 's file", $metaData['message'], $metaData['headers'])) {
                $link .= "<p class='text-success'>Your email to " . $metaData['recipient'] . " was sent with success.</p>";
            } else {
                $link .= "<p class='text-danger'>Email failed to send. Please try again.</p>";
            }
        }
    } else {
        $link = "<p class='text-danger'>Please fill in all fields before submitting.</p>";
    }
}

$targetDir = 'uploads/';
if (isset($_FILES['upFile'])) {
    $path = $targetDir . basename($_FILES['upFile']['name']);
    if (move_uploaded_file($_FILES['upFile']['tmp_name'], $path)) {
        $link .= "<a class='text-center' href='" . $path . "'>Click here to access your file</a>";
    } else {
        $link .= "<p class='text-danger'>File transfer unsuccessful.</p>";
    }
}

return '<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="upTo">Send to email</label>
    <input type="email" class="form-control" id="upTo" name="upTo" placeholder="Enter recipient\'s email" required>
</div>
<div class="form-group">
    <label for="upFrom">Your email</label>
    <input type="email" class="form-control" id="upFrom" name="upFrom" placeholder="Enter your contact email" required>
</div>
<div class="form-group">
    <label for="upName">Name</label>
    <input type="text" class="form-control" id="upName" name="upName" placeholder="Enter your name" required>
</div>
<div class="form-group">
    <label for="upMessage">Message</label>
    <textarea class="form-control" id="upMessage" name="upMessage" placeholder="Enter a message to accompany your file" required></textarea>
</div>
<div class="form-group">
    <label for="upFile">Attach a file:</label>
    <input type="file" id="upFile" name="upFile">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>';
