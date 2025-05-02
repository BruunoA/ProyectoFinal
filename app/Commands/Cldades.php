<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\ClassificacioModel;
use DOMDocument;
use DOMXPath;


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
        $urls = [
            // JUVENIL
            'https://www.fcf.cat/classificacio/2425/futbol-11/juvenil-segona-divisio/grup-46',
            // 'https://www.fcf.cat/classificacio/2425/futbol-11/juvenil-segona-divisio/grup-22',

            'https://www.fcf.cat/classificacio/2425/futbol-11/cadet-primera-divisio/grup-14',

            // AMATEUR
            'https://www.fcf.cat/classificacio/2425/futbol-11/tercera-catalana/grup-14',
            'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5',

            'https://www.fcf.cat/classificacio/2425/futbol-11/cadet-segona-divisio/grup-55',
            // 'https://www.fcf.cat/classificacio/2425/futbol-11/primera-federacio/grup-1',
            'https://www.fcf.cat/classificacio/2425/futbol-11/infantil-segona-divisio-s14/grup-28',
            'https://www.fcf.cat/classificacio/2425/futbol-11/infantil-segona-divisio-s14/grup-29',
            
            // ALEVI 
            'https://www.fcf.cat/classificacio/2425/futbol-7/primera-divisio-alevi-s11/grup-9', 
            'https://www.fcf.cat/classificacio/2425/futbol-7/segona-divisio-alevi-s12/grup-22',
            'https://www.fcf.cat/classificacio/2425/futbol-7/segona-divisio-alevi-s11/grup-17', 
            'https://www.fcf.cat/classificacio/2425/futbol-7/preferent-alevi-s12/grup-5',

            // BENJAMI
            'https://www.fcf.cat/classificacio/2324/futbol-7/primera-divisio-benjami-s10/grup-13', 
            'https://www.fcf.cat/classificacio/2425/futbol-7/primera-divisio-benjami-s9/grup-11',

            // PREBENJAMI
            'https://www.fcf.cat/classificacio/2425/futbol-7/prebenjami-s8/grup-25',
            'https://www.fcf.cat/classificacio/2425/futbol-7/prebenjami-s7/grup-14', 

            // FEMENI
            'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-juvenil/grup-11',
            'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-infantil/grup-20', 
            'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-alevi/grup-12', 
        ];

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
