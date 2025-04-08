<?php
include 'header.php';
include 'funciones.php';

$total = '';
$propina = '';
$montoFinal = '';

if ($_GET) {
    $total = $_GET['total'];
    $porcentaje = $_GET['porcentaje'];

    $propina = calcularPropina($total, $porcentaje);
    $montoFinal = round($total + $propina, 2);
}

function calcularPropina($total, $porcentaje) {
    return ($total * $porcentaje) / 100;
}
?>

<main>
    <h1>Calculadora de Propinas</h1>
    <form method="GET" action="">
        <label>Total de la cuenta ($):</label>
        <input type="number" step="0.01" name="total" value="<?= $total ?>" required>

        <label>Porcentaje de propina:</label>
        <select name="porcentaje">
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20">20%</option>
        </select>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($propina !== ''): ?>
        <div class="resultado">
            <p>Propina: $<?= round($propina, 2) ?></p>
            <p>Total a pagar: $<?= $montoFinal ?></p>
        </div>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>
