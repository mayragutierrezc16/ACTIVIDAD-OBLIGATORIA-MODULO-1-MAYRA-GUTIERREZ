<?php
function calcularGastos($ingreso, $gastos) {
    $total = array_sum($gastos);
    $saldo = round($ingreso - $total, 2);
    $porcentajes = [];

    foreach ($gastos as $categoria => $monto) {
        $porcentajes[$categoria] = $ingreso > 0 ? round(($monto / $ingreso) * 100, 2) : 0;
    }

    return [
        'total_gastos' => round($total, 2),
        'saldo' => $saldo,
        'porcentajes' => $porcentajes
    ];
}
