<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Withdraw</title>
</head>
<body>
<p>Balance <?= $user->balance ?></p>
<form method="post">
    <label for="amount">
        <input id="amount" type="number" name="amount" autofocus/>
    </label>
    <button>Withdraw</button>
</form>
</body>
</html>