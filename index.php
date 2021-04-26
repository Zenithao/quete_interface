<?php
require_once 'src/Car.php';
require_once 'src/Truck.php';
require_once 'src/Skateboard.php';
require_once 'src/Bike.php';
require_once 'MotorWay.php';
require_once 'PedestrianWay.php';
require_once 'ResidentialWay.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form class="col-3">
                <label for="vehicle">Selectionnez un véhicule:</label>
                <select class="form-select mb-3" name="vehicle" id="vehicle">
                    <option value="Bike" selected>Vélo</option>
                    <option value="Car" <?= isset($_GET['vehicle']) && $_GET['vehicle'] === 'Car' ? 'selected' : '' ?>>Voiture</option>
                    <option value="Skateboard" <?= isset($_GET['vehicle']) && $_GET['vehicle'] === 'Skateboard' ? 'selected' : '' ?>>Skateboard</option>
                    <option value="Truck" <?= isset($_GET['vehicle']) && $_GET['vehicle'] === 'Truck' ? 'selected' : '' ?>>Camion</option>
                </select>
                <?php if (isset($_GET['submit'])) : ?>
                    <?php if ($_GET['vehicle']) : ?>
                        <label class="form-label" for="color">Couleur:</label>
                        <input class="form-control" type="text" id="color" name="color" required>
                        <label class="form-label" for="seats">Nombre de place:</label>
                        <input class="form-control" type="number" id="seats" name="nbSeats" required>
                        <?php if ($_GET['vehicle'] === 'Car' || $_GET['vehicle'] === 'Truck') : ?>
                            <label class="form-label" for="energytype">Type d'energie:</label>
                            <input class="form-control" type="text" id="energyType" name="energyType" required>
                            <?php if ($_GET['vehicle'] === 'Truck') : ?>
                                <label class="form-label" for="capacity">Capacité:</label>
                                <input class="form-control" type="number" id="capacity" name="capacity" required>
                            <?php endif; ?>
                        <?php endif; ?>
                        <input class="btn btn-primary mt-3" type="submit" name="create" value="Créer">
                    <?php endif; ?>
                <?php endif; ?>
                <input class="btn btn-primary mt-3" name="submit" type="submit" value="Choisir">
            </form>
        </div>
        <div class="row mb-3">
            <?php if (isset($_GET['create'])) : ?>
                <div class="card col-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if ($_GET['vehicle'] === 'Bike' || $_GET['vehicle'] === 'Skateboard') : ?>
                                <?php $vehicle = new $_GET['vehicle']($_GET['color'], $_GET['nbSeats']) ?>
                            <?php elseif ($_GET['vehicle'] === 'Car') : ?>
                                <?php $vehicle = new $_GET['vehicle']($_GET['color'], $_GET['nbSeats'], $_GET['energyType']) ?>
                            <?php elseif ($_GET['vehicle'] === 'Truck') : ?>
                                <?php $vehicle = new $_GET['vehicle']($_GET['color'], $_GET['nbSeats'], $_GET['energyType'], $_GET['capacity']) ?>
                            <?php endif; ?>
                        </h5>
                        <p class="card-text">
                            Couleur: <?= $vehicle->getColor() ?><br>
                            Nombre de place(s): <?= $vehicle->getNbSeats() ?><br>
                            Nombre de roue(s): <?= $vehicle->getNbWheels() ?><br>
                            <?php if (get_class($vehicle) === 'Car' || get_class($vehicle) === 'Truck') : ?>
                                Type de carburant: <?= $vehicle->getenergyType() ?><br>
                            <?php endif; ?>
                            <?php if (get_class($vehicle) === 'Truck') : ?>
                                Capacité de stockage: <?= $vehicle->getCapacity() ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="card-title"><?php $way1 = new MotorWay() ?></h5>
                    <p class="card-text">
                        <?php isset($_GET['create']) ? $way1->addVehicule($vehicle) : '' ?>
                        <?php isset($_GET['create']) ? var_dump($way1) : '' ?>
                    </p>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="card-title"><?php $way2 = new PedestrianWay(); ?></h5>
                    <p class="card-text">
                        <?php isset($_GET['create']) ? $way2->addVehicule($vehicle) : '' ?>
                        <?php isset($_GET['create']) ? var_dump($way2) : '' ?>
                    </p>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="card-title"><?php $way3 = new ResidentialWay(); ?></h5>
                    <p class="card-text">
                        <?php isset($_GET['create']) ? $way3->addVehicule($vehicle) : '' ?>
                        <?php isset($_GET['create']) ? var_dump($way3) : '' ?>
                    </p>
                </div>
            </div>
        </div>
        <h2 class="mt-3">Démarrer la voiture:</h2>
        <form>
            <input class="btn btn-primary" type="submit" value="Démarrer" name="start">
            <?php if (isset($_GET['start'])) : ?>
                <?php $homercar = new Car('violet', 5, 'Essence') ?>
                <?php try{
                    $homercar->start();
                } catch(Exception $e) {
                    echo $e->getMessage() . "<br>";
                    $homercar->setParkBrake(false);
                    echo "Pas de soucis, le frein à été automatiquement désactivé.<br>";
                } finally {
                    echo "Ma voiture roule comme un donut.";
                }
                ?>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>