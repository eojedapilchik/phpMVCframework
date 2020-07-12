<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
  </head>
  <body>
    <h1>Welcome</h1>
    <p>Hello <?php echo htmlspecialchars($name)?> </p>
    <ul>
      <?php foreach ($colours as $colour): ?>
        <li><?php echo htmlspecialchars($colour); ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
