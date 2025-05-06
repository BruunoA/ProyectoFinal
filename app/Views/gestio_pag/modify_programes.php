<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Programa</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .day-selector {
            margin-bottom: 15px;
        }

        .time-range-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .time-input {
            width: 120px;
        }

        .selected-days {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
            padding: 8px;
            background: #f5f5f5;
            border-radius: 4px;
            min-height: 40px;
        }

        .day-tag {
            background: #4CAF50;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            display: flex;
            align-items: center;
        }

        .day-tag button {
            background: none;
            border: none;
            color: white;
            margin-left: 5px;
            cursor: pointer;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="w3-container w3-padding">
        <h2 class="w3-center w3-text-blue">Modificar Programa</h2>
        <div class="w3-margin-bottom">
            <a href="javascript:history.back()" class="w3-button w3-light-gray w3-round w3-hover-dark-gray">Volver Atrás</a>
        </div>

        <?php if (session()->getFlashdata('msg')): ?>
            <div class="w3-panel w3-<?= session()->getFlashdata('msg_type') ?> w3-display-container w3-animate-opacity">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-large w3-display-topright">&times;</span>
                <p><?= session()->getFlashdata('msg') ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('gestio/modify/programa/' . $categories['id']) ?>" enctype="multipart/form-data" class="w3-card w3-padding w3-round-large w3-light-grey">
            <?= csrf_field() ?>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-col m12">
                    <label class="w3-text-blue"><b>Títol</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="titol"
                        value="<?= old('titol', $categories['titol'] ?? '') ?>" required>
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Descripció</b></label>
                <textarea class="w3-input w3-border w3-round" name="descripcio" rows="5" required><?=
                                                                                                    old('descripcio', $categories['descripcio'] ?? '')
                                                                                                    ?></textarea>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Dies de la setmana</b></label>
                <div class="day-selector">
                    <select id="day-select" class="w3-input w3-border w3-round">
                        <option value="">Selecciona un día...</option>
                        <?php
                        $diasSemana = [
                            'dilluns' => 'Dilluns',
                            'dimarts' => 'Dimarts',
                            'dimecres' => 'Dimecres',
                            'dijous' => 'Dijous',
                            'divendres' => 'Divendres',
                            'dissabte' => 'Dissabte',
                            'diumenge' => 'Diumenge'
                        ];

                        $diasSeleccionados = [];
                        $horaInicio = '';
                        $horaFin = '';

                        if (!empty($categories['horari'])) {
                            // Parsear el formato plano: dias - hora_inicio - hora_fin
                            $parts = explode(' - ', $categories['horari']);
                            if (count($parts) >= 3) {
                                $diasSeleccionados = explode(',', $parts[0]);
                                $horaInicio = $parts[1];
                                $horaFin = $parts[2];
                            }
                        }

                        foreach ($diasSemana as $key => $dia):
                            if (!in_array($key, $diasSeleccionados)):
                        ?>
                                <option value="<?= $key ?>"><?= $dia ?></option>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </select>

                    <div class="selected-days" id="selected-days-container">
                        <?php foreach ($diasSeleccionados as $dia): ?>
                            <div class="day-tag" data-day="<?= $dia ?>">
                                <?= $diasSemana[$dia] ?>
                                <button type="button" onclick="removeDay('<?= $dia ?>')">×</button>
                                <input type="hidden" name="dias[]" value="<?= $dia ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="time-range-container">
                    <div>
                        <label class="w3-text-blue"><b>Hora d'inici</b></label>
                        <input class="w3-input w3-border w3-round time-input" type="time" name="hora_inici" value="<?= $horaInicio ?>" required>
                    </div>
                    <div>
                        <label class="w3-text-blue"><b>Hora de fi</b></label>
                        <input class="w3-input w3-border w3-round time-input" type="time" name="hora_fi" value="<?= $horaFin ?>" required>
                    </div>
                </div>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Imatge Actual</b></label>
                <?php if (!empty($categories['img'])): ?>
                    <div class="w3-margin-top">
                        <img src="<?= base_url($categories['img']) ?>" class="w3-image w3-border w3-round" style="max-height: 100px;">
                    </div>
                    <label class="w3-text-blue w3-margin-top">
                        <input type="checkbox" name="remove_image" value="1"> Eliminar imatge actual
                    </label>
                <?php else: ?>
                    <p class="w3-text-gray">No hi ha imatge pujada</p>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="w3-text-blue"><b>Nova Imatge (opcional)</b></label>
                <input class="w3-input w3-border w3-round" type="file" name="img">
                <p class="w3-small w3-text-gray">Formatos acceptats: JPG, PNG. Màxim 2MB.</p>
            </div>

            <div class="w3-center">
                <button type="submit" class="w3-button w3-blue w3-round w3-margin-right w3-hover-light-blue">Guardar Canvis</button>
                <a href="<?= base_url('gestio/programes') ?>" class="w3-button w3-gray w3-round w3-hover-dark-gray">Cancel·lar</a>
            </div>
        </form>
    </div>

    <script>
        const diasConfig = {
            'dilluns': 'Dilluns',
            'dimarts': 'Dimarts',
            'dimecres': 'Dimecres',
            'dijous': 'Dijous',
            'divendres': 'Divendres',
            'dissabte': 'Dissabte',
            'diumenge': 'Diumenge'
        };

        const daySelect = document.getElementById('day-select');
        const daysContainer = document.getElementById('selected-days-container');

        function createDayTag(dayValue) {
            const tag = document.createElement('div');
            tag.className = 'day-tag';
            tag.dataset.day = dayValue;
            tag.innerHTML = `
            ${diasConfig[dayValue]}
            <button type="button" onclick="removeDay('${dayValue}')">×</button>
            <input type="hidden" name="dias[]" value="${dayValue}">`;
            return tag;
        }

        function addDay(dayValue) {
            if (!dayValue || document.querySelector(`.day-tag[data-day="${dayValue}"]`)) {
                return false;
            }

            daysContainer.appendChild(createDayTag(dayValue));
            return true;
        }

        function removeDay(dayValue) {
            const tag = document.querySelector(`.day-tag[data-day="${dayValue}"]`);
            if (!tag) return;

            tag.remove();

            const option = new Option(diasConfig[dayValue], dayValue);
            daySelect.add(option);
        }

        daySelect.addEventListener('change', function() {
            if (addDay(this.value)) {
                this.value = '';
            }
        });
    </script>
</body>

</html>