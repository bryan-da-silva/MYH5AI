<?php
    class H5AI {
        public $i = 0;
        public $courant = 0;
        public $folderActually = 0;
        public function Scan_Repertoire_Recursive($dossier, $aff) // Fonction qui liste un dossier de façon récursive
        {
            $folder = false;
            if (is_dir($dossier))
            {
                if($opendir=opendir($dossier))
                {
                    $nameFolder = $dossier;
                    $nameFolder ==  "." ? $nameDir = basename(__DIR__) : $nameDir = basename($dossier);
                    echo $this->courant === 0 && $aff === 0 ? "<span style='padding-left: 10px;' class='folder'><img src='./assets/bas.png' width='20px' height='40px'><img src='./assets/folder.png' width='25px' height='25px' class='dossier'><span class='nameDossiers' id='" . $this->folderActually++ . "'>" . $nameDir. "</span></span>" : false;
                    echo $aff === 0 ? "<ul style='margin-top: 0'>" : false;
                    $this->courant = 1;
                    while(($fichier = readdir($opendir)) !== false)
                    {
                        if ($fichier==".." || $fichier=="." || preg_match('`^\.`', $fichier)) continue;
                        else
                        {
                            if(is_dir("$dossier/$fichier"))
                            {
                                $this->i = 1;
                                $this->folderActually++;
                                if ($aff === 0) echo "<li class='folder'><img src='./assets/bas.png' width='20px' height='40px'><img src='./assets/folder.png' width='25px' height='25px' class='dossier'><span class='nameDossiers' id='" . $this->folderActually . "'>$fichier</span></li>";
                                $this->Scan_Repertoire_Recursive("$dossier/$fichier", $aff);
                            }
                            else if ($aff === 1) {
                                // echo "<li><a href='$fichier'>$fichier</a></li>";
                                $file = pathinfo($fichier);
                                $size = filesize($fichier);
                                echo "<div class='result' id='" . $this->folderActually . "'>";
                                echo "<div class='padding'><img src='./assets/" . $file['extension'] . ".png' class='extension'><span class='filename'>" . $file['filename'] . "</span></div>";
                                echo "<div class='right top'>" . date('d/m/Y H:i.', filemtime($fichier)) . "</div>\n";
                                echo "<div class='right Taille top'>" . $this->Size($size) . "</div>";
                                echo "</div>\n";
                            }
                            
                        }
                    }
                    echo $aff === 0 ? "</ul>" : false;
                }
            }
            else echo "Folder not found";
        }

        public function Size($octets) {
            $resultat = $octets;
            for ($i=0; $i < 3 && $resultat >= 1024; $i++) $resultat = $resultat / 1024;
            if ($i > 0) return preg_replace('/,00$/', '', number_format($resultat, 2, ',', '')) . ' ' . substr('KMG',$i-1,1) . 'o';
            else return $resultat . ' o';
        }
    }
    //isset($_GET['search']) && !empty($_GET['search']) ? header('Location:index.php') : null;
?>