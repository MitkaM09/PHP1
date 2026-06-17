<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Školský Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: #1b64e2af;

        min-height: 100vh;
        }
        .hlavny-nadpis {
            color: #2b3036;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }



        .box-pridanie {
            background-color: #44acedc8;
            border-radius: 12px;
            padding: 25px;
        }


        .kanban-stlpec {
            background-color: #d3e19884;
            border-radius: 12px;
            padding: 15px;
            min-height: 400px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    
    <div class="text-center mb-5">
        <h1 class="hlavny-nadpis">Moje Úlohy</h1>
    </div>

        <div class="box-pridanie mb-5">
            <h5 class="fw-bold text-secondary mb-3" style="font-size: 0.9rem; letter-spacing: 0.5px;">NOVÁ AKTIVITA</h5>
            <form action="index.php" method="POST" class="row g-3">
                <input type="hidden" name="akcia" value="pridat">
            
                <div class="col-md-7">
                    <input type="text" name="nazov" class="form-control" placeholder="Potrebné splniť:" required>
                </div>
                <div class="col-md-3">
                
                <select name="priorita" class="form-select">
                        <option value="nízka">Nízka priorita</option>
                        <option value="stredná" selected>Stredná priorita</option>
                        <option value="vysoká">Vysoká priorita</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Pridať</button>
                </div>
            </form>
        </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            
        <div class="kanban-stlpec">
                <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Na prejdenie</h5>
                <?php 
                foreach ($vsetkyUlohy as $uloha) {
                    if ($uloha->getStav() === "Na prejdenie") { 
                ?>
             
             <div class="card shadow-sm border-dark mb-3">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="m-0 fw-bold text-dark"><?= $uloha->getNazov(); ?></h6>
                                <span class="badge bg-primary"><?= $uloha->getPriorita(); ?></span>
                  
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <form action="index.php" method="POST" class="d-flex gap-2">
                       
                                <input type="hidden" name="akcia" value="posun">
                                    <input type="hidden" name="id" value="<?= $uloha->getId(); ?>">
                                    <button type="submit" name="novy_status" value="Prebieha" class="btn btn-sm btn-outline-warning fw-bold px-3">Pracujem na tom</button>
                                    <button type="submit" name="novy_status" value="Hotovo" class="btn btn-sm btn-outline-success fw-bold px-3">Hotovo</button>
                      
                                </form>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } 
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="kanban-stlpec">
         
            <h5 class="text-warning fw-bold border-bottom pb-2 mb-3">Prebieha</h5>
                <?php 
                foreach ($vsetkyUlohy as $uloha) {
                    if ($uloha->getStav() === "Prebieha") { 
                ?>
                    <div class="card shadow-sm border-dark mb-3">
              
                    <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="m-0 fw-bold text-dark"><?= $uloha->getNazov(); ?></h6>
                                <span class="badge bg-warning text-dark"><?= $uloha->getPriorita(); ?></span>
                  
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <form action="index.php" method="POST" class="d-flex gap-2">
                                    <input type="hidden" name="akcia" value="posun">
                                    <input type="hidden" name="id" value="<?= $uloha->getId(); ?>">
                                    <button type="submit" name="novy_status" value="Na prejdenie" class="btn btn-sm btn-outline-primary fw-bold px-3">Budem robiť</button>
                        
                                    <button type="submit" name="novy_status" value="Hotovo" class="btn btn-sm btn-outline-success fw-bold px-3">Hotovo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } 
                ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="kanban-stlpec">
                <h5 class="text-success fw-bold border-bottom pb-2 mb-3">Hotovo</h5>
                <?php 
                foreach ($vsetkyUlohy as $uloha) {
                    if ($uloha->getStav() === "Hotovo") { 
             
             ?>
                    <div class="card shadow-sm border-dark mb-3">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                      
                            <h6 class="m-0 fw-bold text-dark"><?= $uloha->getNazov(); ?></h6>
                                <span class="badge bg-success"><?= $uloha->getPriorita(); ?></span>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <form action="index.php" method="POST" class="d-flex gap-2">
                                    <input type="hidden" name="akcia" value="posun">
                          
                                    <input type="hidden" name="id" value="<?= $uloha->getId(); ?>">
                                    <button type="submit" name="novy_status" value="Na prejdenie" class="btn btn-sm btn-outline-primary fw-bold px-3">Budem robiť</button>
                         
                                    <button type="submit" name="novy_status" value="Prebieha" class="btn btn-sm btn-outline-warning fw-bold px-3">Pracujem na tom</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } 
                ?>
       
    </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>