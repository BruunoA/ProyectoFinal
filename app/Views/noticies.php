<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/noticies.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Document</title>
</head>
<body>
<?= $this->include('general/menu'); ?>

<div class="w3-container" style="margin-top: 2rem;">
    <div class="w3-container w3-teal">
        <h1>Noticies</h1>
    </div>
    <div class="w3-row-padding" style="margin-top: 2rem;">
      <div class="w3-col l6 m6 s10 main-news">
        <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="w3-card news-card" style="display:flex; flex-direction: column;">
          <a href="noticiaGrande.html"><img src="<?= base_url('assets/img/noticia.jpeg'); ?>" style="width:100%"></a>
          <div class="w3-container news-container">
            <h5><strong>5 Terre</strong></h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, hic et quidem sunt debitis error.
              Architecto facilis sit nisi velit aperiam. Ex nulla labore, doloremque adipisci odit animi esse eligendi?
            </p>
          </div>
        </div>
        <?php endfor; ?>
      </div>

<?= $this->include('general/footer'); ?>
</body>
</html>
