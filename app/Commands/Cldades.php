<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\ClassificacioModel;
use DOMDocument;
use DOMXPath;
use App\Models\EquipsModel;



class Cldades extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'App';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'cldades';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:name [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->obtenirDades();
    }

    private function getCategoryAndGroup($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));

        $categoria = isset($segments[3]) ? ucfirst(str_replace('-', ' ', $segments[3])) : 'Desconocido';
        $grupo = isset($segments[4]) ? ucfirst(str_replace('-', ' ', $segments[4])) : 'Desconocido'; 

        return [$categoria, $grupo];
    }

    private function filterCellsByClass($cells, $classToAvoid)
    {
        $filteredCells = [];

        foreach ($cells as $cell) {
            $classAttribute = $cell->getAttribute('class');
            if (strpos($classAttribute, $classToAvoid) === false) {
                $filteredCells[] = $cell;
            }
        }

        return $filteredCells;
    }

    public function obtenirDades()
    {

        $modelEquip = new EquipsModel();
        $equips = $modelEquip->findAll();
        $urls = [];

        foreach ($equips as $equip) {
            $urls[] = $equip['url_federacio'];
        }

        foreach ($urls as $url) {
            list($categoria, $grupo) = $this->getCategoryAndGroup($url);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $html = curl_exec($ch);
            curl_close($ch);

            $dom = new DOMDocument();
            @$dom->loadHTML($html);

            $xpath = new DOMXPath($dom);
            $table = $xpath->query("//table[contains(@class, 'fcftable-e')]")->item(0);

            if ($table) {
                $clasificacionModel = new ClassificacioModel();
                echo "<table border='1'>";
                echo "<tr><th>Posición</th><th>Equipo</th><th>Puntos</th><th>PJ</th><th>PG</th><th>PE</th><th>PP</th><th>GF</th><th>GC</th><th>resultado</th><th>categoria</th><th>grupo</th></tr>";

                foreach ($table->getElementsByTagName('tr') as $index => $row) {
                    if ($index === 0 || $index === 1) {
                        continue;
                    }

                    $cells = $row->getElementsByTagName('td');
                    $cells = $this->filterCellsByClass($cells, 'detallada');

                    if (count($cells) > 0) {
                        echo "<tr>";

                        $position = $cells[0]->nodeValue;
                        echo "<td>" . trim($position) . "</td>";

                        $teamName = $cells[2]->nodeValue;
                        echo "<td>" . trim($teamName) . "</td>";

                        $points = $cells[3]->nodeValue;
                        echo "<td>" . trim($points) . "</td>";

                        $gamesPlayed = $cells[6]->nodeValue;
                        echo "<td>" . trim($gamesPlayed) . "</td>";

                        $gamesFor = $cells[7]->nodeValue;
                        echo "<td>" . trim($gamesFor) . "</td>";

                        $gamesDrawn = $cells[8]->nodeValue;
                        echo "<td>" . trim($gamesDrawn) . "</td>";

                        $gamesLost = $cells[9]->nodeValue;
                        echo "<td>" . trim($gamesLost) . "</td>";

                        $goalsFor = $cells[10]->nodeValue;
                        echo "<td>" . trim($goalsFor) . "</td>";

                        $goalsAgainst = $cells[11]->nodeValue;
                        echo "<td>" . trim($goalsAgainst) . "</td>";

                        $resultados = [];
                        $links = $cells[12]->getElementsByTagName('a');

                        foreach ($links as $link) {
                            $span = $link->getElementsByTagName('span')->item(0);
                            $resultado = ($span) ? trim($span->nodeValue) : "N/A";
                            $resultados[] = $resultado;
                        }

                        echo "<td>";
                        foreach ($resultados as $resultado) {
                            echo $resultado . "<br>";
                        }
                        echo "</td>";
                        echo "<td>$categoria</td>";
                        echo "<td>$grupo</td>";
                        echo "</tr>";

                        $clasificacionModel->insert([
                            'posicio' => $position,
                            'nom' => $teamName,
                            'punts' => $points,
                            'pj' => $gamesPlayed,
                            'pg' => $gamesFor,
                            'pe' => $gamesDrawn,
                            'pp' => $gamesLost,
                            'gf' => $goalsFor,
                            'gc' => $goalsAgainst,
                            'resultats' => json_encode($resultados),
                            'categoria' => $categoria,
                            'grup' => $grupo,
                        ]);
                    }
                }
                echo "</table>";
            } else {
                echo "No se encontró la tabla de clasificación para la URL: $url";
            }
        }
    }

}
