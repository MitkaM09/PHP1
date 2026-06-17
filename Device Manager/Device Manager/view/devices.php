<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencia Hardvéru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary m-0">Evidencia hardvéru</h2>
        </div>
        <div class="btn-group shadow-sm">
            <a href="index.php?status=vsetko" class="btn btn-primary fw-bold">Všetko</a>
            <a href="index.php?status=funkcne" class="btn btn-outline-success fw-bold">Len funkčné</a>
            <a href="index.php?status=nefunkcne" class="btn btn-outline-danger fw-bold">Len nefunkčné</a>
        </div>
    </div>

    <div class="card  rounded-3 ">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-primary text-primary">
                        <tr>
                            <th class="ps-4 py-3">ID</th>
                            <th class="py-3">Inventárne číslo</th>
                            <th class="py-3">Typ</th>
                            <th class="py-3">Značka</th>
                            <th class="py-3">Model</th>
                            <th class="pe-4 py-3 text-center">Stav</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($zariadenia)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">Žiadne zariadenia nezodpovedajú filtru.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($zariadenia as $d): ?>
                                <?php 
                                   
                                    $farba = ($d->getStatusId() === 1) ? "success" : "danger"; 
                                ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary"><?= $d->getId(); ?></td>
                                    <td class="fw-bold text-dark"><?= $d->getInventoryNumber(); ?></td>
                                    <td><?= $d->getType(); ?></td>
                                    <td><?= $d->getBrand(); ?></td>
                                    <td><?= $d->getModel(); ?></td>
                                    <td class="pe-4 text-center">
                                        <span class="badge bg-<?= $farba; ?>-subtle text-<?= $farba; ?> border border-<?= $farba; ?>-subtle px-3 py-2">
                                            <?= $d->getStatusText(); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>