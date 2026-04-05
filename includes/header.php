<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "ATM Sin Tension" ?></title>
    <!-- links de css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/estilos.css">
    <!-- CSS extra por página, veremos si lo usamos -->
    <?php if (!empty($links_css)):
        foreach ($links_css as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php endforeach;
    endif; ?>
    
</head>