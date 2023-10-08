<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once '../app/views/templates/partials/_head.php'; ?>
</head>

<body class="bg-gray-900 text-white font-sans leading-normal tracking-normal">

    <?php include_once '../app/views/templates/partials/_nav.php'; ?>

    <?php echo $content1; ?>
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
    window.jQuery ||
      document.write(
        '<script src="../../assets/js/vendor/jquery.min.js"><\/script>'
      );
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>

