<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeFic Sample Web UI</title>
    <style>
        body {
            text-align: center;
        }
        body > div {
            display: inline-block;
            margin: 5em auto;
        }
        button {
            margin: 1em 1em;
        }
    </style>
</head>
<body>
    <?php $tunefic = isset($_POST['tunefic']) ? json_encode($_POST) : 'null';?>
    <script>const tunefic = tuneFic = TuneFic = TUNEFIC = JSON.parse('<?=$tunefic?>');</script>
    <script src="bundle.js"></script>
</body>
</html>