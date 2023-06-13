<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="http://localhost/test-php//static/css/style.css">

</head>

<body>
    <?php
    if (isset($data["errors"]) && count($data["errors"])) {
        $errors = $data["errors"];
        foreach ($errors as $errorKey => $errorMessage) {
    ?>
            <p class='error'><span><?= $errorKey; ?></span><?= $errorMessage; ?></p>
    <?php
        }
    }
    ?>



    <form action="/test-php/public/form/index" method="post">
        <input type="hidden" name="token" value="<?= $data["CSRF"]; ?>">
        <textarea name="content" id="content" cols="30" rows="10"><?= $data["content"]; ?></textarea>
        <button>Send Data</button>
    </form>
</body>

</html>