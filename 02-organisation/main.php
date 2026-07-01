<?php include_once 'inc/header.php'; ?>
<?php //require 'inc/header.php'; ?>
<?php include_once 'data.php'; ?>
    <h1><?= $title; ?></h1>
    <h2><?= $message; ?></h2>
    <h2>MAGIC CONSTANTS:</h2>
    <h3>__DIR__: <?= __DIR__?></h3>
    <h3>__FILE__: <?= __FILE__ ?></h3>
    <h4><?= Message();?></h4>
<?php include_once 'inc/footer.php'; ?>