<?php
include 'header.php';
include 'funciones.php';

$ingreso = '';
$gastos = [];
$resultado = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ingreso'])) {
    $ingreso = (float) $_GET['ingreso'];
    $gastos = [
        'alquiler' => (float) $_GET['alquiler'],
        'comida' => (float) $_GET['comida'],
        'transporte' => (float) $_GET['transporte'],
        'otros' => (float) $_GET['otros'],
    ];
    $resultado = calcularGastos($ingreso, $gastos);
}
?>

<main>
    <h1>Calculador de Gastos Mensuales</h1>

    <form method="GET" action="">
        <label for="ingreso">Ingreso mensual ($):</label>
        <input type="number" step="0.01" name="ingreso" id="ingreso" value="<?= htmlspecialchars($ingreso) ?>" required>

        <label for="alquiler">Gasto en alquiler ($):</label>
        <input type="number" step="0.01" name="alquiler" id="alquiler" required>

        <label for="comida">Gasto en comida ($):</label>
        <input type="number" step="0.01" name="comida" id="comida" required>

        <label for="transporte">Gasto en transporte ($):</label>
        <input type="number" step="0.01" name="transporte" id="transporte" required>

        <label for="otros">Otros gastos ($):</label>
        <input type="number" step="0.01" name="otros" id="otros" required>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resumen mensual</h2>
            <p><strong>Total de gastos:</strong> $<?= number_format($resultado['total_gastos'], 2) ?></p>
            <p><strong>Sobra / Falta:</strong> $<?= number_format($resultado['saldo'], 2) ?></p>

            <h3>Porcentajes por categoría:</h3>
            <ul>
                <?php foreach ($resultado['porcentajes'] as $categoria => $porcentaje): ?>
                    <li><?= ucfirst($categoria) ?>: <?= $porcentaje ?>%</li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>
